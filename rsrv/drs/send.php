<?php
session_start();
// 和装の衣装予約フォーム
$Path = $_SERVER['DOCUMENT_ROOT'] ;

$date='';
$g_name='';
$b_name='';
$email='';
$g_height='';
$g_size='';
$g_shoe='';
$b_height='';
$b_size='';
$b_shoe='';
$slc_date1='';
$slc_date2='';
$slc_time1='';
$slc_time2='';
$message='';

$date = $_SESSION['date'];
$g_name = $_SESSION['g_name'];
$b_name = $_SESSION['b_name'];
$email = $_SESSION['email'];
$g_height = $_SESSION['g_height'];
$g_size = $_SESSION['g_size'];
$g_shoe = $_SESSION['g_shoe'];
$b_height = $_SESSION['b_height'];
$b_size = $_SESSION['b_size'];
$b_shoe = $_SESSION['b_shoe'];
$slc_date1= $_SESSION['slc_date1'];
$slc_date2= $_SESSION['slc_date2'];
$slc_time1= $_SESSION['slc_time1'];
$slc_time2= $_SESSION['slc_time2'];
$message= $_SESSION['message'];

session_destroy();

// formの中身が見たい時はこのコードのコメントアウトを外して下さい
// var_dump($_SESSION);exit;

//Qdmailをロード
require_once( $Path . 'lib/qdmail.php');
//Qdsmtpをロード
//（ドキュメントには、記述不要とかいてあるが、書かないとうまくいかないことがあった）
require_once( $Path . 'lib/qdsmtp.php');

$mail_send_list = [$email, "wedding@onestyle.co.jp"];
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
// $to[] = array('wedding@onestyle.co.jp', '');
$mail -> to($to);
// $mail -> bcc('wedding@onestyle.co.jp', '');

// 件名をセット
$mail ->subject('洋装の試着予約');

// 送信元をセット
$mail -> from('wedding@onestyle.co.jp','ONESTYLE');

// ヒアドキュメント全体を変数に格納（タブスペース不可）

if ($key == 0) {
// 申し込み者側のメール本文
$mail_body = <<<EOD
この度は、ご予約をいただき誠にありがとうございます。
以下の内容で受け付けいたしました。
(本メールは、予約確定のお知らせではございません)

内容確認後、ご連絡をさせていただきます。
なお回答には、数日かかることがございますので、ご了承願います。

■ご予約の内容：洋装の試着予約

■撮影日：{$date}

■おふたりの氏名
新郎様：{$g_name}
新婦様：{$b_name}

■代表の方のご連絡先
{$email}

■サイズ
新郎様 身長：{$g_height}cm　服：{$g_size}　靴：{$g_shoe}cm
新婦様 身長：{$b_height}cm　服：{$b_size}　靴：{$b_shoe}cm

■撮影希望日時
第一希望：{$slc_date1}｜{$slc_time1}
第二希望：{$slc_date2}｜{$slc_time2}

■ご質問・ご要望
{$message}


--
/・/・/・/・/・/・/・/・/・/・/・/・/・/・/・/・/・/・/
結婚写真ONESTYLE (ワンスタイル)
http://weddingphoto.onestyle.co.jp

【営業時間】
平日 12:00-19:00 (火曜定休) | 土日祝 10:00-19:00

≪e-mail≫
wedding@onestyle.co.jp

≪表参道店≫
〒150-0001　東京都渋谷区神宮前3-38-1 JP-4ビル1階
tel:03-6721-0592　fax:03-6721-0594

≪横浜店≫
〒231-0011　神奈川県横浜市中区太田町6-75 関内北原不動産ビル603
tel:045-306-7422　fax:045-306-7499

≪仙台店≫
〒980-0803 宮城県仙台市青葉区国分町3-2-5 ゼロキュービル5階
tel:022-397-7481

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

■ご予約の内容：洋装の試着予約

■撮影日：{$date}

■おふたりの氏名
新郎様：{$g_name}
新婦様：{$b_name}

■代表の方のご連絡先
{$email}

■サイズ
新郎様 身長：{$g_height}cm　服：{$g_size}　靴：{$g_shoe}cm
新婦様 身長：{$b_height}cm　服：{$b_size}　靴：{$b_shoe}cm

■撮影希望日時
第一希望：{$slc_date1}｜{$slc_time1}
第二希望：{$slc_date2}｜{$slc_time2}

■ご質問・ご要望
{$message}

===========================================

EOD;
}

// 変数を出力
// echo $mail_body;
 
//メール本文(テキストメール) ※HTMLメールの場合は$mail ->html(‘<タグ><タグ>');
$mail ->text($mail_body);

$flag[] = $mail->send();

} // foreach ($mail_send_list as $key => $val)  END

	
if ($flag == TRUE) {
	// 送信成功
	header('Location: http://sign.onestyle.co.jp/payment/index.php?submit=1');
	echo('成功');
	exit;
}
else {
	// 送信失敗
	// header('Location: index.php');
	echo('送信できませんでした');
	exit;
}
