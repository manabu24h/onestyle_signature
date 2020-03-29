<?php // 共通ヘッダー
	
$Path = $_SERVER['DOCUMENT_ROOT'];
include( $Path . 'header.php');

?>

<div id="container" class="">
	<div id="breadcrumb">
		<ul>
			<li><h1><a href="<?php echo $home; ?>">ONESTYLE撮影お申込みのご案内</a><span class="arrow">＞</span></h1></li>
			<li><a href="">新型コロナウイルスに関する特則</a></li>
		</ul>
	</div>
	<!-- // #breadcrumb END -->

	<div id="contents">

		<?php $id = $_GET['id']; if($id): ?>
			<section class="success">
				<h2>「非常時の特則」同意メールの送信が完了いたしました。</h2>
				<p class="note">この度は、弊社の「非常時の特則」にご同意を賜り、誠にありがとうございました。</p>
			</section>
		<?php endif; ?>
		
		<section id="mail-form" name="mail-form" class="emergency ">
			<h2>非常時の特則</h2>
			<p class="b-txt">
				謹啓　時下ますますご清祥のこととお慶び申し上げます。この度は撮影のご依頼をいただき誠にありがとうございます。<br />さて、新型コロナウィルスの感染拡大を受けて、当社では今後万が一「新型インフルエンザ等対策特別措置法」に基づく緊急事態宣言が出され、知事より同法に基づく外出自粛要請が出された場合の特則を定めましたので、本書をもってお知らせいたします。<br />スタッフ一同このような事態に陥らないことを祈るばかりでありますが、<span class="u-line">本特則は法令遵守ならびにお客様及び当社スタッフの生命及び身体の安全確保を目的に設定されたもの</span>ですので、何卒ご理解とご協力をお願い申し上げます。
			</p>
			
			<div class="consent">
				<section class="handling">
					<p class="note">「新型インフルエンザ等対策特別措置法」に基づく内閣総理大臣の『緊急事態宣言』に伴い、都道府県知事より外出自粛要請が出され、お客様の撮影予定日がこの要請の期間内に含まれる場合には、自動的に以下の取り扱いとさせていただきます。</p>
						<ol>
							<li>お客様は緊急事態宣言発令後に外出自粛要請が出された日から撮影予定日の前々日までの間に、新たな日程の希望日をお知らせください。なお、本号の条件を全て満たして日程変更がなされた場合には、<span class="u-line">お客様に日程変更料や実費分等のご負担は一切生じません。</span></li>
							<li>撮影日程のご変更をされたうえで、撮影プランやお衣装などお申込み頂いている内容と変更が発生した場合、当初予定しておりました内容のお見積り金額からの減額の対応は致しかねます。プランやサービスの追加が発生した場合には、相当額の追加料金が発生致します。撮影プランやお衣装の変更などには臨機応変に対応させて頂きます。
