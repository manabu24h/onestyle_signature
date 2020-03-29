<?php // 共通ヘッダー
	
$Path = $_SERVER['DOCUMENT_ROOT'];
include( $Path . 'header.php');

require_once $Path ."lib/Database.php";
$db = Database::getConnection();
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = $_GET["id"];

    $stmt = $db->query("SELECT * FROM customers WHERE id=".$id);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    $sp_date = explode(" ", $data["created_at"]);
    $sp_date = explode("-", $sp_date[0]);
    $do_date = $sp_date[0] . "年" . $sp_date[1] . "月" . $sp_date[2] . "日";
} else {
/*
    header('Location: index.php');
    exit;
*/
}

?>

<div id="container" class="">
	<div id="breadcrumb">
		<ul>
			<li><h1><a href="<?php echo $home; ?>">ONESTYLE撮影お申込みのご案内</a><span class="arrow">＞</span></h1></li>
			<li><a href="">衣装のご予約</a></li>
		</ul>
	</div>
	<!-- // #breadcrumb END -->

	<div id="contents">
		<div class="intro sp-non">
			<div class="step-nav">
				<a href="<?php echo $home; ?>">① 撮影申込書のご提出</a>
				<span class="flow-current">② 衣装のご予約</span>
				<a class="flow-last" href="<?php echo $home; ?>payment">③ お支払いについて</a>
			</div>
		</div>
		<!-- // .intro END -->
		

		<?php $id = $_GET['id']; if($id): ?>
			<section class="success">
				<h2>撮影のお申込みメールの送信が完了いたしました。</h2>
				<p class="note">お申込みいただいた撮影プランをお選びいただき、衣装のご予約をお願いいたします。</p>
			</section>
		<?php endif; ?>
		
		<section class="plan">
			<h2>衣装のご予約</h2>
			<p class="b-txt">お申込みいただいた撮影の内容を選択し、衣装のご予約にお進みください。</p>
			
			<nav class="p-nav">
				<a class="bt-type1" href="#pl-st">
