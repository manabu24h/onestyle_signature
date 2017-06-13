<?php // 共通ヘッダー
	$Path = $_SERVER['DOCUMENT_ROOT'] . '/onestyle/signature/';
	include( $Path . 'header.php');
?>

<div id="container" class="">
	<div id="breadcrumb">
		<ul>
			<li><h1><a href="<?php echo $home; ?>">ONESTYLE撮影お申込みのご案内</a><span class="arrow">＞</span></h1></li>
			<li><a href="">お衣装のご予約</a></li>
		</ul>
	</div>
	<!-- // #breadcrumb END -->

	<div id="contents">
		<?php $id = $_GET['id']; if($id == '1'): ?>
			<section class="success">
				<h2>ご予約のお申し込みメールの送信が完了いたしました。</h2>
			</section>
		<?php endif; ?>
		
		<section class="intro">
			<h2>ONESTYLE撮影お申込みのご案内</h2>
			<p class="b-txt">このたびはONESTYLEのフォトウェディングにお申込み頂きありがとうございます！<br class="sp-non" />今後の流れやお申込みの手続きについて、ご確認頂きますようお願い申し上げます。</p>
			<div class="step-nav">
				<a href="<?php echo $home; ?>">① 撮影申込書のご提出</a>
				<span class="flow-current">② お衣装のご予約</span>
				<a class="flow-last" href="<?php echo $home; ?>payment">③ お支払いについて</a>
			</div>
		</section>
		<!-- // .intro END -->
		
		<section class="plan">
			<h2>お衣装のご予約</h2>
			<p class="b-txt">お申込みいただいた撮影の内容を選択し、お衣装のご予約にお進みください。</p>
			
			<nav class="p-nav">
				<a class="bt-type1" href="#pl-st">
					スタジオスタンダード<br />1DAY完結プラン<br />
					<span class="mini">（表参道店のみのご案内です）</span>
				</a>
				<a class="bt-type1" href="#pl-lc">
					スタジオプレミアム<br />または<br />ロケーションフォト
				</a>
			</nav>
			
			<a name="pl-st" id="pl-st"></a>
			<section class="pl-unit ">
				<h3>スタジオスタンダード 1DAY完結プラン<br />（表参道店のみのご案内です）</h3>
				<p class="b-txt">撮影1週間前までに、サイズの入力をお願い致します。<br />和装は事前にセレクト頂き、洋装は当日ご試着のうえ、撮影にはいらせて頂きます。<br />なお、衣装の空き状況などのご相談は承っておりません。サイズや素材など気になる方は、スタジオプレミアム（追加1万円）にご変更のうえ、事前試着をされますことをお勧め致します。</p>
				<ul>
					<li class="item">
						<div class="thumb">
							<a href="">
								<img src="<?php echo $img ; ?>thumb_pl_st_wa.png" alt="" />
								<span class="bt-type1">和装カタログ</span>
							</a>
						</div>
						<p class="detail">和装については、以下の和装カタログからセレクトして頂きます。セレクトして頂くお衣装によって、追加料金が発生するものがございますのでご注意くださいませ。<br />なお、横浜店のお衣装をセレクトされた場合、お取り寄せ料金が別途1万円発生致します。</p>
					</li>
					<li class="item">
						<div class="thumb">
							<a href="">
								<img src="<?php echo $img ; ?>thumb_pl_st_dr.png" alt="" />
								<span class="bt-type1">洋装カタログ</span>
							</a>
						</div>
						<p class="detail">洋装については、当日約1時間のお時間で、ご試着のうえご決定頂きます。セレクトして頂くお衣装によって、追加料金が発生するものがございますのでご注意くださいませ。<br />事前に以下のカタログをご覧頂き、1点のみでしたらお取り置きしておくことも可能です。<br />（当日、お衣装のご変更を頂いてもかまいません）</p>
					</li>
				</ul>
				
				<a href="./oneday/" class="bt-type1">サイズの入力・衣装予約</a>
			</section><!-- // .pl-unit END -->
			
			<a name="pl-lc" id="pl-lc"></a>
			<section class="pl-unit ">
				<h3>スタジオプレミアム または、ロケーションフォト</h3>
				<p class="b-txt cl-f00">他のお客様がレンタルされている期間や、クリーニングやメンテナンス中などの理由で、ご希望のお衣装をお貸出しできない可能性がございますので、できる限り早くご予約頂くようお勧め致します。<br />（撮影の2～3週間前にはご予約を完了されるようお願い致します）</p>
				<ul class="clmn-1">
					<li class="item clearfix">
						<div class="thumb">
							<a href="">
								<img src="<?php echo $img ; ?>thumb_pl_lc_wa.png" alt="" />
								<span class="bt-type1">和装カタログ</span>
							</a>
						</div>
						<p class="detail"><span class="label">和装は、和装カタログからセレクトして頂きます。</span><br />セレクトして頂くお衣装によって、追加料金が発生するものがございますので、ご注意くださいませ。<br />東京のロケーションフォトのお客様は表参道店のお衣装から、横浜のロケーションフォトのお客様は横浜店のお衣装からセレクトして頂きますが、他店舗のお衣装でもお取り寄せ可能です。（お取り寄せ料金1万円）<br />なお、それぞれの店舗のお衣装を実際にご覧になりたい場合、お袖を通すなどをお試しになりたい場合は平日のみ、ご予約をもって対応させて頂いております。（予約がない場合はご案内できません）</p>
					</li>
				</ul>
				
				<a href="./jpn/" class="bt-type1">和装見学予約</a>
				
				<a href="" class="bt-type1">撮影日に衣装を予約する</a>
				
				<ul class="clmn-1" style="padding-top: 32px;">
					<li class="item clearfix">
						<div class="thumb">
							<a href="">
								<img src="<?php echo $img ; ?>thumb_pl_lc_dr.png" alt="" />
								<span class="bt-type1">洋装カタログ</span>
							</a>
						</div>
						<p class="detail"><span class="label">洋装については、事前のご試着を行って頂いております。</span><br /><span class="cl-f00">なお、お衣装のご試着についてはONESTYLE表参道店のみのご案内となっております。</span><br />セレクトして頂くお衣装によって、追加料金が発生するものがございますので、ご注意くださいませ。事前のご来店が難しい場合には、撮影日当日のご試着も可能でございます。ただし、サイズ感が合わないなどの理由で撮影キャンセルを承ることはできません。原則、事前のご試着をお願いしております。</p>
					</li>
				</ul>
				
				<a href="./drs/" class="bt-type1">洋装の試着予約</a>
			</section><!-- // .pl-unit END -->
		</section>
		<!-- // .plan END -->
		
	</div>
	<!-- // #contents END -->

</div>
<!-- // #container END -->

<?php include( $Path . 'footer.php'); // 共通フッター ?>