</li>
							<li>万が一、お客様が前号の期限までに新たな変更日を指定せず、または（新たな変更日を指定した後も含め）撮影自体を中止される場合には、当社とお客様との間の契約は終了し、お客様には「撮影申込書」のキャンセル規定により算出されるキャンセル料から半額相当分を減額した金額をご負担いただきます。</li>
						</ol>
				</section>
				<!-- //.handling -->
				<section class="cons-sec cons-01">
					<section class="item">
						<p>なお、上記緊急事態宣言や知事による要請を受けていなくても、当社が必要性を認めた場合には、事前にお客様に通知した上で、以下の各事項その他の必要な対応を実施することができるものとします。</p>
						<ol>
							<li>当社スタッフによるサービス提供時のマスク着用</li>
							<li>お客様及び参列者に対しての手洗い、うがい及び消毒の推奨</li>
							<li>来店者への検温の実施、発熱者の入店の拒否または退去の依頼</li>
							<li>その他衛生環境維持に必要な措置</li>
						</ol>
						<p>当社としてはお客様に撮影サービスを無事に提供できるよう引き続き全力を尽くしてまいる所存ですが、現下の状況を鑑み、万が一の場合であってもお客様のご負担を最小限にした上で撮影を実施できるよう、本書の通り特則をご用意し、ご提示申し上げるものです。</p>
						<p>内容をよくご確認いただき、なにとぞご理解とご協力を賜りたくお願い申し上げます。</p>
					</section>
					<section class="generosity">
						謹白<br />
						株式会社ONESTYLE
					</section>
				</section><!-- // cons-01 END -->
			</div><!-- // consent END -->
			
			<div class="form-apply">
				
				<?php
					//確認ページで「戻る」を押した時に、入力した内容をそのまま表示させる記述です。	
					session_start();
						date_default_timezone_set('Asia/Tokyo');
						$g_name='';
						$b_name='';
						$s_date='';
						$email ='';
						$week = array( "日", "月", "火", "水", "木", "金", "土" );
						$date = date("Y年n月j日");
						// if( isset($_SESSION["data"]['date'])){ $date = $_SESSION["data"]['date']; }
						if( isset($_SESSION["data"]['groom_name'])){ $g_name= $_SESSION["data"]['groom_name']; }
						if( isset($_SESSION["data"]['bride_name'])){ $b_name = $_SESSION["data"]['bride_name']; }
						if( isset($_SESSION["data"]['date'])){ $s_date = $_SESSION["data"]['date']; }
						if( isset($_SESSION["data"]['email'])){ $email = $_SESSION["data"]['email']; }
				?>
				
				<script>
					$(function() {
						jQuery("#apply").validationEngine();
						
						$('#submit').prop('disabled', true);
						
						$('#check').on('click', function() {
							if ($(this).prop('checked') == false) {
								$('#submit').prop('disabled', true);
								$('#submit').attr({"value":"同意にチェックする"});
							} else {
								$('#submit').prop('disabled', false);
								$('#submit').attr({"value":"確認画面へ進む"});
							}
						});
					});
				</script>

				
				<form id="apply" name="apply" action="check.php" method="POST" >
					<div class="unit">
						<input type="checkbox" id="check" />
						<label for="check" class="check_css">私たちは、上記「非常時の特則」の内容を確認し、同意いたします。</label>
					</div>
					
					<div class="unit" style="display:none;">
						<p class="label">《署名日》</p>
						<dl>
							<dd><input type="text" name="date" value="<?php echo $date; echo $week[date("（w）")] ?>" size="40" aria-required="true" aria-invalid="false" readonly /></dd>
						</dl>			
					</div>
					
					<div class="unit">
						<p class="label">《おふたりの氏名》</p>
						<dl>
<!-- 							<dt><span class="item">ご署名</span></dt> -->
							<dd><input type="text" name="groom_name" value="<?php echo $g_name; ?>" size="40" class="validate[required]" id="groom-name" aria-required="true" aria-invalid="false" /></dd>
						</dl>
						<dl>
<!-- 							<dt><span class="item">ご署名</span></dt> -->
							<dd><input type="text" name="bride_name" value="<?php echo $b_name; ?>" size="40" id="bride-name" aria-required="true" aria-invalid="false" /></dd>
						</dl>
					</div>
					
					<div class="unit">
						<p class="label">《メールアドレス》</p>
						<dl>
<!-- 							<dt><span class="item"></span></dt> -->
							<dd><input type="text" name="email" value="<?php echo $email; ?>" size="40" class="validate[required,custom[email]]" id="email" aria-required="true" aria-invalid="false" placeholder="半角で入力してください" /></dd>
						</dl>		
					</div>
					
					<div class="submit-area clearfix">
						<p class="att">
							・個人情報は弊社の<a href="https://weddingphoto.onestyle.co.jp/privacy" target="_blank">プライバシーポリシー</a>に則り管理いたします。<br />
							・迷惑メール防止の設定をされている場合は、「@onestyle.co.jp」をドメイン指定解除してください。
						</p>
						<div class="submit">
							<input id="submit" type="submit" value="同意にチェックする" class="bt-submit" />
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