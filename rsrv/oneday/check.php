<?php
session_start();	
	
// 「1DAY完結プラン」サイズ・衣装予約フォーム
	
// 共通ヘッダー
$Path = $_SERVER['DOCUMENT_ROOT'] ;
include( $Path . 'header.php');

//$_POST['name'] →$nameへ、$name= 値 といった具合で挿入されます
foreach($_POST as $k=>$v){
  $$k=$v;
}
//値をセッションに入れる

$_SESSION['date']=$date;
$_SESSION['g_name']=$g_name;
$_SESSION['b_name']=$b_name;
$_SESSION['email']=$email;
$_SESSION['g_height']=$g_height;
$_SESSION['g_size']=$g_size;
$_SESSION['g_shoe']=$g_shoe;
$_SESSION['b_height']=$b_height;
$_SESSION['b_size']=$b_size;
$_SESSION['b_shoe']=$b_shoe;
$_SESSION['waso_1']=$waso_1;
$_SESSION['waso_2']=$waso_2;
$_SESSION['waso_3']=$waso_3;
$_SESSION['yoso_1']=$yoso_1;
$_SESSION['yoso_2']=$yoso_2;
$_SESSION['yoso_3']=$yoso_3;
$_SESSION['message']=$message;
	
?>

<div id="container" class="page_check">
	<div id="breadcrumb">
		<ul>
			<li><h1><a href="<?php echo $home; ?>">ONESTYLE撮影お申込みのご案内</a><span class="arrow">＞</span></h1></li>
			<li><a href="<?php echo $home; ?>rsrv">衣装のご予約</a><span class="arrow">＞</span></li>
			<li><a href="">「1DAY完結プラン」サイズ・衣装予約</a></li>
		</ul>
	</div>
	<!-- // #breadcrumb END -->
	
	<div id="contents">
		
		<section id="mail-form" name="mail-form">
			<h2>「1DAY完結プラン」サイズ・衣装予約</h2>
			<div class="form-apply">
				
				<div class="check-form">
					<div class="unit">
						<p class="label">《撮影日》</p>
						<dl>
							<dd><p class="value"><?php echo $date; ?></p></dd>
						</dl>			
					</div>
					<div class="unit">
						<p class="label must">《おふたりの氏名》</p>
						<dl>
							<dt><span class="item">新郎様</span></dt>
							<dd><p class="value"><?php echo $g_name; ?></p></dd>
						</dl>
						<dl>
							<dt><span class="item">新婦様</span></dt>
							<dd><p class="value"><?php echo $b_name; ?></p></dd>
						</dl>
					</div>
					
					<div class="unit">
						<p class="label">《代表の方のご連絡先》</p>
						<dl>
							<dt><span class="item">メールアドレス</span></dt>
							<dd><?php echo $email; ?></dd>
						</dl>
					</div>
					
					<div class="unit">
						<p class="label must">《サイズ》</p>
						<dl>
							<dt><span class="item">新郎様</span></dt>
							<dd>
								<p class="value">身長：<?php echo $g_height; ?></p>
								<p class="value">服：<?php echo $g_size; ?></p>
								<p class="value">靴：<?php echo $g_shoe; ?></p>
							</dd>
						</dl>
						<dl>
							<dt><span class="item">新婦様</span></dt>
							<dd>
								<p class="value">身長：<?php echo $b_height; ?></p>
								<p class="value">服：<?php echo $b_size; ?></p>
								<p class="value">靴：<?php echo $b_shoe; ?></p>
							</dd>
						</dl>
					</div>
					
					<?php if($waso_1): ?>
						<div class="unit">
							<p class="label">《ご予約希望（和装）》</p>
							<p class="value">第一希望：<?php echo $waso_1; ?></p>
							<p class="value">第二希望：<?php echo $waso_2; ?></p>
							<p class="value">第三希望：<?php echo $waso_3; ?></p>
						</div>
					<?php endif; ?>
					
					<?php if($yoso_1): ?>
						<div class="unit">
							<p class="label">《ご予約希望（洋装）》</p>
							<p class="value">第一希望：<?php echo $yoso_1; ?></p>
							<p class="value">第二希望：<?php echo $yoso_2; ?></p>
							<p class="value">第三希望：<?php echo $yoso_3; ?></p>
						</div>
					<?php endif; ?>
					
					<div class="unit">
						<p class="label">《ご質問・ご要望》</p>
						<p class="value"><?php echo $message; ?></p>
					</div>

					<div class="submit-area clearfix">
						<p class="att">
							・迷惑メール防止の設定をされている場合は、「@onestyle.co.jp」をドメイン指定解除してください。
						</p>
						<div class="submit">
							<a class="bt-submit" href="./index.php#mail-form">編集へ戻る</a>
							<a class="bt-submit" href="./send.php">この内容で送信</a>
						</div>
					</div>
				</div><!-- //.check-form END -->
			</div><!-- //.form-apply END -->
		</section>
		<!-- // #email-form END -->

	</div>
	<!-- // #contents END -->

</div>
<!-- // #container END -->

<?php include( $Path . 'footer.php'); // 共通フッター ?>