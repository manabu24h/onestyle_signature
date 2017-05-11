<?php // 共通ヘッダー
	$Path = $_SERVER['DOCUMENT_ROOT'] . '/onestyle/signature/';
	include( $Path . 'header.php');
?>

<div id="container" class="">
	<div id="breadcrumb">
		<ul>
			<li><a href="<?php echo $Path; ?>">ONESTYLE撮影お申込みのご案内</a><span class="arrow">＞</span></li>
			<li><a href="<?php echo $Path; ?>">お衣装のご予約</a></li>
		</ul>
	</div>
	<!-- // #breadcrumb END -->

	<div id="contents">
		<div class="intro">
			<h1>ONESTYLE撮影お申込みのご案内</h1>
			<p class="b-txt">このたびはONESTYLEのフォトウェディングにお申込み頂きありがとうございます！<br class="sp-non" />今後の流れやお申込みの手続きについて、ご確認頂きますようお願い申し上げます。</p>
			<div class="step-nav">
				<span class="flow-current" href="">① 撮影申込書のご提出</span>
				<a href="">② お衣装のご予約</a>
				<a class="flow-last" href="">③ お支払いについて</a>
			</div>
		</div>
		<!-- // .intro END -->
		
		<?php echo "git テストの続きの続き"; ?>
		
	</div>
	<!-- // #contents END -->

</div>
<!-- // #container END -->

<?php include( $Path . 'footer.php'); // 共通フッター ?>