<?php
session_start();
/* session_start()の書く位置は<?phpの直下 */

foreach($_POST as $k=>$v){
  $_SESSION["data"][$k] = $v;
}

// 共通ヘッダー
// $Path = $_SERVER['DOCUMENT_ROOT'] . '/onestyle/signature/';
$Path = $_SERVER['DOCUMENT_ROOT'] ;
include( $Path . 'header.php');

?>

<div id="container" class="">
	<div id="breadcrumb">
		<ul>
			<li><h1>新型コロナウイルスに関する特則</h1></li>
		</ul>
	</div>
	<!-- // #breadcrumb END -->

	<div id="contents">
		
		<!-- 入力した値が表示されます -->
<!--
       <?php foreach ($_POST as $v) { ?>
			<p><?php echo $v; ?></p>
        <?php } ?>
-->
        
		<section id="mail-form" name="mail-form">
			<h2>非常時の特則に関する同意</h2>
			<div class="form-apply">
				
				<div class="check-form">
					<div class="unit">
						<p class="label must">《おふたりの氏名》</p>
						<dl>
<!-- 							<dt><span class="item">新郎様</span></dt> -->
							<dd><p class="value"><?php echo $_POST['groom_name']; ?></p></dd>
						</dl>
						<dl>
<!-- 							<dt><span class="item">新婦様</span></dt> -->
							<dd><p class="value"><?php echo $_POST['bride_name']; ?></p></dd>
						</dl>
					</div>
					
					<div class="unit">
						<p class="label">《メールアドレス》</p>
						<dl>
<!-- 							<dt><span class="item"></span></dt> -->
							<dd><?php echo $_POST['email']; ?></dd>
						</dl>
					</div>
					<div class="unit">
						<p class="label must">《送信日》</p>
						<dl>
							<dd><p class="value"><?php echo $_POST['date']; ?></p></dd>
						</dl>
					</div>
					<div class="submit-area clearfix">
						<p class="att">
							・迷惑メール防止の設定をされている場合は、「@onestyle.co.jp」をドメイン指定解除してください。
						</p>
						<div class="submit">
							<a class="bt-submit" href="./index.php#apply">編集へ戻る</a>
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
