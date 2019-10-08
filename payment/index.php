<?php // 共通ヘッダー
	$Path = $_SERVER['DOCUMENT_ROOT'] ;
	include( $Path . 'header.php');
?>

<div id="container" class="payment">
	<div id="breadcrumb">
		<ul>
			<li><h1><a href="<?php echo $home; ?>">ONESTYLE撮影お申込みのご案内</a><span class="arrow">＞</span></h1></li>
			<li><a href="<?php echo $home; ?>rsrv">衣装のご予約</a><span class="arrow">＞</span></li>
			<li><a href="">お支払いについて</a></li>
		</ul>
	</div>
	<!-- // #breadcrumb END -->

	<div id="contents">
		<div class="intro sp-non">
			<div class="step-nav">
				<a href="<?php echo $home; ?>">① 撮影申込書のご提出</a>
				<a href="<?php echo $home; ?>rsrv/">② 衣装のご予約</a>
				<span class="flow-current flow-last" href="<?php echo $home; ?>payment">③ お支払いについて</span>
			</div>
		</div>
		<!-- // .intro END -->
		
		<?php $submit = $_GET['submit']; if($submit == '1'): ?>
			<section class="success">
				<h2>ご予約のお申し込みメールの送信が完了いたしました。</h2>
			</section>
		<?php endif; ?>
		
		<section class="flow">
			<h2>お支払いについて</h2>
			<p class="b-txt">スタジオフォトとロケーションフォトで、お支払いの流れが異なりますのでご注意ください。</p>
			
			<section class="fl-unit ">
				<h3>スタジオ撮影（スタジオスタンダード / スタジオプレミアム）</h3>
				<p class="b-txt">ONESTYLEよりご案内しております撮影料金の全額を、お申込みから5日以内にご入金頂いております。（お申込み日とは、お客様より撮影予約のご連絡を頂いた日時となります。）</p>
			</section><!-- // .fl-unit END -->
			
			<section class="fl-unit ">
				<h3>ロケーション撮影</h3>
				<p class="b-txt">
					ONESTYLEよりご案内しております撮影料金のうち、お申込み金（お内金）として￥50,000を、お申込みから5日以内にご入金頂いております。<br />
					（お申込み日とは、お客様より撮影予約のご連絡を頂いた日時となります。）<br />
					衣装決定後5日以内に、最終見積もりからお申込み金（お内金）を差し引いた残額をご入金ください。和装の場合、お申込み後すぐに衣装決定が可能ですので、全額一括でご入金頂くことも可能です。　
				</p>
			</section><!-- // .fl-unit END -->
			
			<div class="fl-unit ">
				<p class="b-txt">
					（お振込先）<br />
					<strong>■ 銀行名：みずほ銀行（0001）</strong><br />
					<strong>■ 支店名：渋谷中央支店（162）</strong><br />
					<strong>■ 口座番号：（普通）1690869</strong><br />
					<strong>■ 口座名義：株式会社ＯＮＥＳＴＹＬＥ</strong><br />
					<br />
					※お振込手数料は恐れ入りますがお客様ご負担にてお願いいたします。<br />
					※撮影直前でご料金の追加が発生した場合は、撮影当日に現金でご精算頂きますようお願い致します。<br />
					※クレジットカードのお取り扱いはしておりません。
				</p>
			</div<!-- // .fl-unit END -->
		</section>
		<!-- // .plan END -->
		
	</div>
	<!-- // #contents END -->

</div>
<!-- // #container END -->

<?php include( $Path . 'footer.php'); // 共通フッター ?>