<!-- 					スタジオスタンダード<br /> -->1DAY完結プラン<br />
					<span class="mini">（当日試着 / カタログセレクト）</span>
				</a>
				<a class="bt-type1" href="#pl-lc">
					スタジオ / ロケーションフォト<br />
					<span class="mini">（お打合わせ・事前の試着あり）</span> 
				</a>
			</nav>
			
			<a name="pl-st" id="pl-st"></a>
			<section class="pl-unit ">
				<h3>1DAY完結プラン<br />（当日試着のみ）</h3>
				<p class="b-txt">撮影1週間前までに、サイズの入力をお願い致します。<br />和装は事前にセレクト頂き、洋装は当日ご試着のうえ、撮影にはいらせて頂きます。<br />なお、衣装の空き状況などのご相談は承っておりません。サイズや素材など気になる方は、事前のお打合わせありを行い、試着をされますことをお勧め致します。</p>
				<ul>
					<li class="item">
						<div class="thumb">
							<img src="<?php echo $img ; ?>thumb_pl_st_wa.png" alt="" />
							<span class="label">和装カタログ</span>
						</div>
						<p class="detail">和装については、以下の和装カタログからセレクトして頂きます。セレクトして頂く衣装によって、追加料金が発生するものがございますのでご注意くださいませ。<br />なお、他店舗の衣装をセレクトされた場合、お取り寄せ料金が別途1万円発生致します。</p>
						<a href="https://30d.jp/onestyle0916/969" target="_blank" class="bt-catalog">表参道店 和装カタログ</a>
						<a href="https://30d.jp/onestyle0916/970" target="_blank" class="bt-catalog">横浜店 和装カタログ</a>
						<a href="https://30d.jp/onestyle0916/1086" target="_blank" class="bt-catalog">仙台店 和装カタログ</a>
					</li>
					<li class="item">
						<div class="thumb">
							<img src="<?php echo $img ; ?>thumb_pl_st_dr.png" alt="" />
							<span class="label">洋装カタログ</span>
						</div>
						<p class="detail">洋装については、当日約1時間のお時間で、ご試着のうえご決定頂きます。セレクトして頂く衣装によって、追加料金が発生するものがございますのでご注意くださいませ。<br />事前に以下のカタログをご覧頂き、1点のみでしたらお取り置きしておくことも可能です。<br />（当日、衣装のご変更を頂いてもかまいません）</p>
						<a href="https://30d.jp/onestyle0916/963" target="_blank" class="bt-catalog">表参道店 洋装カタログ</a>
						<a href="https://30d.jp/onestyle0916/965" target="_blank" class="bt-catalog">横浜店 洋装カタログ</a>
						<a href="https://30d.jp/onestyle0916/1100" target="_blank" class="bt-catalog">仙台店 洋装カタログ</a>
					</li>
				</ul>
				<?php $id = $_GET['id']; if($id): ?>
					<a href="./oneday/index.php?id=<?php echo $id ;?>" class="bt-type1">サイズの入力・衣装予約</a>
				<?php else: ?>
					<a href="./oneday/" class="bt-type1">サイズの入力・衣装予約</a>
				<?php endif; ?>
			</section><!-- // .pl-unit END -->
			
			<a name="pl-lc" id="pl-lc"></a>
			<section class="pl-unit ">
				<h3>スタジオ / ロケーションフォト<br />（お打合わせ・事前の試着あり）</h3>
				<p class="b-txt cl-f00">他のお客様がレンタルされている期間や、クリーニングやメンテナンス中などの理由で、ご希望の衣装をお貸出しできない可能性がございますので、できる限り早くご予約頂くようお勧め致します。<br />（撮影の2～3週間前にはご予約を完了されるようお願い致します）</p>
				<ul class="clmn-1">
					<li class="item clearfix">
						<div class="thumb">
							<img src="<?php echo $img ; ?>thumb_pl_lc_wa.png" alt="" />
							<span class="label">和装カタログ</span>
						</div>
						<p class="detail"><span class="label">和装は、和装カタログからセレクトして頂きます。</span><br />セレクトして頂く衣装によって、追加料金が発生するものがございますので、ご注意くださいませ。<br />他店舗の衣装でもお取り寄せ可能です。（お取り寄せ料金1万円）<br />なお、それぞれの店舗の衣装を実際にご覧になりたい場合、お袖を通すなどをお試しになりたい場合は平日のみ、ご予約をもって対応させて頂いております。（予約がない場合はご案内できません）</p>
						<div class="parallel">
							<a href="https://30d.jp/onestyle0916/969" target="_blank" class="bt-catalog">表参道店 和装カタログ</a>
							<a href="https://30d.jp/onestyle0916/970" target="_blank" class="bt-catalog">横浜店 和装カタログ</a>
							<a href="https://30d.jp/onestyle0916/1086" target="_blank" class="bt-catalog">仙台店 和装カタログ</a>
						</div>
					</li>
				</ul>
				
				<?php $id = $_GET['id']; if($id): ?>
					<a href="./jpn/index.php?id=<?php echo $id ;?>" class="bt-type1">衣装を予約（和装）</a>
				<?php else: ?>
					<a href="./jpn/" class="bt-type1">衣装を予約（和装）</a>
				<?php endif; ?>
				
				<?php $id = $_GET['id']; if($id): ?>
					<a href="./jpn_tour/index.php?id=<?php echo $id ;?>" class="bt-type1">和装見学予約</a>
				<?php else: ?>
					<a href="./jpn_tour/" class="bt-type1">和装見学予約</a>
				<?php endif; ?>
				
			
				
				<ul class="clmn-1" style="padding-top: 32px;">
					<li class="item clearfix">
						<div class="thumb">
							<img src="<?php echo $img ; ?>thumb_pl_lc_dr.png" alt="" />
							<span class="label">洋装カタログ</span>
						</div>
						<p class="detail"><span class="label">洋装については、事前のご試着を行って頂いております。</span><br /><span class="cl-f00">※事前のご試着のご案内ができない店舗がございます。</span><br />セレクトして頂く衣装によって、追加料金が発生するものがございますので、ご注意くださいませ。事前のご来店が難しい場合には、撮影日当日のご試着も可能でございます。ただし、サイズ感が合わないなどの理由で撮影キャンセルを承ることはできません。原則、事前のご試着をお願いしております。</p>
						<div class="parallel">
							<a href="https://30d.jp/onestyle0916/963" target="_blank" class="bt-catalog">表参道店 洋装カタログ</a>
							<a href="https://30d.jp/onestyle0916/965" target="_blank" class="bt-catalog">横浜店 洋装カタログ</a>
							<a href="https://30d.jp/onestyle0916/1100" target="_blank" class="bt-catalog">仙台店 洋装カタログ</a>
						</div>
					</li>
				</ul>
				
				<?php $id = $_GET['id']; if($id): ?>
					<a href="./drs/index.php?id=<?php echo $id ;?>" class="bt-type1">洋装の試着予約</a>
				<?php else: ?>
					<a href="./drs/" class="bt-type1">洋装の試着予約</a>
				<?php endif; ?>
			</section><!-- // .pl-unit END -->
		</section>
		<!-- // .plan END -->
		
	</div>
	<!-- // #contents END -->

</div>
<!-- // #container END -->

<?php include( $Path . 'footer.php'); // 共通フッター ?>