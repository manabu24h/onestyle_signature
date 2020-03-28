<?php
	require_once ( $Path . '/lib/Mobile_Detect.php');
	$detect = new Mobile_Detect;
?> 


<footer>
	<div class="step-nav sp-on">
		<a href="<?php echo $home; ?>">① 撮影申込書のご提出</a>
		<a href="<?php echo $home; ?>rsrv/">② 衣装のご予約</a>
		<a href="<?php echo $home; ?>payment/">③ お支払いについて</a>
	</div>
	
	<div class="access-info">
		<section class="studio std-01">
			<h2><span class="jpn">表参道店</span><br /><span class="eng">OMOTESANDO</span></h2>
			<p class="tel">
				<span class="label">tel.</span>
				<?php if ( $detect->isMobile() ) : ?>
					<a class="tel-link" href="tel:0367210592" onclick="ga('send','event','電話リンク','タップ','表参道');">03-6721-0592</a>
				<?php else : ?>
					<span class="tel-link">03-6721-0592</span>
				<?php endif; ?>
			</p>
			<p class="biz-info">
				<span class="hour">【営業時間】平日12:00-19:00 土日祝10:00-19:00</span><br />
				<span class="date">【定休日】火曜（年末年始）</span>
			</p>
			<p class="addr">
				<span class="zip-code">〒150-0001</span>
				<span class="jpn">東京都渋谷区神宮前3-38-1 JP-4ビル1階</span>
			</p>
		</section><!-- //表参道店 END -->
		
		<section class="studio std-01">
			<h2><span class="jpn">横浜店</span><br /><span class="eng">YOKOHAMA</span></h2>
			<p class="tel">
				<span class="label">tel.</span>
				<?php if ( $detect->isMobile() ) : ?>
					<a class="tel-link" href="tel:0455947684" onclick="ga('send','event','電話リンク','タップ','横浜店');">045-594-7684</a>
				<?php else : ?>
					<span class="tel-link">045-594-7684</span>
				<?php endif; ?>
			</p>
			<p class="biz-info">
				<span class="hour">【営業時間】平日12:00-19:00 土日祝10:00-19:00</span><br />
				<span class="date">【定休日】火曜（年末年始）</span>
			</p>
			<p class="addr">
				<span class="zip-code">〒220-0005</span>
				<span class="jpn">神奈川県横浜市西区南幸2-11-11<br />グランツ南幸5階</span>
			</p>
		</section><!-- // 横浜店 END -->
		
		<section class="studio std-01">
			<h2><span class="jpn">仙台店</span><br /><span class="eng">SENDAI</span></h2>
			<p class="tel">
				<span class="label">tel.</span>
				<?php if ( $detect->isMobile() ) : ?>
					<a class="tel-link" href="tel:0223977481" onclick="ga('send','event','電話リンク','タップ','横浜店');">045-594-7684</a>
				<?php else : ?>
					<span class="tel-link">022-397-7481</span>
				<?php endif; ?>
			</p>
			<p class="biz-info">
				<span class="hour">【営業時間】平日12:00-19:00 土日祝10:00-19:00</span><br />
				<span class="date">【定休日】火・水曜（年末年始）</span>
			</p>
			<p class="addr">
				<span class="zip-code">〒980-0803</span>
				<span class="jpn">宮城県仙台市青葉区国分町3-2-5<br />ゼロキュービル5階</span>
			</p>
		</section><!-- // 横浜店 END -->
	</div>
	<!-- //access-info END -->
	
</footer>

</body>
</html>