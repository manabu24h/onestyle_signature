<?php
session_start();
/* session_start()の書く位置は<?phpの直下 */

// 共通ヘッダー
$Path = $_SERVER['DOCUMENT_ROOT'] ;
require_once $Path ."lib/Database.php";

// 問い合わせ内容をDBに格納
$db = Database::getConnection();
foreach($_POST as $k=>$v){
  $_SESSION["data"][$k] = $v;
}

if (!isset($_SESSION["data"])) {
	echo "データが格納されていません";
/*     header('Location: index.php'); */
    exit;
}
$keys = array_keys($_SESSION["data"]);
$keys[] = "created_at";
$insert = 'INSERT INTO emergency (' . implode(",",$keys) . ') values(';
foreach ($_SESSION["data"] as $key => $val) {
    if (empty($val)) {
        $params[$key] = null;
        $insert .= 'null,';
    } else {
        $params[$key] = $val;
        $insert .= '"' . $val . '",';
    }
}
date_default_timezone_set('Asia/Tokyo');
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
$mail ->subject('非常時の特則に関する同意');

// 送信元をセット
$mail -> from('wedding@onestyle.co.jp','ONESTYLE');


// ヒアドキュメント全体を変数に格納（タブスペース不可）
if ($key == 0) {
// 申し込み者側のメール本文
$mail_body = <<<EOD
この度は、新型コロナウイルスの世界的な感染拡大に伴い
弊社「非常時の特則」にご同意を賜り誠にありがとうございます。

本メールの内容に関して、担当者よりご連絡をさせていただく場合がございます。
なお内容の確認には、数日かかることがございますのでご了承願います。


==【内容】======== 受付 No.{$insertId}========

《送信日》
{$params["date"]}

《おふたりの氏名》
{$params["groom_name"]}
{$params["bride_name"]}


【非常時の特則】

謹啓　時下ますますご清祥のこととお慶び申し上げます。
この度は撮影のご依頼をいただき誠にありがとうございます。
さて、新型コロナウィルスの感染拡大を受けて、
当社では今後万が一「新型インフルエンザ等対策特別措置法」に基づく緊急事態宣言が出され、
知事より同法に基づく外出自粛要請が出された場合の特則を定めましたので、本書をもってお知らせいたします。
スタッフ一同このような事態に陥らないことを祈るばかりでありますが、
本特則は法令遵守ならびにお客様及び当社スタッフの生命及び身体の安全確保を目的に設定されたものですので、
何卒ご理解とご協力をお願い申し上げます。

------------------------------------------

「新型インフルエンザ等対策特別措置法」に基づく内閣総理大臣の『緊急事態宣言』に伴い、都道府県知事より外出自粛要請が出され、お客様の撮影予定日がこの要請の期間内に含まれる場合には、自動的に以下の取り扱いとさせていただきます。

（1）お客様は緊急事態宣言発令後に外出自粛要請が出された日から撮影予定日の前々日までの間に、新たな日程の希望日をお知らせください。なお、本号の条件を全て満たして日程変更がなされた場合には、お客様に日程変更料や実費分等のご負担は一切生じません。

（2）撮影日程のご変更をされたうえで、撮影プランやお衣装などお申込み頂いている内容と変更が発生した場合、当初予定しておりました内容のお見積り金額からの減額の対応は致しかねます。プランやサービスの追加が発生した場合には、相当額の追加料金が発生致します。撮影プランやお衣装の変更などには臨機応変に対応させて頂きます。

（3）万が一、お客様が前号の期限までに新たな変更日を指定せず、または（新たな変更日を指定した後も含め）撮影自体を中止される場合には、当社とお客
様との間の契約は終了し、お客様には「撮影申込書」のキャンセル規定により算出されるキャンセル料から半額相当分を減額した金額をご負担いただきます。

------------------------------------------

なお、上記緊急事態宣言や知事による要請を受けていなくても、当社が必要性を認めた場合には、
事前にお客様に通知した上で、以下の各事項その他の必要な対応を実施することができるものとします。

・当社スタッフによるサービス提供時のマスク着用
・お客様及び参列者に対しての手洗い、うがい及び消毒の推奨
・来店者への検温の実施、発熱者の入店の拒否または退去の依頼
・その他衛生環境維持に必要な措置

当社としてはお客様に撮影サービスを無事に提供できるよう引き続き全力を尽くしてまいる所存ですが、現下の状況を鑑み、万が一の場合であってもお客様のご負担を最小限にした上で撮影を実施できるよう、本書の通り特則をご用意し、ご提示申し上げるものです。

内容をよくご確認いただき、なにとぞご理解とご協力を賜りたくお願い申し上げます。

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

《同意書印刷 URL》
http://sign.onestyle.co.jp/print/sp-rules.php?id={$insertId}

==【内容】======== 受付 No.{$insertId}========

株式会社ONESTYLE 御中

《送信日》
{$params["date"]}

《おふたりの氏名》
{$params["groom_name"]}
{$params["bride_name"]}

私たちは、下記「非常時の特則」の内容を確認し、同意いたします。

【非常時の特則】

謹啓　時下ますますご清祥のこととお慶び申し上げます。
この度は撮影のご依頼をいただき誠にありがとうございます。
さて、新型コロナウィルスの感染拡大を受けて、
当社では今後万が一「新型インフルエンザ等対策特別措置法」に基づく緊急事態宣言が出され、
知事より同法に基づく外出自粛要請が出された場合の特則を定めましたので、本書をもってお知らせいたします。
スタッフ一同このような事態に陥らないことを祈るばかりでありますが、
本特則は法令遵守ならびにお客様及び当社スタッフの生命及び身体の安全確保を目的に設定されたものですので、
何卒ご理解とご協力をお願い申し上げます。

------------------------------------------

「新型インフルエンザ等対策特別措置法」に基づく内閣総理大臣の『緊急事態宣言』に伴い、都道府県知事より外出自粛要請が出され、お客様の撮影予定日がこの要請の期間内に含まれる場合には、自動的に以下の取り扱いとさせていただきます。

（1）お客様は緊急事態宣言発令後に外出自粛要請が出された日から撮影予定日の前々日までの間に、新たな日程の希望日をお知らせください。なお、本号の条件を全て満たして日程変更がなされた場合には、お客様に日程変更料や実費分等のご負担は一切生じません。

（2）撮影日程のご変更をされたうえで、撮影プランやお衣装などお申込み頂いている内容と変更が発生した場合、当初予定しておりました内容のお見積り金額からの減額の対応は致しかねます。プランやサービスの追加が発生した場合には、相当額の追加料金が発生致します。撮影プランやお衣装の変更などには臨機応変に対応させて頂きます。

（3）万が一、お客様が前号の期限までに新たな変更日を指定せず、または（新たな変更日を指定した後も含め）撮影自体を中止される場合には、当社とお客
様との間の契約は終了し、お客様には「撮影申込書」のキャンセル規定により算出されるキャンセル料から半額相当分を減額した金額をご負担いただきます。

------------------------------------------

なお、上記緊急事態宣言や知事による要請を受けていなくても、当社が必要性を認めた場合には、
事前にお客様に通知した上で、以下の各事項その他の必要な対応を実施することができるものとします。

・当社スタッフによるサービス提供時のマスク着用
・お客様及び参列者に対しての手洗い、うがい及び消毒の推奨
・来店者への検温の実施、発熱者の入店の拒否または退去の依頼
・その他衛生環境維持に必要な措置

当社としてはお客様に撮影サービスを無事に提供できるよう引き続き全力を尽くしてまいる所存ですが、現下の状況を鑑み、万が一の場合であってもお客様のご負担を最小限にした上で撮影を実施できるよう、本書の通り特則をご用意し、ご提示申し上げるものです。

内容をよくご確認いただき、なにとぞご理解とご協力を賜りたくお願い申し上げます。

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
	header('Location: index.php?id='.$insertId);
	exit;
} else {
	// 送信失敗
	// header('Location: index.php');
	echo '失敗';
	exit;
}
