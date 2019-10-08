<?php // 洋装の試着予約フォーム
	
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
session_start();
$date='';
$g_name='';
$b_name='';
$email ='';
$g_height='';
$g_size='';
$g_shoe='';
$b_height='';
$b_size='';
$b_shoe='';
$slc_date1='';
$slc_date2='';
$slc_time1='';
$slc_time2='';
$message='';

if( isset($_SESSION['date'])){ $date = $_SESSION['date']; }
if( isset($_SESSION['email'])){ $email = $_SESSION['email']; }
if( isset($_SESSION['g_name'])){ $g_name = $_SESSION['g_name']; }
if( isset($_SESSION['g_height'])){ $g_height = $_SESSION['g_height']; }
if( isset($_SESSION['g_size'])){ $g_size = $_SESSION['g_size']; }
if( isset($_SESSION['g_shoe'])){ $g_shoe = $_SESSION['g_shoe']; }
if( isset($_SESSION['b_name'])){ $b_name = $_SESSION['b_name']; }
if( isset($_SESSION['b_height'])){ $b_height = $_SESSION['b_height']; }
if( isset($_SESSION['b_size'])){ $b_size = $_SESSION['b_size']; }
if( isset($_SESSION['b_shoe'])){ $b_shoe = $_SESSION['b_shoe']; }
if( isset($_SESSION['message'])){ $message = $_SESSION['message']; }

// check_dat
////// 時間リスト //////
$time_list = array(
''=>'--', '9時〜'=>'9時〜', '10時〜'=>'10時〜','11時〜'=>'11時〜', 
);

////// 撮影日時 入力内容 //////

$date_array = array();
$now = time(); //今の時間を取得
$yasumi = file( dirname(__FILE__) . '/lib/yasumi.txt', FILE_IGNORE_NEW_LINES); // 店休日を配列に取得

for($i=2; $i<90; $i++){
$time = strtotime(sprintf("+%d days", $i));
if (date('w', $time) == 2) { continue; } // 火曜はskip
/*
if (date('w', $time) == 6) { continue; } // 土曜はskip
if (date('w', $time) == 0) { continue; } // 日曜はskip
*/
if (in_array(date('Ymd', $time), $yasumi)) { continue; } // （土日以外の）店休日ならskip
$date_array[] = date_ex($time);
}

function date_ex($time){
$kanji_w = array('日', '月', '火', '水', '木', '金', '土');
$w = date('w', $time);
$w = '('.$kanji_w[$w].')';
$date = date('n月j日 ', $time);

return $date.$w;
}

// slc_date & slc_time
$_POST['date1_return'] = $_SESSION['date1_return'];
$_POST['date2_return'] = $_SESSION['date2_return'];
$_POST['time1_return'] = $_SESSION['time1_return'];
$_POST['time2_return'] = $_SESSION['time2_return'];

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
			<li><a href="">洋装の試着予約</a></li>
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
			<h2>洋装の試着予約</h2>
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
						<p class="label">《サイズ》</p>
						<dl>
							<dt><span class="item">新郎様</span></dt>
							<dd>
								<span><input class="w40 validate[required]" type="text" name="g_height" value="<?php echo $g_height; ?>" size="6" id="g_height" aria-required="true" aria-invalid="false" placeholder="身長" /> cm</span>
								<span><input class="w40 validate[required]" type="text" name="g_size" value="<?php echo $g_size; ?>" size="40" id="g_size" aria-required="true" aria-invalid="false" placeholder="服" /></span>
								<span><input class="w40 validate[required]" type="text" name="g_shoe" value="<?php echo $g_shoe; ?>" size="40" id="g_shoe" aria-required="true" aria-invalid="false" placeholder="靴" /> cm</span>
							</dd>
						</dl>
						<dl>
							<dt><span class="item">新婦様</span></dt>
							<dd>
								<span><input class="w40 validate[required]" type="text" name="b_height" value="<?php echo $b_height; ?>" size="6" id="b_height" aria-required="true" aria-invalid="false" placeholder="身長" /> cm</span>
								<span><input class="w40 validate[required]" type="text" name="b_size" value="<?php echo $b_size; ?>" size="40" id="b_size" aria-required="true" aria-invalid="false" placeholder="服" /></span>
								<span><input class="w40 validate[required]" type="text" name="b_shoe" value="<?php echo $b_shoe; ?>" size="40" id="b_shoe" aria-required="true" aria-invalid="false" placeholder="靴" /> cm</span>
							
							</dd>
						</dl>			
					</div>
					
					<div id="u_date" class="unit">
						<p class="label must">《ご来店希望日時》</p>
						<dl>
							<dt>第一希望</dt>
							<dd>
								<select name="slc_date1" class="slc-day1 slc-day validate[required]" aria-invalid="false">
									<option value="">---</option>
									<?php
										foreach( $date_array as $key => $value){
										 if($value == $_POST['date1_return']){
										        echo "<option value='$value' selected>".$value."</option>";
										    }else{
										        echo "<option value='$value'>".$value."</option>";
										    }
										}
									?>
								</select>
								<select name="slc_time1" class="slc-time" aria-invalid="false">
									<?php
										foreach( $time_list as $key => $value){
										 if($value == $_POST['time1_return']){
										        echo "<option value='$value' selected>".$value."</option>";
										    }else{
										        echo "<option value='$value'>".$value."</option>";
										    }
										}
									?>
								</select>
							</dd>
						</dl>
						<dl>
							<dt>第二希望</dt>
							<dd>
								<select name="slc_date2" class="slc-day2 slc-day validate[required]" aria-invalid="false">
									<option value="">---</option>
									<?php
										foreach( $date_array as $key => $value){
										 if($value == $_POST['date2_return']){
										        echo "<option value='$value' selected>".$value."</option>";
										    }else{
										        echo "<option value='$value'>".$value."</option>";
										    }
										}
									?>
								</select>
								<select name="slc_time2" class="slc-time" aria-invalid="false">
									<?php
										foreach( $time_list as $key => $value){
										 if($value == $_POST['time2_return']){
										        echo "<option value='$value' selected>".$value."</option>";
										    }else{
										        echo "<option value='$value'>".$value."</option>";
										    }
										}
									?>
								</select>
							</dd>
						</dl>
						<p class="att">※見学予約については、第二希望まで必ずご入力ください。</p>
					</div>
					
					<div class="unit">
						<p class="label">《ご質問・ご要望》</p>
						<dl>
							<dd><textarea id="message" name="message" cols="40" rows="10" class="textarea" aria-invalid="false" placeholder="そのほか、ご希望やご相談がありましたらご記載ください。" ><?php echo $message; ?></textarea></dd>
						</dl>	
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