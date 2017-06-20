<?php // 共通ヘッダー
	$Path = $_SERVER['DOCUMENT_ROOT'] . '/onestyle/signature/';
        //$Path = $_SERVER['DOCUMENT_ROOT'] . "/";
	include( $Path . 'header.php');
?>

<div id="container" class="">
	<div id="breadcrumb">
		<ul>
			<li><h1><a href="<?php echo $Path; ?>">ONESTYLE撮影お申込みのご案内</a><span class="arrow">＞</span></h1></li>
			<li><a href="<?php echo $Path; ?>">お衣装のご予約</a></li>
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
		
		<p><a href="index.php">戻る</a></p>
		<p><a href="send.php">送る</a></p>

	</div>
	<!-- // #contents END -->

</div>
<!-- // #container END -->

<?php include( $Path . 'footer.php'); // 共通フッター ?>
