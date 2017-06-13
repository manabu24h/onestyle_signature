<?php // 和装の見学予約フォーム
	// 共通ヘッダー
	$Path = $_SERVER['DOCUMENT_ROOT'] . '/onestyle/signature/';
	include( $Path . 'header.php');

	//$_POST['name'] →$nameへ、$name= 値 といった具合で挿入されます
	foreach($_POST as $k=>$v){
	  $$k=$v;
	}
	//値をセッションに入れる
	session_start();
	// $_SESSION['email']=$email;
	$_SESSION['g_name']=$g_name;
	$_SESSION['b_name']=$b_name;
	$_SESSION['radio_venue']=$radio_venue;
	$_SESSION['slc_date1']=$slc_date1;
	$_SESSION['slc_date2']=$slc_date2;
	$_SESSION['slc_time1']=$slc_time1;
	$_SESSION['slc_time2']=$slc_time2;
	// $_SESSION['message']=$message;
	
	//$chk_returnを、$_SESSION['chk_return']に保存。
	$_SESSION['radio_v_return'] = $radio_venue;
	$_SESSION['date1_return'] = $slc_date1;
	$_SESSION['date2_return'] = $slc_date2;
	$_SESSION['time1_return'] = $slc_time1;
	$_SESSION['time2_return'] = $slc_time2;
	
?>

<div id="container" class="page_check">
	<div id="breadcrumb">
		<ul>
			<li><h1><a href="<?php echo $home; ?>">ONESTYLE撮影お申込みのご案内</a><span class="arrow">＞</span></h1></li>
			<li><a href="<?php echo $home; ?>rsrv">お衣装のご予約</a><span class="arrow">＞</span></li>
			<li><a href="">和装の見学予約</a></li>
		</ul>
	</div>
	<!-- // #breadcrumb END -->
	
	<div id="contents">
		
		<section id="mail-form" name="mail-form">
			<h2>和装の見学予約</h2>
			<div class="form-apply">
				
				<div class="check-form">
					<div class="unit">
						<p class="label must">《おふたりの氏名》</p>
						<dl>
							<dt><span class="item">新郎様</span></dt>
							<dd><p class="value"><?php echo $g_name; ?></p></dd>
						</dl>
						<dl>
							<dt><span class="item">新婦様</span></dt>
							<dd><p class="value"><?php echo $b_name; ?></p></dd>
						</dl>
					</div>
					
					<div class="unit">
						<p class="label must">《ご来店希望店舗》</p>
						<p class="value"><?php echo $radio_venue; ?></p>
					</div>
					
					<div class="unit">
						<p class="label">《撮影希望日時》</p>
						<p class="value">第一希望：<?php echo $slc_date1; ?>｜<?php echo $slc_time1; ?></p>
						<p class="value">第二希望：<?php echo $slc_date2; ?>｜<?php echo $slc_time2; ?></p>
					</div>

					<div class="submit-area clearfix">
						<p class="att">
							・迷惑メール防止の設定をされている場合は、「@onestyle.co.jp」をドメイン指定解除してください。
						</p>
						<div class="submit">
							<a class="bt-submit" href="./index.php#mail-form">編集へ戻る</a>
							<a class="bt-submit" href="./send.php">この内容で送信</a>
						</div>
					</div>
				</div><!-- //.check-form END -->
			</div><!-- //.form-apply END -->
		</section>
		<!-- // #email-form END -->

	</div>
	<!-- // #contents END -->

</div>
<!-- // #container END -->

<?php include( $Path . 'footer.php'); // 共通フッター ?>