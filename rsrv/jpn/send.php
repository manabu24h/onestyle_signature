<?php // 和装の見学予約フォーム
	$Path = $_SERVER['DOCUMENT_ROOT'] . '/onestyle/signature/';
	include( $Path . 'header.php');
?>

<div id="container" class="">

<?php
	$g_name='';
	$b_name='';
	$radio_venue='';
	$slc_date1='';
	$slc_date2='';
	$slc_time1='';
	$slc_time2='';
	// $message='';
	session_start();
	$g_name = $_SESSION['g_name'];
	$b_name = $_SESSION['b_name'];
	// $email = $_SESSION['email'];
	$radio_venue = $_SESSION['radio_venue'];
	$slc_date1= $_SESSION['slc_date1'];
	$slc_date2= $_SESSION['slc_date2'];
	$slc_time1= $_SESSION['slc_time1'];
	$slc_time2= $_SESSION['slc_time2'];
	// $message= $_SESSION['message'];
	
	//セッション関係の終了
	$_SESSION=array();
	unset($_SESSION['g_name']);
	unset($_SESSION['b_name']);
	// unset($_SESSION['email']);
	unset($_SESSION['radio_venue']);
	unset($_SESSION['slc_date1']);
	unset($_SESSION['slc_date2']);
	unset($_SESSION['slc_time1']);
	unset($_SESSION['slc_time2']);
	// unset($_SESSION['message']);
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
	$mail ->subject('和装の見学予約');

	// 送信元をセット
	$mail -> from('wedding@onestyle.co.jp','ONESTYLE');
	
// ヒアドキュメント全体を変数に格納（タブスペース不可）
$mail_body = <<<EOD
この度は、ご予約をいただき誠にありがとうございます。
以下の内容で受け付けいたしました。
(本メールは、予約確定のお知らせではございません)

内容確認後、ご連絡をさせていただきます。
なお回答には、数日かかることがございますので、ご了承願います。

■ご予約の内容：和装の見学予約

■おふたりの氏名
新郎様：{$g_name}
新婦様：{$b_name}

■ご来店希望店舗
{$radio_venue}

■撮影希望日時
第一希望：{$slc_date1}｜{$slc_time1}
第二希望：{$slc_date2}｜{$slc_time2}

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
		unset($_SESSION['b_name']);
		// unset($_SESSION['email']);
		unset($_SESSION['radio_venue']);
		unset($_SESSION['slc_date1']);
		unset($_SESSION['slc_date2']);
		unset($_SESSION['slc_time1']);
		unset($_SESSION['slc_time2']);
		// unset($_SESSION['message']);
		header('Location: index.php');
		exit;
	}
	else {
		// 送信失敗
		header('Location: index.php');
		exit;
	}
?>

<a href="index.php">戻る</a>

</div>
<!-- // #container END -->

<?php include( $Path . 'footer.php'); // 共通フッター ?>