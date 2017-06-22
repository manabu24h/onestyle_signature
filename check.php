<?php // 共通ヘッダー
	$Path = $_SERVER['DOCUMENT_ROOT'] . '/onestyle/signature/';
        //$Path = $_SERVER['DOCUMENT_ROOT'] . "/";
	include( $Path . 'header.php');
?>

<div id="container" class="">
	<div id="breadcrumb">
		<ul>
			<li><h1>ONESTYLE撮影お申込みのご案内</h1></li>
		</ul>
	</div>
	<!-- // #breadcrumb END -->

	<div id="contents">
		<?php
			//$_POST['name'] →$nameへ、$name= 値（江藤）といった具合で挿入されます
			session_start();
			foreach($_POST as $k=>$v){
			  $_SESSION["data"][$k] = $v;
			}
		?>
		
		<!-- 入力した値が表示されます -->

       <?php foreach ($_POST as $v) { ?>
			<p><?php echo $v; ?></p>
        <?php } ?>
        
		<section id="mail-form" name="mail-form">
			<h2>撮影のお申し込み</h2>
			<div class="form-apply">
				
				<div class="check-form">
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
