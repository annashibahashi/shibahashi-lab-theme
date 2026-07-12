<?php get_header(); ?>

<article class="area-page area-page--ui-collection">
	<div class="section-inner">
		<nav class="breadcrumb" aria-label="パンくずリスト">
			<ol class="breadcrumb__list"><li><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li><li aria-current="page">UI COLLECTION</li></ol>
		</nav>

		<header class="area-page__header">
			<p class="section-label">UI COLLECTION</p>
			<h1 class="section-title">情報を使いやすくする基本UI</h1>
			<p>情報を整理し、迷わず操作してもらうための<br>基本的なUIを体験できるエリアです。</p>
		</header>

		<nav class="ui-demo-index" aria-label="UIデモのページ内目次">
			<h2 class="ui-demo-index__title">5種類のUIデモ</h2>
			<ol class="ui-demo-index__list">
				<li><a href="#card-layout">カードレイアウト</a></li>
				<li><a href="#flip-card">フリップカード</a></li>
				<li><a href="#tabs">タブ</a></li>
				<li><a href="#accordion">アコーディオン</a></li>
				<li><a href="#modal">モーダル</a></li>
			</ol>
		</nav>

		<section id="card-layout" class="ui-demo" aria-labelledby="card-layout-title">
			<header class="ui-demo__header">
				<p class="section-label">CARD LAYOUT</p>
				<h2 id="card-layout-title">パークアトラクション一覧</h2>
				<p>情報を同じ形式に整理し、内容を比較しやすくするカードレイアウトです。</p>
			</header>
			<div class="attraction-grid">
				<article class="attraction-card">
					<div class="attraction-card__visual attraction-card__visual--light" role="img" aria-label="LIGHT ARROW RIDEの仮画像">IMAGE PLACEHOLDER</div>
					<div class="attraction-card__body">
						<h3>LIGHT ARROW RIDE</h3>
						<p>光る矢印を追いながら進むライド。</p>
						<dl class="attraction-card__meta"><div><dt>エリア</dt><dd>UI COLLECTION</dd></div><div><dt>所要時間</dt><dd>約3分</dd></div></dl>
						<button class="button-link" type="button" data-modal-open="light-arrow-dialog">詳細を見る</button>
					</div>
				</article>
				<article class="attraction-card">
					<div class="attraction-card__visual attraction-card__visual--word" role="img" aria-label="WORD FORESTの仮画像">IMAGE PLACEHOLDER</div>
					<div class="attraction-card__body">
						<h3>WORD FOREST</h3>
						<p>言葉が枝分かれしながら広がる、不思議な森。</p>
						<dl class="attraction-card__meta"><div><dt>エリア</dt><dd>VISUAL PLAYGROUND</dd></div><div><dt>所要時間</dt><dd>約5分</dd></div></dl>
						<p class="attraction-card__status">詳細は準備中です</p>
					</div>
				</article>
				<article class="attraction-card">
					<div class="attraction-card__visual attraction-card__visual--motion" role="img" aria-label="MOTION METERの仮画像">IMAGE PLACEHOLDER</div>
					<div class="attraction-card__body">
						<h3>MOTION METER</h3>
						<p>みんなのアクションでゲージがたまる研究施設。</p>
						<dl class="attraction-card__meta"><div><dt>エリア</dt><dd>DATA MOTION</dd></div><div><dt>所要時間</dt><dd>約3分</dd></div></dl>
						<p class="attraction-card__status">詳細は準備中です</p>
					</div>
				</article>
			</div>
		</section>

		<section id="flip-card" class="ui-demo" aria-labelledby="flip-card-title">
			<header class="ui-demo__header">
				<p class="section-label">FLIP CARD</p>
				<h2 id="flip-card-title">パークキャラクター図鑑</h2>
				<p>ボタンを押すと表裏が切り替わり、キャラクターの情報を発見できます。</p>
			</header>
			<div class="character-grid">
				<article class="flip-card" data-flip-card>
					<div class="flip-card__inner">
						<div class="flip-card__face flip-card__front" aria-hidden="false">
							<div class="character-placeholder" role="img" aria-label="CHARACTER 01の仮ビジュアル">CHARACTER IMAGE</div>
							<h3>CHARACTER 01</h3><p>担当：UI COLLECTION</p>
							<button class="button-link flip-card__toggle" type="button" aria-expanded="false" aria-controls="character-01-back" data-flip-open>カードをめくる</button>
						</div>
						<div id="character-01-back" class="flip-card__face flip-card__back" aria-hidden="true">
							<h3>CHARACTER 01</h3><dl><dt>性格</dt><dd>新しい仕組みを試すことが好き</dd><dt>特技</dt><dd>情報を分かりやすく整理する</dd><dt>役割</dt><dd>来園者へUIの使い方を案内する</dd></dl>
							<button class="button-link flip-card__toggle" type="button" aria-controls="character-01-back" data-flip-close tabindex="-1">表に戻す</button>
						</div>
					</div>
				</article>
				<article class="flip-card" data-flip-card>
					<div class="flip-card__inner">
						<div class="flip-card__face flip-card__front" aria-hidden="false">
							<div class="character-placeholder" role="img" aria-label="CHARACTER 02の仮ビジュアル">CHARACTER IMAGE</div>
							<h3>CHARACTER 02</h3><p>担当：VISUAL PLAYGROUND</p>
							<button class="button-link flip-card__toggle" type="button" aria-expanded="false" aria-controls="character-02-back" data-flip-open>カードをめくる</button>
						</div>
						<div id="character-02-back" class="flip-card__face flip-card__back" aria-hidden="true">
							<h3>CHARACTER 02</h3><dl><dt>性格</dt><dd>好奇心旺盛でひらめきが得意</dd><dt>特技</dt><dd>言葉や形を楽しく変化させる</dd><dt>役割</dt><dd>情報を印象的に見せる方法を研究する</dd></dl>
							<button class="button-link flip-card__toggle" type="button" aria-controls="character-02-back" data-flip-close tabindex="-1">表に戻す</button>
						</div>
					</div>
				</article>
				<article class="flip-card" data-flip-card>
					<div class="flip-card__inner">
						<div class="flip-card__face flip-card__front" aria-hidden="false">
							<div class="character-placeholder" role="img" aria-label="CHARACTER 03の仮ビジュアル">CHARACTER IMAGE</div>
							<h3>CHARACTER 03</h3><p>担当：DATA MOTION</p>
							<button class="button-link flip-card__toggle" type="button" aria-expanded="false" aria-controls="character-03-back" data-flip-open>カードをめくる</button>
						</div>
						<div id="character-03-back" class="flip-card__face flip-card__back" aria-hidden="true">
							<h3>CHARACTER 03</h3><dl><dt>性格</dt><dd>小さな変化を見つけるのが得意</dd><dt>特技</dt><dd>数字の動きを可視化する</dd><dt>役割</dt><dd>パーク内の動きを記録する</dd></dl>
							<button class="button-link flip-card__toggle" type="button" aria-controls="character-03-back" data-flip-close tabindex="-1">表に戻す</button>
						</div>
					</div>
				</article>
			</div>
		</section>

		<section id="tabs" class="ui-demo" aria-labelledby="tabs-title" data-tabs>
			<header class="ui-demo__header"><p class="section-label">TABS</p><h2 id="tabs-title">園内施設ガイド</h2><p>目的に合わせて、園内施設の情報を切り替えられます。</p></header>
			<div class="tabs" role="tablist" aria-label="園内施設の種類">
				<button id="tab-play" class="tabs__tab" type="button" role="tab" aria-selected="true" aria-controls="panel-play" tabindex="0">あそぶ</button>
				<button id="tab-find" class="tabs__tab" type="button" role="tab" aria-selected="false" aria-controls="panel-find" tabindex="-1">みつける</button>
				<button id="tab-rest" class="tabs__tab" type="button" role="tab" aria-selected="false" aria-controls="panel-rest" tabindex="-1">ひとやすみ</button>
			</div>
			<div id="panel-play" class="tabs__panel" role="tabpanel" aria-labelledby="tab-play" tabindex="0"><h3>あそぶ</h3><p>実際にWeb表現を操作できる体験型アトラクションを集めたエリアです。</p></div>
			<div id="panel-find" class="tabs__panel" role="tabpanel" aria-labelledby="tab-find" tabindex="0" hidden><h3>みつける</h3><p>表現名、目的、用途から、次の企画に合う見せ方を探せるエリアです。</p></div>
			<div id="panel-rest" class="tabs__panel" role="tabpanel" aria-labelledby="tab-rest" tabindex="0" hidden><h3>ひとやすみ</h3><p>パークガイドや各エリアの紹介を読みながら、次に体験する場所を考えられる休憩エリアです。</p></div>
		</section>

		<section id="accordion" class="ui-demo" aria-labelledby="accordion-title">
			<header class="ui-demo__header"><p class="section-label">ACCORDION</p><h2 id="accordion-title">来園前のよくある質問</h2><p>質問を選ぶと、回答を開いて確認できます。</p></header>
			<div class="accordion" data-accordion>
				<section class="accordion__item"><h3><button class="accordion__button" type="button" aria-expanded="false" aria-controls="faq-fee">入園料はかかりますか？</button></h3><div id="faq-fee" class="accordion__panel" hidden><p>SINQ WEB PARKは無料で体験できます。</p></div></section>
				<section class="accordion__item"><h3><button class="accordion__button" type="button" aria-expanded="false" aria-controls="faq-mobile">スマートフォンでも楽しめますか？</button></h3><div id="faq-mobile" class="accordion__panel" hidden><p>PCとスマートフォンのどちらからでも楽しめます。<br>一部の表現は、端末に合わせて操作方法が変わります。</p></div></section>
				<section class="accordion__item"><h3><button class="accordion__button" type="button" aria-expanded="false" aria-controls="faq-direct">気になる表現へ直接移動できますか？</button></h3><div id="faq-direct" class="accordion__panel" hidden><p>園内マップやPARK INDEXから、<br>見たい表現へ移動できます。</p></div></section>
				<section class="accordion__item"><h3><button class="accordion__button" type="button" aria-expanded="false" aria-controls="faq-contact">紹介されている表現について相談できますか？</button></h3><div id="faq-contact" class="accordion__panel" hidden><p>パークガイドの柴橋へご相談いただけます。<br>相談窓口は現在準備中です。</p></div></section>
			</div>
		</section>

		<section id="modal" class="ui-demo" aria-labelledby="modal-demo-title">
			<header class="ui-demo__header"><p class="section-label">MODAL</p><h2 id="modal-demo-title">アトラクション詳細モーダル</h2><p>カード一覧の「詳細を見る」から、ページを移動せずに追加情報を確認できます。</p></header>
			<p class="notice">LIGHT ARROW RIDEのカードから体験してください。</p>
		</section>

		<a class="text-link area-page__map-link" href="<?php echo esc_url(home_url('/#park-map')); ?>">TOPページの園内マップへ戻る</a>
		<?php get_template_part('template-parts/area-navigation'); ?>
	</div>
</article>

<dialog id="light-arrow-dialog" class="attraction-dialog" aria-labelledby="light-arrow-dialog-title">
	<div class="attraction-dialog__content">
		<button class="attraction-dialog__close" type="button" data-modal-close autofocus><span aria-hidden="true">×</span><span class="screen-reader-text">閉じる</span></button>
		<p class="section-label">ATTRACTION DETAIL</p>
		<h2 id="light-arrow-dialog-title">LIGHT ARROW RIDE</h2>
		<p>光る矢印や小さな動きを追いながら、マイクロインタラクションによる視線誘導を体験するアトラクションです。</p>
		<h3>体験できる表現</h3>
		<ul><li>キラッと光る矢印</li><li>ホバー／タップ時の反応</li><li>次の行動へ導く視線誘導</li></ul>
		<h3>所要時間</h3><p>約3分</p>
		<h3>おすすめの楽しみ方</h3><p>矢印の動きが、次に押せる場所をどのように伝えているか注目してください。</p>
	</div>
</dialog>

<?php get_footer(); ?>
