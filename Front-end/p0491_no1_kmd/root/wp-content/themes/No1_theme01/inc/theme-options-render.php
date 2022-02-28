<div class="wrap" id="no1_theme1_options">
	<h1><?php printf( __( '%s Theme Options', '' ), wp_get_theme() ); ?></h1>
	<?php settings_errors(); ?>

	<form method="post" action="options.php" novalidate="novalidate">
		<?php
		settings_fields( 'no1_theme1' );
		$options         = no1_theme1_get_options();
		$default_options = no1_theme1_get_default_options();
		?>
		<div class="section first">
			<h3>各設定方法</h3>
			<table class="form-table" role="presentation">
				<tr>
					<th>パーマリンク設定</th>
					<td>
						設定 → <a href="<?php echo site_url( '/wp-admin/options-permalink.php' ); ?>" target="_blank">パーマリンク設定</a>をカスタム構造にしてください。<br>
						値は　<strong>/%category%/%post_id%/</strong>　にしてください。
					</td>
				</tr>
				<tr>
					<th>トップページの設定</th>
					<td>
						固定ページ → 新規追加 → タイトル：トップページ　 作成<br>
						テンプレート：トップページ 　選択　　▲保存<br>※コーディングは、toppage.phpに書いていく
					</td>
				</tr>
				<tr>
					<th>お知らせの設定</th>
					<td>
						投稿 → カテゴリー → 「未分類」を「お知らせ」に変更　<br>スラッグ名　例) info news　など<br>※ 他にもカテゴリーがある時は、カテゴリーを追加する
					</td>
				</tr>
				<tr>
					<th>固定ページ内のリンクの設定</th>
					<td>
						固定ページのリンクは、ショートコードを使用してください。<br>例）<br>
						&emsp;ページ内リンクの場合：a href="[url]/company/"<br>
						&emsp;画像のリンクの場合：img src="[template_url]/img/○○○/○○○.png"
					</td>
				</tr>
			</table>
		</div>

		<div class="section">
			<h3>プラグイン</h3>
			<table class="form-table" role="presentation">
				<tr>
					<th>必須</th>
					<td>
						Contact Form 7<br>Advanced Custom Fields<br>WP-PageNavi<br>&emsp;&emsp;● WP-PageNaviを入れたら・・・<br>&emsp;&emsp;&emsp;設定
						→ 表示設定 →　1ページに表示する最大投稿数：1件　に変更<br>&emsp;&emsp;&emsp;※ 一覧の表示件数は、「archive.php」の中で設定します。
					</td>
				</tr>
				<tr>
					<th>必要に応じて</th>
					<td>
						Contact Form 7 add confirm：お問い合わせに確認ボタンをつける<br>
						Breadcrumb NavXT：パンくずリストを入れる<br>
						Easy FancyBox：画像にライトボックスをつける<br>
						など・・・
					</td>
				</tr>
			</table>
		</div>

		<div class="section">
			<h3>SEOタグ</h3>
			<table class="form-table" role="presentation">
				<tr>
					<th>SEOタグについて</th>
					<td>
						keyword・description・title・h1 は「functions.php」の中に書く<br>※ テーマのfunctions.phpに記入場所が準備してあります。<br>※
						各ページごとに、テキストの内容が変更できます。<br>※ 出力口は、テーマのheader.phpに、記載があります。<br>※ デザインでh1タグがないときは、「txt-indent　-999px」で消す
					</td>
				</tr>
			</table>
		</div>

		<div class="section">
			<h3>お問い合わせの設定</h3>
			<table class="form-table" role="presentation">
				<tr>
					<th>メールの設定①</th>
					<td>
						クライアント様宛にメールを送る<br>
						&emsp;送信先：クライアント様のメールアドレス<br>
						&emsp;送信元：[your-name] ＜[your-email]＞<br>
						&emsp;題名：「ホームページからお問い合わせがありました。」
					</td>
				</tr>
				<tr>
					<th>メールの設定①<br>メーッセージ本文（例）</th>
					<td>
						ホームページから下記のお問い合わせがありました。<br>
						---------------------------------------------------------------------------<br>
						&emsp;<br>
						お名前：[your-name]<br>
						メールアドレス：[your-email]<br>
						ご住所：[your-address]<br>
						電話番号：[your-tel]<br>
						お問い合わせ内容：[your-message]<br>
						など、必要に応じて入力をお願いします。<br>
						&emsp;<br>
						---------------------------------------------------------------------------<br>
						このメールは 「会社名」（サイトURL） のお問い合わせフォームから送信されました
					</td>
				</tr>
				<tr>
					<th>メールの設定②</th>
					<td>
						お問い合わせをしたお客様に返信する<br>
						&emsp;送信先：[your-email]<br>
						&emsp;送信元：クライアント様会社名 ＜ メールアドレス ＞
						&emsp;題名：「お問い合わせありがとうございます」
					</td>
				</tr>
				<tr>
					<th>メールの設定②<br>メーッセージ本文（例）</th>
					<td>
						【お客様名】様<br>&emsp;<br>

						この度は、弊社サイトにお問い合わせをいただき、<br>
						誠にありがとうございます。<br>&emsp;<br>

						お問合せいただい内容は次の通りです。<br>
						３営業日中に担当者よりご連絡させていただきますので、<br>
						しばらくお待ちください。<br>&emsp;<br>

						===【お問い合わせ内容】====================<br>

						&emsp;<br>
						お名前：[your-name]<br>
						メールアドレス：[your-email]<br>
						ご住所：[your-address]<br>
						電話番号：[your-tel]<br>
						お問い合わせ内容：[your-message]<br>
						など、メールの設定①と同じ項目を入れてください<br>
						&emsp;<br>

						===========================================<br>

						以上、何卒よろしくお願い申し上げます。<br>

						━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━<br>
						■ クライアント様会社名<br>
						■ URL：＜ サイトURL  ＞<br>
						■ 住所：<br>
						■ 電話番号：<br>
						━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
					</td>
				</tr>
			</table>
		</div>

		<div class="section">
			<h3>その他</h3>
			<p>詳しくは、コーディングマニュアルをご覧いただくか、株式会社No.1のコーディング課まで、お問い合わせください。</p>
		</div>
	</form>
</div>
