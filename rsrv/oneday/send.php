<?php // 「1DAY完結プラン」サイズ・衣装予約フォーム
	$Path = $_SERVER['DOCUMENT_ROOT'] . '/onestyle/signature/';
	include( $Path . 'header.php');
?>

<div id="container" class="">

<?php

// $email ='';
$g_name='';
$g_height='';
$g_size='';
$g_shoe='';
$b_name='';
$b_height='';
$b_size='';
$b_shoe='';
$waso_1='';
$waso_2='';
$waso_3='';
$yoso_1='';
$yoso_2='';
$yoso_3='';
$message='';

session_start();

$g_name = $_SESSION['g_name'];
$g_height = $_SESSION['g_height'];
$g_size = $_SESSION['g_size'];
$g_shoe = $_SESSION['g_shoe'];
$b_name = $_SESSION['b_name'];
$b_height = $_SESSION['b_height'];
$b_size = $_SESSION['b_size'];
$b_shoe = $_SESSION['b_shoe'];
$waso_1 = $_SESSION['waso_1'];
$waso_2 = $_SESSION['waso_2'];
$waso_3 = $_SESSION['waso_3'];
$yoso_1 = $_SESSION['yoso_1'];
$yoso_2 = $_SESSION['yoso_2'];
$yoso_3 = $_SESSION['yoso_3'];
$message= $_SESSION['message'];
// $email = $_SESSION['email'];

	
	//セッション関係の終了
	$_SESSION=array();
	unset($_SESSION['g_name']);
	unset($_SESSION['g_height']);
	unset($_SESSION['g_size']);
	unset($_SESSION['g_shoe']);
	unset($_SESSION['b_name']);
	unset($_SESSION['b_height']);
	unset($_SESSION['b_size']);
	unset($_SESSION['b_shoe']);
	unset($_SESSION['waso_1']);
	unset($_SESSION['waso_2']);
	unset($_SESSION['waso_3']);
	unset($_SESSION['yoso_1']);
	unset($_SESSION['yoso_2']);
	unset($_SESSION['yoso_3']);
	unset($_SESSION['message']);
	if(isset($_COOKIE[ "PHPSESSID"] )) {
	  setcookie( session_name(),'',time()-42000,'/');  
	}
	session_destroy();
	
	//Qdmailをロード
	require_once( $Path . 'lib/qdmail.php');
	//Qdsmtpをロード
	//（ドキュメントには、記述不要とかいてあるが、書かないとうまくいかないことがあった）
	require_once( $Path . 'lib/qdsmtp.php');
	
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
	
	$to[] = array('nishio@onelife.jp', '');
	$mail -> to($to);
	// $mail -> bcc('wedding@onestyle.co.jp', '');

	// 件名をセット
	$mail ->subject('「1DAY完結プラン」サイズ・衣装予約');

	// 送信元をセット
	$mail -> from('wedding@onestyle.co.jp','ONESTYLE');
	

// プランの内容で分岐

if($waso_1){
$waso_value = <<<EOC
■ご予約希望（和装）
第一希望：{$waso_1}
第一希望：{$waso_2}
第三希望：{$waso_3}
EOC;
}else{
$waso_value = '';
}

if($yoso_1){
$yoso_value = <<<EOC
■ご予約希望（洋装）
第一希望：{$yoso_1}
第一希望：{$yoso_2}
第三希望：{$yoso_3}
EOC;
}else{
$yoso_value = '';
}
	
// ヒアドキュメント全体を変数に格納（タブスペース不可）
$mail_body = <<<EOD
この度は、ご予約をいただき誠にありがとうございます。
以下の内容で受け付けいたしました。
(本メールは、予約確定のお知らせではございません)

内容確認後、ご連絡をさせていただきます。
なお回答には、数日かかることがございますので、ご了承願います。

■ご予約の内容：「1DAY完結プラン」サイズ・衣装予約

■おふたりの氏名
新郎様：{$g_name}
新婦様：{$b_name}

■サイズ
新郎様 身長：{$g_height}cm　服：{$g_size}　靴：{$g_shoe}cm
新婦様 身長：{$b_height}cm　服：{$b_size}　靴：{$b_shoe}cm

{$waso_value}

{$yoso_value}

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

↓新着情報を更新しておりますのでご覧下さい
スタッフブログ：http://weddingphoto.onestyle.co.jp/blog
Facebook：https://www.facebook.com/WEDDINGPHOTO.ONESTYLE
Twitter：https://twitter.com/onestyle_weddin
/・/・/・/・/・/・/・/・/・/・/・/・/・/・/・/・/・/・/
EOD;


// 変数を出力
echo $mail_body;
 
	//メール本文(テキストメール) ※HTMLメールの場合は$mail ->html(‘<タグ><タグ>');
	$mail ->text($mail_body);
	
	$flag = $mail->send();
	if ($flag == TRUE) {
		// 送信成功
		unset($_SESSION['g_name']);
		unset($_SESSION['g_height']);
		unset($_SESSION['g_size']);
		unset($_SESSION['g_shoe']);
		unset($_SESSION['b_name']);
		unset($_SESSION['b_height']);
		unset($_SESSION['b_size']);
		unset($_SESSION['b_shoe']);
		unset($_SESSION['waso_1']);
		unset($_SESSION['waso_2']);
		unset($_SESSION['waso_3']);
		unset($_SESSION['yoso_1']);
		unset($_SESSION['yoso_2']);
		unset($_SESSION['yoso_3']);
		unset($_SESSION['message']);
		header('Location: ../../payment/index.php?id=1');
		exit;
	}
	else {
		// 送信失敗
		header('Location: ../../payment/index.php');
		exit;
	}
?>

<a href="index.php">戻る</a>

</div>
<!-- // #container END -->

<?php include( $Path . 'footer.php'); // 共通フッター ?>