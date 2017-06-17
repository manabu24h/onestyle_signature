<?php // 共通ヘッダー
	$Path = $_SERVER['DOCUMENT_ROOT'] . '/onestyle/signature/';
	include( $Path . 'header.php');
?>

<div id="container" class="">
	<div id="breadcrumb">
		<ul>
			<li><h1><a href="<?php echo $home; ?>">ONESTYLE撮影お申込みのご案内</a></h1></li>
		</ul>
	</div>
	<!-- // #breadcrumb END -->

	<div id="contents">
		<section class="intro">
			<h2>ONESTYLE撮影お申込みのご案内</h2>
			<p class="b-txt">このたびはONESTYLEのフォトウェディングにお申込み頂きありがとうございます！<br class="sp-non" />今後の流れやお申込みの手続きについて、ご確認頂きますようお願い申し上げます。</p>
			<div class="step-nav">
				<span class="flow-current">① 撮影申込書のご提出</span>
				<a href="<?php echo $home; ?>rsrv/">② お衣装のご予約</a>
				<a class="flow-last" href="<?php echo $home; ?>payment">③ お支払いについて</a>
			</div>
		</section>
		<!-- // .intro END -->
		
		<section class="guide">
			<h2>① 撮影申込書のご提出</h2>
			<p class="b-txt">撮影のお申込みにあたり、以下の申込書に署名・捺印を頂いて、5日以内にご提出ください。<br class="sp-non" />ご提出方法は以下の通りです。</p>
			
			<div class="g-pt">
				<div class="label">ご来店もしくは郵送でのご提出</div>
				<p>
					郵送先<br />
					<span class="addr">〒150-0001 渋谷区神宮前3-38-1 JP-4ビル1階<br />株式会社ONESTYLE　撮影予約係　行</span><br />
					ご持参頂ける方は、ONESTYLE表参道店もしくは、横浜店のスタッフにお渡しください。
				</p>
				<a href="" class="bt-type1">撮影申込書をダウンロード<br /><span class="mini">PDF （ ○○○ kb）</span></a>
			</div>
			<!-- // ご来店もしくは郵送 END -->
			
			<div class="g-pt">
				<div class="label">FAXでの送信</div>
				<p>
					FAX番号　<span class="tel">03-6721-0594</span><br />
					大変お手数ですが、FAX送信後<br />
					お電話にてご連絡をお願い致します。<br />
					TEL番号 <span class="tel">03-6721-0592</span>&nbsp;&nbsp;ONESTYLE表参道店宛て				</p>
				<a href="" class="bt-type1">撮影申込書をダウンロード<br /><span class="mini">PDF （ ○○○ kb）</span></a>
			</div>
			<!-- // FAXでの送信 END -->
			
			<div class="g-pt">
				<div class="label">フォームで送信</div>
				<p>下記の撮影お申込みフォームで、お客様情報を入力して頂き、撮影のお申込みにあたる同意欄にチェックして送信してください。</p>
				<a href="#mail-form" class="bt-type1 bt-mform">撮影お申込みフォーム</a>
			</div>
			<!-- // フォームで送信 END -->
		</section>
		<!-- // .guide END -->
		
		<section id="mail-form" name="mail-form">
			<h2>撮影お申込みフォーム</h2>
			<p class="b-txt">下記の撮影のお申込みに関する内容をご確認いただき、お客様情報を入力して頂き、<br class="sp-non" />撮影のお申込みにあたる同意欄にチェックして送信してください。</p>
			
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
					<h3>【メイク・お衣装について】</h3>
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
						<h4>お衣装</h4>
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
			
			<div class="form-apply">
				
				<?php
					//確認ページで「戻る」を押した時に、入力した内容をそのまま表示させる記述です。	
					session_start();
						$g_name='';
						$b_name='';
						$date='';
						$tel ='';
						$email ='';
						$zip1 ='';
						$zip2 ='';
						$pref ='';
						$addr ='';
						if( isset($_SESSION['g_name'])){ $g_name= $_SESSION['g_name']; }
						if( isset($_SESSION['b_name'])){ $b_name = $_SESSION['b_name']; }
						if( isset($_SESSION['date'])){ $date = $_SESSION['date']; }
						if( isset($_SESSION['tel'])){ $tel = $_SESSION['tel']; }
						if( isset($_SESSION['email'])){ $email = $_SESSION['email']; }
						if( isset($_SESSION['zip1'])){ $zip1 = $_SESSION['zip1']; }
						if( isset($_SESSION['zip2'])){ $zip2 = $_SESSION['zip2']; }
						if( isset($_SESSION['pref'])){ $pref = $_SESSION['pref']; }
						if( isset($_SESSION['addr'])){ $addr = $_SESSION['addr']; }
				?>
				
				<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
				
				<script>
					$(function() {
						jQuery("#apply").validationEngine();
						
						$("#datepicker").datepicker({
							 minDate: '0y', //今日から
							 maxDate: '+2y', //5年後までが選択可能範囲
						});

					    $("#zip").attr('onKeyUp', 'AjaxZip3.zip2addr(this,\'\',\'address\',\'address\');');
					    $("#zip2").attr('onKeyUp', 'AjaxZip3.zip2addr(\'zip1\',\'zip2\',\'prefecture\',\'address\');');
						
						$('#submit').prop('disabled', true);
						
						$('#check').on('click', function() {
							if ($(this).prop('checked') == false) {
								$('#submit').prop('disabled', true);
							} else {
								$('#submit').prop('disabled', false);
							}
						});
					});
				</script>

				
				<form id="apply" action="check.php" method="POST" >
					<div class="unit">
						<input type="checkbox" id="check" />
						<label for="check" class="check_css">上記の内容に同意のうえ、撮影の申込みを致します。</label>
					</div>
					
