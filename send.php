<?php

require_once "lib/Database.php";
//$Path = $_SERVER['DOCUMENT_ROOT'] . '/onestyle/signature/';
$Path = $_SERVER['DOCUMENT_ROOT'] ;

// 問い合わせ内容をDBに格納
$db = Database::getConnection();
session_start();
if (!isset($_SESSION["data"])) {
    header('Location: index.php');
    exit;
}
$keys = array_keys($_SESSION["data"]);
$keys[] = "created_at";
$insert = 'INSERT INTO customers (' . implode(",",$keys) . ') values(';
foreach ($_SESSION["data"] as $key => $val) {
    if (empty($val)) {
        $params[$key] = null;
        $insert .= 'null,';
    } else {
        $params[$key] = $val;
        $insert .= '"' . $val . '",';
    }
}
$insert .= '"' . date("Y-m-d H:i:s") . '")';

try {
    $stmt = $db->prepare($insert);
    $stmt->execute();
    $insertId = $db->lastInsertId();
} catch(PDOException $e) {
    echo $e->getMessage();exit;
}

session_destroy();

// formの中身が見たい時はこのコードのコメントアウトを外して下さい
//var_dump($params);exit;
	
//Qdmailをロード
require_once( $Path . 'lib/qdmail.php');
//Qdsmtpをロード
//（ドキュメントには、記述不要とかいてあるが、書かないとうまくいかないことがあった）
require_once( $Path . 'lib/qdsmtp.php');

$mail_send_list = [$params["email"],"wedding@onestyle.co.jp"];
//$mail_send_list = [$params["email"], "wedding@onestyle.co.jp"];  // 本番公開用

foreach ($mail_send_list as $key => $val) {
//Qdmailオブジェクト生成
$mail = new Qdmail();

//メール送信設定
$mail -> errorDisplay( false );
$mail -> smtpObject() -> error_display = false;
$mail -> smtp(true);
$param = array(
     //メールサーバ
     'host'=>'onestyle-photo.sakura.ne.jp',
     //SMTP_AUTHの場合。認証なしなら25で良いかと。
     'port'=> 587 ,
     //fromアドレス
     'from'=>'wedding@onestyle.co.jp',
     //認証が必要ない場合は’SMTP'
     'protocol'=>'SMTP_AUTH',
     //SMTPサーバのユーザID
     'user'=>'mail@onestyle-photo.sakura.ne.jp',
     //SMTPサーバの認証パスワード
     'pass' => 'onestyle0916'
);
$mail -> smtpServer($param);
	
$to = $val;
$mail -> to($to);
// $mail -> bcc('wedding@onestyle.co.jp', '');

// 件名をセット
$mail ->subject('ONESTYLE撮影お申込み');

// 送信元をセット
$mail -> from('wedding@onestyle.co.jp','ONESTYLE');

// プランの内容で分岐
if($params["radio_venue"] == '1'){
$radio_value = <<<EOC
使用可
EOC;
}else{
$radio_value = <<<EOC
使用不可
EOC;
}

	
// ヒアドキュメント全体を変数に格納（タブスペース不可）
if ($key == 0) {
// 申し込み者側のメール本文
$mail_body = <<<EOD
この度は、撮影のお申込みをいただきありがとうございます。
以下の内容で、お申込みを承りました。

内容を確認後、担当者よりご連絡をさせていただきます。
なお回答には、数日かかることがございますので、ご了承願います。

==【お問い合わせ内容】=====================

撮影申込 No. {$insertId}

《おふたりの氏名》
新郎様：{$params["groom_name"]}
新婦様：{$params["bride_name"]}

《代表の方のご連絡先》
メールアドレス：{$params["email"]}
電話番号：{$params["tel_no"]}
住所：
{$params["zip1"]}-{$params["zip2"]}
{$params["prefecture"]}{$params["address"]}

《サンプル使用許諾》
{$radio_value}

===========================================

--
/・/・/・/・/・/・/・/・/・/・/・/・/・/・/・/・/・/・/
結婚写真ONESTYLE (ワンスタイル)
http://weddingphoto.onestyle.co.jp

【営業時間】
平日 12:00-19:00 (火曜定休) | 土日祝 10:00-19:00

≪e-mail≫
wedding@onestyle.co.jp

≪表参道店≫
〒150-0001 東京都渋谷区神宮前3-38-1 JP-4ビル1階
tel:03-6721-0592

≪横浜店≫
〒220-0005 神奈川県横浜市西区南幸2-11-11 グランツ南幸5階
tel:045-594-7684

↓新着情報を更新しておりますのでご覧下さい
スタッフブログ：http://weddingphoto.onestyle.co.jp/blog
Facebook：https://www.facebook.com/WEDDINGPHOTO.ONESTYLE
Twitter：https://twitter.com/onestyle_weddin
/・/・/・/・/・/・/・/・/・/・/・/・/・/・/・/・/・/・/
EOD;
} else {
// 管理者側メール本文
$mail_body = <<<EOD

==【お問い合わせ内容】=====================

撮影申込 No. {$insertId}

《申込書印刷 URL》
http://sign.onestyle.co.jp/print/index.php?id={$insertId}

《おふたりの氏名》
新郎様：{$params["groom_name"]}
新婦様：{$params["bride_name"]}

《代表の方のご連絡先》
メールアドレス：{$params["email"]}
電話番号：{$params["tel_no"]}
住所：
{$params["zip1"]}-{$params["zip2"]}
{$params["prefecture"]}{$params["address"]}

《サンプル使用許諾》
{$radio_value}

===========================================

EOD;
}

// 変数を出力
//echo $mail_body;
 
//メール本文(テキストメール) ※HTMLメールの場合は$mail ->html(‘<タグ><タグ>');
$mail ->text($mail_body);

$flag[] = $mail->send();

}
if ($flag[0] == TRUE && $flag[1] == TRUE) {
	// 送信成功
	header('Location: rsrv/index.php?id='.$insertId);
	exit;
} else {
	// 送信失敗
	// header('Location: index.php');
	echo '失敗';
	exit;
}
