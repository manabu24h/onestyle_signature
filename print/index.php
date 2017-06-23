<?php
$Path = $_SERVER['DOCUMENT_ROOT'] . '/onestyle/signature/';
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
    header('Location: index.php');
    exit;
}

$home = 'http://sign.onestyle.co.jp/';
?>

<!DOCTYPE html>
<html>
	
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<title>撮影お申込み書</title>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $home; ?>print.css" />
</head>

<body>
	
<div id="container" class="app-form">
	<h2>撮影申込書</h2>
	
	<div class="consent">
		<section class="cons-sec cons-01">
			<h3>【撮影について】</h3>
			<section class="item">
				<h4>撮影時間</h4>
				<p>撮影時間の延長は、30分ごとに10,000円となります。撮影場所により、延長料金が異なる可能性がございますので、事前にご確認頂きますようお願い申し上げます。</p>
			</section>
			<section class="item">
				<h4>撮影内容</h4>
				<ol>
					<li>撮影内容（構図・補正なども含む）はカメラマンにお任せいただきます。具体的なご希望がございましたら、撮影の1週間前までにスタッフにご連絡くださいませ。</li>
					<li>当日のリクエストにつきましては、内容によってはお受け出来ない場合もございます。</li>
					<li>フォトグラファーとのお打合せは、1回3,000円を頂戴いたします。</li>
				</ol>
			</section>
			<section class="item">
				<h4>仕上がり、カット数</h4>
				<ol>
					<li>ご注文の合計カット数を基本に撮影を行いますが当日の状況によりカット数が増減する場合がございます。</li>
					<li>目つぶり、適正外露出、ストロボの不発などについては、弊社でカットさせて頂き納品致しますが、表情違いなどの似たカットが納品データに含まれますので、あらかじめご了承くださいませ。</li>
					<li>撮影イメージの差異による、仕上がりのクレームにつきましてはお受け致しかねます。</li>
					<li>仕上がりの写真データはダウンロード形式でのお渡しになります。</li>
					<li>納品データサイズは、JPEG・長辺3000ピクセル以上・350dpiとなります。</li>
					<li>RAWデータのお渡しはお受けしておりません。</li>
				</ol>
			</section>
			<section class="item">
				<h4>雨天の場合</h4>
				<ol>
					<li>室内のロケーション（チャペル・洋館・庭園の和室など）でお申込みの場合、雨天順延はできません。</li>
					<li>屋外ロケーションのみの撮影の場合、前日の14時までにご判断頂ければ無料で順延対応させて頂きます。順延が決定した段階で、次の撮影候補日を決定するため、ご希望に添えない可能性がございます。</li>
				</ol>
			</section>
		</section><!-- // cons-01 END -->
		
		<section class="cons-sec cons-02">
			<h3>【メイク・衣装について】</h3>
			<section class="item">
				<h4>メイク</h4>
				<ol>
					<li>当日のイメージの差異による、仕上がりのクレームにつきましてはお受け致しかねます。事前のメイクリハーサルをご利用下さい。</li>
					<li>撮影中メイクスタッフはおりません。ご希望の際にはメイクアテンドを事前にお申し出下さい。</li>
					<li>肌が弱い方は、いつも使用されているメイク道具をお持ち下さい。お肌のトラブルに関してのクレームにつきましてはお受け致しかねます。</li>
					<li>ヘアメイクについてのご希望は、撮影1週間前までにスタッフにご連絡頂きますようお願いいたします。</li>
				</ol>
			</section>
			<section class="item">
				<h4>衣装</h4>
				<ol>
					<li>ドレスによっては貸出等でご紹介できない場合もございます。</li>
					<li>撮影の日程変更および順延の際、衣装の貸し出し中などの理由により衣装をご変更頂く可能性がございます。予めご了承ください。</li>
					<li>お持ち込みの場合のお持ち込み料は発生いたしません。ただし、ヘアメイクアテンドを必ずご発注ください。</li>
					<li>衣装については撮影の前日着で指定の場所へ配送頂きますようお願い致します。送料などは、お客様にてご負担頂きます。</li>
				</ol>
			</section>
		</section><!-- // cons-02 END -->
		
		<section class="cons-sec cons-03">
			<h3>【商品について】</h3>
			<section class="item">
				<h4>納期</h4>
				<ol>
					<li>撮影のみの場合は、撮影日から約３週間程でフォトデータを納品いたします。年末年始など、通常よりも納品にお時間がかかる期間がございます。</li>
					<li>アルバムをご注文の場合、デザインのご確認と校了を頂いてから、約1ヵ月後にお渡しとなります。</li>
				</ol>
			</section>
			<section class="item">
				<h4>データの保存</h4>
				<ol>
					<li>弊社データの保存期間は、撮影日より６ヶ月とさせて頂きます。</li>
				</ol>
			</section>
		</section><!-- // cons-03 END -->
		
		<section class="cons-sec cons-04">
			<h3>【お支払い・キャンセル・日程変更について】</h3>
			<section class="item">
				<h4>お支払い</h4>
				<ol>
					<li>撮影のご決定を頂きましたら、ご案内後１週間以内にお申込み金のお振込、また当書面（重要事項確認書）のご提出をお願いいたします。</li>
					<li>お申込み金のご入金、または当書面（重要事項確認書）を弊社が受理した時点で、契約成立となりますので、これ以降のキャンセルには下記のキャンセル料が発生いたします。ご指定日を過ぎてご入金の確認が取れない場合は、カメラマンのスケジュールを押さえることが出来ない場合がございます。最終見積もりが確定致しましたら、指定の期限までに残金をお振込み頂きますようお願いいたします。</li>
				</ol>
			</section>
			<section class="item">
				<h4>キャンセル</h4>
				<ol>
					<li>お申し込み後のキャンセルには下記キャンセル料金が発生いたします。</li>
					<li>キャンセルのお申し出の際は、メールまたは書面にてご連絡をお送りください。メール送信日時及び書類到達日時を基準とさせていただきます。（ご連絡後、3日以内に弊社より受領のご連絡が届かない際には必ずご連絡くだいさますよう、宜しく御願いいたします。）</li>
				</ol>
				<p class="cxl-fee">
					ご契約日～撮影の31日前<span class="fee">50,000円</span><br />
					撮影の30日前 ～撮影の14日前<span class="fee">お見積り総額の50％円</span><br />
					撮影の13日前 ～撮影日当日<span class="fee">お見積り総額の100％</span><br />
				</p>
			</section>
			<section class="item">
				<h4>日程変更</h4>
				<ol>
					<li>お申し込み後のお客様都合による日程変更は、下記日程変更料が発生いたします。</li>
				</ol>
				<p class="cxl-fee">
					ご契約日～撮影の31日前<span class="fee">10,000円（チャペル・洋館プランの場合50,000円）</span><br />
					撮影の30日前 ～撮影の14日前<span class="fee">20,000円（チャペル・洋館プランの場合70,000円）</span><br />
					撮影の13日前 ～撮影日当日<span class="fee">50,000円（チャペル・洋館プランの場合90,000円）</span><br />
				</p>
			</section>
		</section><!-- // cons-04 END -->
	</div><!-- // consent END -->
	
	<div class="apply">
		<p class="note">上記の内容を確認し、同意いたしました。</p>
		<dl>
			<dt></dt>
			<dd>
				<p class="dt-date">（お申し込み日）  <span class="val"><?php echo $do_date;?></span></p>
				<p class="dt-sign">（ご署名） <span class="label">新郎：</span><span class="val"><?php echo $data["groom_name"];?></span> <span class="label">新婦：</span><span class="val"><?php echo $data["bride_name"];?></span></p>
			</dd>
			<dd>
				<p class="dt-date">（ご住所） <span class="val"><?php echo $data["zip1"];?>-<?php echo $data["zip2"];?> <?php echo $data["prefecture"];?> <?php echo $data["address"];?></span></p>
			</dd>
			<dd>
				<p>※撮影後、弊社販促広告サンプルへの使用許諾 
					<?php if($data["radio_venue"]) { ?>
						<span class="val">使用可</span>
					<?php } else { ?>
						<span class="val">使用不可</span>
					<?php } ?>
				</p>
			</dd>
		</dl>
	</div>

</div>
<!-- // #container END -->

</body>
</html>