<!--
					<div class="unit">
						<p class="label">《お申込み日》</p>
						<dl>
							<dd><input id="datepicker" type="text" name="date" value="<?php echo $date; ?>" size="40" class="validate[required]" aria-required="true" aria-invalid="false" placeholder="YYYY/MM/DD" /></dd>
						</dl>			
					</div>
-->
					
					<div class="unit">
						<p class="label">《おふたりの氏名》</p>
						<dl>
							<dt><span class="item">新郎様</span></dt>
							<dd><input type="text" name="groom-name" value="<?php echo $g_name; ?>" size="40" class="validate[required]" id="groom-name" aria-required="true" aria-invalid="false" /></dd>
						</dl>
						<dl>
							<dt><span class="item">新婦様</span></dt>
							<dd><input type="text" name="bride-name" value="<?php echo $b_name; ?>" size="40" class="validate[required]" id="bride-name" aria-required="true" aria-invalid="false" /></dd>
						</dl>			
					</div>
					
					<div class="unit">
						<p class="label">《サンプル使用許諾》</p>
						<dl>
						<dl>
							<dd>
								<input type="radio" id="radio_sm1" name="radio_venue" value="可" />
								<label for="radio_sm1" class="check_css">可</label>
							</dd>
							<dd>
								<input type="radio" id="radio_sm2" name="radio_venue" value="不可" />
								<label for="radio_sm2" class="check_css">不可</label>
							</dd>
						</dl>	
						</dl>			
					</div>					
					
					<div class="unit">
						<p class="label">《代表の方のご連絡先》</p>
						<dl>
							<dt><span class="item">電話番号</span></dt>
							<dd><input type="text" name="tel-no" value="<?php echo $tel; ?>" size="40" class="validate[required,custom[phone]]" id="tel-no" aria-required="true" aria-invalid="false" placeholder="市外局番から入力（携帯電話可）" /></dd>
						</dl>
						<dl>
							<dt><span class="item">メールアドレス</span></dt>
							<dd><input type="text" name="email" value="<?php echo $email; ?>" size="40" class="validate[required,custom[email]]" id="email" aria-required="true" aria-invalid="false" placeholder="半角で入力してください" /></dd>
						</dl>
						<dl>
							<dt><span class="item">郵便番号</span></dt>
							<dd>〒 <input type="text" name="zip1" value="<?php echo $zip1; ?>" size="20" maxlength="3" id="zip1" aria-required="true" aria-invalid="false" /> ー <input type="text" name="zip2" value="<?php echo $zip2; ?>" size="20" maxlength="4" id="zip2" aria-required="true" aria-invalid="false" /></dd>
						</dl>
						<dl>
							<dt><span class="item">都道府県</span></dt>
							<dd><input type="text" name="prefecture" value="<?php echo $pref; ?>" size="30" id="prefecture" aria-required="true" aria-invalid="false" /></dd>
						</dl>
						<dl>
							<dt><span class="item">ご住所</span></dt>
							<dd><input type="text" name="address" value="<?php echo $addr; ?>" size="40" id="your-addr" aria-required="true" aria-invalid="false" placeholder="建物名・部屋番号まで入力" /></dd>
						</dl>
					</div>
					
					<div class="submit-area clearfix">
						<p class="att">
							・個人情報は弊社の<a href="http://onelife.jp/policy">プライバシーポリシー</a>に則り管理いたします。<br />
							・迷惑メール防止の設定をされている場合は、「@onestyle.co.jp」をドメイン指定解除してください。
						</p>
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