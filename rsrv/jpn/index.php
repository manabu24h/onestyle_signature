<?php // 和装の見学予約フォーム
	
// 共通ヘッダー
$Path = $_SERVER['DOCUMENT_ROOT'] . '/onestyle/signature/';
include( $Path . 'header.php');

//確認ページで「戻る」を押した時に、入力した内容をそのまま表示させる記述です。	
session_start();
// $email ='';
$g_name='';
$b_name='';
$radio_venue='';
$slc_date1='';
$slc_date2='';
$slc_time1='';
$slc_time2='';
// $message='';

if( isset($_SESSION['g_name'])){ $g_name = $_SESSION['g_name']; }
if( isset($_SESSION['b_name'])){ $b_name = $_SESSION['b_name']; }

/* 確認画面から戻った時に、inputタグ内に「checked」を代入して複数選択を引き継ぐ。 */
// radio_plan
if( isset($_SESSION['radio_v_return'])){
	if($_SESSION['radio_v_return'] == '表参道店'){
	$p_chk1 = 'checked';
	}
	if($_SESSION['radio_v_return'] == '横浜店'){
	$p_chk2 = 'checked';
	}
}else{
}

// check_dat
////// 時間リスト //////
$time_list = array(
''=>'--', '午前'=>'午前', '12～15時'=>'12～15時', '15～18時'=>'15～18時', 
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

<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>

<script>
	$(function() {
		jQuery("#apply").validationEngine();
	});
</script>

<div id="container" class="">
	<div id="breadcrumb">
		<ul>
			<li><h1><a href="<?php echo $home; ?>">ONESTYLE撮影お申込みのご案内</a><span class="arrow">＞</span></h1></li>
			<li><a href="<?php echo $home; ?>rsrv">お衣装のご予約</a><span class="arrow">＞</span></li>
			<li><a href="">和装の見学予約</a></li>
		</ul>
	</div>
	<!-- // #breadcrumb END -->

	<div id="contents">
		<div class="intro">
			<div class="step-nav">
				<a href="<?php echo $home; ?>">① 撮影申込書のご提出</a>
				<span class="flow-current">② お衣装のご予約</span>
				<a class="flow-last" href="<?php echo $home; ?>payment">③ お支払いについて</a>
			</div>
		</div>
		<!-- // .intro END -->
		
		<section id="mail-form" name="mail-form">
			<h2>和装の見学予約</h2>
			<div class="form-apply">
		
				<form id="apply" action="check.php" method="POST" >
					<div class="unit">
						<p class="label">《おふたりの氏名》</p>
						<dl>
							<dt><span class="item">新郎様</span></dt>
							<dd><input type="text" name="g_name" value="<?php echo $g_name; ?>" size="40" class="validate[required]" id="g_name" aria-required="true" aria-invalid="false" /></dd>
						</dl>
						<dl>
							<dt><span class="item">新婦様</span></dt>
							<dd><input type="text" name="b_name" value="<?php echo $b_name; ?>" size="40" class="validate[required]" id="b_name" aria-required="true" aria-invalid="false" /></dd>
						</dl>			
					</div>
					
					<div class="unit">
						<p class="label must">《ご来店希望店舗》</p>
						<dl>
							<dd>
								<input type="radio" id="radio_vn1" name="radio_venue" value="表参道店" <?= $p_chk1 ?> />
								<label for="radio_vn1" class="check_css">表参道店</label>
							</dd>
							<dd>
								<input type="radio" id="radio_vn2" name="radio_venue" value="横浜店" <?= $p_chk2 ?> />
								<label for="radio_vn2" class="check_css">横浜店</label>
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