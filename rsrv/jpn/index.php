<?php
session_start();

// 和装の衣装予約フォーム

// 共通ヘッダー
$Path = $_SERVER['DOCUMENT_ROOT'] ;
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

//確認ページで「戻る」を押した時に、入力した内容をそのまま表示させる記述です。
$date='';
$g_name='';
$b_name='';
$email ='';
$waso_1='';
$waso_2='';
$waso_3='';

if( isset($_SESSION['date'])){ $date = $_SESSION['date']; }
if( isset($_SESSION['g_name'])){ $g_name = $_SESSION['g_name']; }
if( isset($_SESSION['b_name'])){ $b_name = $_SESSION['b_name']; }
if( isset($_SESSION['email'])){ $email = $_SESSION['email']; }
if( isset($_SESSION['waso_1'])){ $waso_1 = $_SESSION['waso_1']; }
if( isset($_SESSION['waso_2'])){ $waso_2 = $_SESSION['waso_2']; }
if( isset($_SESSION['waso_3'])){ $waso_3 = $_SESSION['waso_3']; }

?>

<script>
	$(function() {
		jQuery("#apply").validationEngine();
				
		$("#datepicker").datepicker({
			 minDate: '0y', //今日から
			 maxDate: '+2y', //5年後までが選択可能範囲
		});
	});
</script>

<div id="container" class="">
	<div id="breadcrumb">
		<ul>
			<li><h1><a href="<?php echo $home; ?>">ONESTYLE撮影お申込みのご案内</a><span class="arrow">＞</span></h1></li>
			<li><a href="<?php echo $home; ?>rsrv">衣装のご予約</a><span class="arrow">＞</span></li>
			<li><a href="">和装の衣装予約</a></li>
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
		
		<section id="mail-form" name="mail-form">
			<h2>和装の衣装予約</h2>
			<div class="form-apply">
		
				<form id="apply" action="check.php" method="POST" >
					<div class="unit">
						<p class="label">《撮影日》</p>
						<dl>
							<dd><input id="datepicker" type="text" name="date" value="<?php echo $date; ?>" size="40" class="" aria-required="true" aria-invalid="false" placeholder="" /></dd>
						</dl>			
					</div>
					
					<div class="unit">
						<p class="label">《おふたりの氏名》</p>
						<dl>
							<dt><span class="item">新郎様</span></dt>
							<dd><input type="text" name="g_name" value="<?php $id = $_GET['id']; if($id): ?><?php echo $data["groom_name"];?><?php else: ?><?php echo $g_name; ?><?php endif; ?>" size="40" class="validate[required]" id="g_name" aria-required="true" aria-invalid="false" /></dd>
						</dl>
						<dl>
							<dt><span class="item">新婦様</span></dt>
							<dd><input type="text" name="b_name" value="<?php $id = $_GET['id']; if($id): ?><?php echo $data["bride_name"];?><?php else: ?><?php echo $b_name; ?><?php endif; ?>" size="40" class="validate[required]" id="b_name" aria-required="true" aria-invalid="false" /></dd>
						</dl>			
					</div>
					
					<div class="unit">
						<p class="label">《代表の方のご連絡先》</p>
						<dl>
							<dt><span class="item">メールアドレス</span></dt>
							<dd><input type="text" name="email" value="<?php $id = $_GET['id']; if($id): ?><?php echo $data["email"];?><?php else: ?><?php echo $email; ?><?php endif; ?>" size="40" class="validate[required,custom[email]]" id="email" aria-required="true" aria-invalid="false" placeholder="半角で入力してください" /></dd>
						</dl>		
					</div>
					
					<div class="unit">
						<p class="label must">《ご予約希望（和装）》</p>
						<dl>
							<dt>第一希望</dt>
							<dd>
								<input class="w120" type="text" name="waso_1" value="<?php echo $waso_1; ?>" size="6" id="waso_1" aria-required="true" aria-invalid="false" placeholder="和装カタログの品番" />
							</dd>
						</dl>
						<dl>
							<dt>第二希望</dt>
							<dd>
								<input class="w120" type="text" name="waso_2" value="<?php echo $waso_2; ?>" size="6" id="waso_2" aria-required="true" aria-invalid="false" placeholder="和装カタログの品番" />
							</dd>
							</dd>
						</dl>
						<dl>
							<dt>第二希望</dt>
							<dd>
								<input class="w120" type="text" name="waso_3" value="<?php echo $waso_3; ?>" size="6" id="waso_3" aria-required="true" aria-invalid="false" placeholder="和装カタログの品番" />
							</dd>
							</dd>
						</dl>
						<p class="att">※第二希望まで必ずご入力ください。ご予約済でご案内できない場合はご連絡させて頂きます。</p>
					</div>
					
					<div class="submit-area clearfix">
						<div class="submit">
							<input id="submit" type="submit" value="確認画面へ進む" class="bt-submit" />
						</div>
					</div>
				</form>

				
			</div>
		</section>
		<!-- // #mail-form END -->

		
	</div>
	<!-- // #contents END -->

</div>
<!-- // #container END -->

<?php include( $Path . 'footer.php'); // 共通フッター ?>