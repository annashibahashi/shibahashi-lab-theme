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
			<h2 class="ui-demo-index__title">11種類のUIデモ</h2>
			<ol class="ui-demo-index__list">
				<li><a href="#card-layout">カードレイアウト</a></li>
				<li><a href="#flip-card">フリップカード</a></li>
				<li><a href="#tabs">タブ</a></li>
				<li><a href="#accordion">アコーディオン</a></li>
				<li><a href="#modal">モーダル</a></li>
				<li><a href="#cta-microinteraction">CTAマイクロインタラクション</a></li>
				<li><a href="#custom-paw-cursor">肉球デザインカーソル</a></li>
				<li><a href="#carousel">スライダー／カルーセル</a></li>
				<li><a href="#attraction-filter">検索・フィルター</a></li>
				<li><a href="#before-after">ビフォー・アフター比較</a></li>
				<li><a href="#choice-diagnosis">選択式診断</a></li>
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
			<header class="ui-demo__header"><p class="section-label">MODAL</p><h2 id="modal-demo-title">アトラクション詳細モーダル</h2><p>ページを移動せず、その場で追加情報を確認できる見せ方です。<br>下のボタンから、LIGHT ARROW RIDEの詳細を開いてみてください。</p></header>
			<button class="button-link" type="button" data-modal-open="light-arrow-dialog">アトラクション詳細を見る</button>
		</section>

		<section id="cta-microinteraction" class="ui-demo" aria-labelledby="cta-microinteraction-title">
			<header class="ui-demo__header">
				<p class="section-label">CTA MICROINTERACTION</p>
				<h2 id="cta-microinteraction-title">CTAマイクロインタラクション</h2>
				<p>CTAの矢印に短い光の動きを加え、クリックできることや次のコンテンツへの導線を自然に伝えるマイクロインタラクションです。</p>
			</header>
			<div class="cta-microinteraction-demo">
				<div class="cta-microinteraction-demo__actions">
					<a class="button-link is-arrow-shine" href="#carousel">
						<span>次のコンテンツを見る</span>
						<span class="cta-arrow-shine__icon" aria-hidden="true">→</span>
					</a>
					<a class="text-button is-arrow-shine" href="#card-layout">
						<span>詳しく見る</span>
						<span class="cta-arrow-shine__icon" aria-hidden="true">→</span>
					</a>
					<a class="text-link is-arrow-shine" href="#cta-microinteraction-notes">
						<span>実装のポイントを見る</span>
						<span class="cta-arrow-shine__icon" aria-hidden="true">→</span>
					</a>
				</div>
				<p class="cta-microinteraction-demo__note">矢印部分に注目すると、一定間隔で短い光の動きを確認できます。マウスやキーボードでCTAを選択した際の変化も確認してください。</p>
			</div>
			<div class="ui-demo-notes">
				<section><h3>どんな見せ方？</h3><p>ボタンやテキストリンクの矢印に短い光の動きを加え、クリックできることや次へ進む方向を視覚的に伝える表現です。</p></section>
				<section><h3>向いている用途</h3><ul><li>次のセクションへの誘導</li><li>詳細ページへのリンク</li><li>応募フォームへの導線</li><li>商品やサービスの詳細CTA</li><li>キャンペーン参加ボタン</li><li>コンテンツを順番に見せるページ</li></ul></section>
				<section><h3>期待できること</h3><p>静止したCTAへ適度な変化を加えることで、ページ内の導線に気づいてもらいやすくなります。</p><p>矢印の方向と光の動きを組み合わせることで、「この先に情報がある」「次へ進める」という感覚を補助できます。</p></section>
				<section id="cta-microinteraction-notes"><h3>設計のポイント</h3><p>すべてのCTAを同じ強さで光らせると、ページ内の優先順位が分かりにくくなります。</p><p>重要なCTAや、ユーザーに気づいてほしい導線へ絞って使用することが重要です。</p><p>動きはCTAの発見を助ける範囲に留め、文章を読んでいる最中に注意を奪い続けない再生間隔にしてください。</p><p>hoverだけに依存するとタッチ端末では伝わらないため、自動再生と操作時の反応を組み合わせます。</p></section>
				<section><h3>関連する表現</h3><ul><li>CTAアニメーション</li><li>マイクロインタラクション</li><li>ホバーアニメーション</li><li>視線誘導</li><li>アフォーダンス</li><li>モーションデザイン</li></ul></section>
			</div>
		</section>

		<section id="custom-paw-cursor" class="ui-demo" aria-labelledby="custom-paw-cursor-title">
			<header class="ui-demo__header">
				<p class="section-label">PAW CURSOR</p>
				<h2 id="custom-paw-cursor-title">肉球デザインカーソル</h2>
				<p>動物の肉球をモチーフにしたカーソルと、移動に合わせて現れる小さな光によって、サイトを探索する楽しさと世界観を補強するマイクロインタラクションです。</p>
			</header>
			<div class="custom-paw-cursor-demo">
				<p class="custom-paw-cursor-demo__message">このエリア内でマウスを動かし、リンクやボタンに重ねたりクリックしたりして、肉球カーソルの変化を確認してみてください。</p>
				<div class="custom-paw-cursor-demo__actions">
					<a class="text-link" href="#cta-microinteraction">CTAデモを見る</a>
					<button class="button-link" type="button" data-modal-open="light-arrow-dialog">詳細モーダルを開く</button>
				</div>
				<p class="custom-paw-cursor-demo__note">この演出は、マウスなどの細かいポインター操作に対応した環境で確認できます。</p>
			</div>
			<div class="ui-demo-notes">
				<section><h3>どんな見せ方？</h3><p>通常の矢印カーソルを肉球モチーフのデザインへ置き換え、移動時には小さな光を短く残します。</p><p>リンクやボタンへ重ねたとき、クリックしたときにも肉球の見た目を変化させ、操作に対する反応を返します。</p></section>
				<section><h3>向いている用途</h3><ul><li>テーマパーク型サイト</li><li>エンターテインメントサイト</li><li>キャンペーンサイト</li><li>キャラクターや動物を扱うコンテンツ</li><li>ゲーム性や探索感のあるサイト</li><li>独自の世界観を体験させたいブランドサイト</li></ul></section>
				<section><h3>期待できること</h3><p>全ページを通して共通の案内役を持たせることで、サイトを移動する行為そのものを体験の一部にできます。</p><p>肉球と光の反応によって、ユーザーがサイトの世界へ参加している感覚や、触ってみたくなる気持ちを補助します。</p></section>
				<section><h3>設計のポイント</h3><p>独自カーソルは常に視界へ入るため、デザイン性だけでなく、クリック位置の分かりやすさが重要です。</p><p>入力、テキスト選択、ドラッグなどの操作では標準カーソルへ戻し、演出より操作性を優先します。</p><p>タッチ端末ではカーソルが存在しないため、画面幅ではなくポインターの種類によって有効化を判断します。</p></section>
				<section><h3>関連する表現</h3><ul><li>カスタムカーソル</li><li>カーソルエフェクト</li><li>マイクロインタラクション</li><li>操作フィードバック</li><li>モーションデザイン</li><li>世界観演出</li></ul></section>
			</div>
		</section>

		<section id="carousel" class="ui-demo" aria-labelledby="carousel-title">
			<header class="ui-demo__header"><p class="section-label">CAROUSEL</p><h2 id="carousel-title">スライダー／カルーセル</h2><p>複数の情報を横方向へ切り替えながら、限られた表示領域で順番に見せるUIです。</p><p class="carousel__instruction">前後ボタンやドットのほか、左右にスワイプまたはドラッグでも切り替えられます。</p></header>
			<div class="carousel" data-carousel role="region" aria-roledescription="カルーセル" aria-label="SINQ WEB PARKのおすすめスポット">
				<div class="carousel__viewport">
					<article class="carousel__slide is-active" data-carousel-slide aria-label="1枚目：LIGHT GATE"><div class="carousel__visual carousel__visual--gate" role="img" aria-label="LIGHT GATEの仮ビジュアル">SPOT IMAGE</div><div class="carousel__body"><p class="section-label">PARK ENTRANCE</p><h3>LIGHT GATE</h3><p>光に包まれながらパークへ入る、未来のエントランス。</p></div></article>
					<article class="carousel__slide" data-carousel-slide aria-label="2枚目：WORD FOREST"><div class="carousel__visual carousel__visual--forest" role="img" aria-label="WORD FORESTの仮ビジュアル">SPOT IMAGE</div><div class="carousel__body"><p class="section-label">VISUAL PLAYGROUND</p><h3>WORD FOREST</h3><p>言葉が枝分かれしながら育っていく、不思議な森。</p></div></article>
					<article class="carousel__slide" data-carousel-slide aria-label="3枚目：MOTION TOWER"><div class="carousel__visual carousel__visual--tower" role="img" aria-label="MOTION TOWERの仮ビジュアル">SPOT IMAGE</div><div class="carousel__body"><p class="section-label">DATA MOTION</p><h3>MOTION TOWER</h3><p>パーク内の数字や変化を観測するタワー。</p></div></article>
					<article class="carousel__slide" data-carousel-slide aria-label="4枚目：STORY TRAIN"><div class="carousel__visual carousel__visual--train" role="img" aria-label="STORY TRAINの仮ビジュアル">SPOT IMAGE</div><div class="carousel__body"><p class="section-label">STORY EXPERIENCE</p><h3>STORY TRAIN</h3><p>物語の進行に合わせて、車窓の景色が変化する列車。</p></div></article>
				</div>
				<div class="carousel__controls" data-carousel-controls hidden><button class="carousel__arrow" type="button" data-carousel-prev>前へ</button><p class="carousel__position" aria-label="現在のスライド"><span data-carousel-current>1</span> / 4</p><button class="carousel__arrow" type="button" data-carousel-next>次へ</button></div>
				<div class="carousel__dots" data-carousel-dots hidden role="group" aria-label="表示するスポットを選ぶ"><button type="button" aria-label="1枚目を表示" aria-current="true"></button><button type="button" aria-label="2枚目を表示"></button><button type="button" aria-label="3枚目を表示"></button><button type="button" aria-label="4枚目を表示"></button></div>
			</div>
			<div class="ui-demo-notes"><section><h3>どんな見せ方？</h3><p>複数の画像や情報を、同じ領域内で順番に切り替えて表示します。</p></section><section><h3>向いている用途</h3><ul><li>キービジュアル</li><li>商品の特徴</li><li>実績紹介</li><li>施設紹介</li><li>写真ギャラリー</li><li>おすすめコンテンツ</li></ul></section><section><h3>期待できること</h3><p>限られた場所で複数の情報を見せながら、前後の内容へ興味を広げられます。</p></section><section><h3>設計のポイント</h3><p>重要な情報を自動再生だけに頼らず、現在位置と操作方法を明確にすることが重要です。すべての情報を確実に読ませたい場合は、カード一覧など別の見せ方も検討してください。</p></section><section><h3>関連する表現</h3><ul><li>カードレイアウト</li><li>ライトボックス</li><li>横スクロール</li></ul></section></div>
		</section>

		<section id="attraction-filter" class="ui-demo" aria-labelledby="attraction-filter-title">
			<header class="ui-demo__header"><p class="section-label">SEARCH &amp; FILTER</p><h2 id="attraction-filter-title">検索・フィルター</h2><p>興味のあるタグを複数選び、目的に合う情報を絞り込むUIです。</p></header>
			<form class="multi-tag-filter" data-multi-tag-filter>
				<div class="multi-tag-filter__controls">
					<fieldset class="multi-tag-filter__group" data-filter-group>
						<legend>興味のあるタグを選ぶ</legend>
						<div class="multi-tag-filter__tags">
							<label><input type="checkbox" value="ui" data-filter-tag>UI</label>
							<label><input type="checkbox" value="visual" data-filter-tag>ビジュアル</label>
							<label><input type="checkbox" value="animation" data-filter-tag>アニメーション</label>
							<label><input type="checkbox" value="interaction" data-filter-tag>インタラクション</label>
							<label><input type="checkbox" value="data" data-filter-tag>データ</label>
							<label><input type="checkbox" value="story" data-filter-tag>ストーリー</label>
							<label><input type="checkbox" value="sound" data-filter-tag>サウンド</label>
						</div>
					</fieldset>
					<div class="multi-tag-filter__summary">
						<p data-filter-selection>選択中：すべて</p>
						<button class="multi-tag-filter__reset" type="reset">すべて解除</button>
					</div>
					<div class="multi-tag-filter__status" aria-live="polite" aria-atomic="true">
						<p data-filter-count>8件のコンテンツを表示しています</p>
						<p data-filter-empty hidden>条件に合うコンテンツが見つかりませんでした。選択するタグを減らして、もう一度お試しください。</p>
					</div>
				</div>
				<div class="filter-results" data-filter-results>
					<article class="filter-result" data-filter-item data-filter-tags="ui animation"><h3>LIGHT ARROW RIDE</h3><p class="filter-result__meta">UI・アニメーション ／ UI COLLECTION</p><p>光る矢印と小さな反応で、視線誘導を体験するライド。</p></article>
					<article class="filter-result" data-filter-item data-filter-tags="ui interaction"><h3>FLIP CHARACTER LAB</h3><p class="filter-result__meta">UI・インタラクション ／ UI COLLECTION</p><p>カードの表裏を切り替えて、キャラクターを知る研究室。</p></article>
					<article class="filter-result" data-filter-item data-filter-tags="visual animation"><h3>WORD FOREST</h3><p class="filter-result__meta">ビジュアル・アニメーション ／ VISUAL PLAYGROUND</p><p>言葉が枝分かれしながら広がる、不思議な森。</p></article>
					<article class="filter-result" data-filter-item data-filter-tags="visual animation"><h3>TYPOGRAPHY PARADE</h3><p class="filter-result__meta">ビジュアル・アニメーション ／ VISUAL PLAYGROUND</p><p>文字の大きさや動きが次々と変化するパレード。</p></article>
					<article class="filter-result" data-filter-item data-filter-tags="data interaction"><h3>MOTION METER</h3><p class="filter-result__meta">データ・インタラクション ／ DATA MOTION</p><p>みんなのアクションで達成ゲージがたまる研究施設。</p></article>
					<article class="filter-result" data-filter-item data-filter-tags="data animation"><h3>NUMBER TOWER</h3><p class="filter-result__meta">データ・アニメーション ／ DATA MOTION</p><p>数字の変化をカウントアップで観測するタワー。</p></article>
					<article class="filter-result" data-filter-item data-filter-tags="story animation"><h3>STORY TRAIN</h3><p class="filter-result__meta">ストーリー・アニメーション ／ STORY EXPERIENCE</p><p>物語に沿って車窓の景色が変化する列車。</p></article>
					<article class="filter-result" data-filter-item data-filter-tags="story interaction"><h3>SCROLL JOURNEY</h3><p class="filter-result__meta">ストーリー・インタラクション ／ STORY EXPERIENCE</p><p>スクロールに合わせて場面が進む体験型ツアー。</p></article>
				</div>
				<noscript><p class="notice">コンテンツの絞り込みにはJavaScriptを使用します。現在はすべてのコンテンツを表示しています。</p></noscript>
			</form>
			<div class="ui-demo-notes"><section><h3>どんな見せ方？</h3><p>タグや条件を指定して、多数の情報から必要なものだけを表示します。</p></section><section><h3>向いている用途</h3><ul><li>商品一覧</li><li>記事一覧</li><li>店舗検索</li><li>実績検索</li><li>施設検索</li><li>FAQ検索</li></ul></section><section><h3>期待できること</h3><p>情報量が多い場合でも、目的に合う内容へ短時間で到達しやすくなります。</p></section><section><h3>設計のポイント</h3><p>ユーザーが理解できる絞り込み条件を用意し、選択中の条件、該当件数、解除方法を常に分かるようにすることが重要です。</p></section><section><h3>関連する表現</h3><ul><li>PARK INDEX</li><li>タグ／チップ</li><li>ソート</li><li>オートコンプリート</li></ul></section></div>
		</section>

		<section id="before-after" class="ui-demo" aria-labelledby="before-after-title">
			<header class="ui-demo__header">
				<p class="section-label">BEFORE &amp; AFTER</p>
				<h2 id="before-after-title">ビフォー・アフター比較</h2>
				<p>2つの状態を同じ位置で重ね、境界を動かしながら違いを比較できるUIです。</p>
			</header>
			<div class="before-after" data-before-after style="--after-position: 50%;">
				<div class="before-after__preview" role="group" aria-label="SINQ WEB PARKの案内ページ改善比較">
					<article class="before-after__panel before-after__panel--before" aria-label="BEFORE：情報が整理されていない案内ページ">
						<p class="before-after__panel-label">BEFORE</p>
						<div class="mock-guide-page mock-guide-page--before">
							<div class="mock-guide-page__bar"><span>SINQ WEB PARK</span><span>GUIDE</span></div>
							<div class="mock-guide-page__content">
								<p class="mock-guide-page__eyebrow">PARK GUIDE</p>
								<h3>はじめてのSINQ WEB PARK</h3>
								<p class="mock-guide-page__lead">パークの楽しみ方と各エリアをご案内します。</p>
								<div class="mock-guide-page__items">
									<p>UIを体験する</p>
									<p>ビジュアルを楽しむ</p>
									<p>物語を巡る</p>
								</div>
								<span class="mock-guide-page__cta">パークを探索する</span>
							</div>
						</div>
					</article>
					<article class="before-after__panel before-after__panel--after" aria-label="AFTER：視線誘導と情報設計を改善した案内ページ">
						<p class="before-after__panel-label">AFTER</p>
						<div class="mock-guide-page mock-guide-page--after">
							<div class="mock-guide-page__bar"><span>SINQ WEB PARK</span><span>GUIDE</span></div>
							<div class="mock-guide-page__content">
								<p class="mock-guide-page__eyebrow">PARK GUIDE</p>
								<h3>はじめてのSINQ WEB PARK</h3>
								<p class="mock-guide-page__lead">パークの楽しみ方と各エリアをご案内します。</p>
								<div class="mock-guide-page__items">
									<p>UIを体験する</p>
									<p>ビジュアルを楽しむ</p>
									<p>物語を巡る</p>
								</div>
								<span class="mock-guide-page__cta">パークを探索する</span>
							</div>
						</div>
					</article>
					<div class="before-after__labels" aria-hidden="true"><span>BEFORE</span><span>AFTER</span></div>
					<div class="before-after__divider" aria-hidden="true"><span>↔</span></div>
					<input id="before-after-range" class="before-after__range" type="range" min="0" max="100" value="50" step="1" aria-describedby="before-after-instruction" aria-valuenow="50" aria-valuetext="改善後を50％表示" data-before-after-range>
				</div>
				<div class="before-after__controls">
					<label for="before-after-range">改善後の表示範囲</label>
					<p class="before-after__value" data-before-after-value>改善後を50％表示</p>
					<p id="before-after-instruction" class="before-after__instruction">スライダーを左右に動かして、改善前と改善後を比較できます。マウスや指で操作できるほか、キーボードの左右矢印キーでも操作できます。</p>
				</div>
				<noscript><p class="notice">JavaScriptが無効なため、BEFOREとAFTERを並べて表示しています。</p></noscript>
			</div>
			<div class="ui-demo-notes">
				<section><h3>どんな見せ方？</h3><p>2つの画像や画面を同じ位置に重ね、境界線を動かして変化や違いを直感的に見せます。</p></section>
				<section><h3>向いている用途</h3><ul><li>Webサイトのリニューアル比較</li><li>写真の加工前後</li><li>商品の使用前後</li><li>空間や施設の改修前後</li><li>デザイン案の比較</li><li>データや景色の変化</li></ul></section>
				<section><h3>期待できること</h3><p>説明文だけでは伝わりにくい変化を、ユーザー自身の操作によって直感的に理解してもらえます。</p></section>
				<section><h3>設計のポイント</h3><p>見た目の変化だけでなく、何がどのように改善されたのかをラベルや補足文でも伝えることが重要です。</p><p>比較する2つの素材は、同じサイズ・同じ構図・同じ位置関係で用意すると違いを理解しやすくなります。</p></section>
				<section><h3>関連する表現</h3><ul><li>スライダー／カルーセル</li><li>画像ギャラリー</li><li>ケーススタディ</li><li>リニューアル実績</li></ul></section>
			</div>
		</section>

		<section id="choice-diagnosis" class="ui-demo" aria-labelledby="choice-diagnosis-title">
			<header class="ui-demo__header">
				<p class="section-label">CHOICE-BASED DIAGNOSIS</p>
				<h2 id="choice-diagnosis-title">選択式診断</h2>
				<p>いくつかの質問に回答すると、選択した条件に応じて自分に合うWeb施策と、その理由が表示されるUIです。</p>
			</header>
			<form class="choice-diagnosis" data-choice-diagnosis>
				<div class="choice-diagnosis__questions">
					<h3>今の目的に合うWeb施策を見つける</h3>
					<p class="choice-diagnosis__instruction">3つの質問に回答し、「診断結果を確認する」を押すと、選択した条件に応じた施策と理由が表示されます。</p>
					<fieldset aria-describedby="diagnosis-purpose-error" data-diagnosis-question="purpose">
						<legend>質問1：今回、最も重視したい目的は？</legend>
						<p id="diagnosis-purpose-error" class="choice-diagnosis__question-error" data-diagnosis-question-error hidden>この質問に回答してください</p>
						<div class="choice-diagnosis__options">
							<label><input type="radio" name="diagnosis-purpose" value="awareness">認知を広げたい</label>
							<label><input type="radio" name="diagnosis-purpose" value="understanding">商品やサービスの理解を深めたい</label>
							<label><input type="radio" name="diagnosis-purpose" value="participation">参加や応募を増やしたい</label>
						</div>
					</fieldset>
					<fieldset aria-describedby="diagnosis-experience-error" data-diagnosis-question="experience">
						<legend>質問2：ユーザーにどんな体験をしてほしい？</legend>
						<p id="diagnosis-experience-error" class="choice-diagnosis__question-error" data-diagnosis-question-error hidden>この質問に回答してください</p>
						<div class="choice-diagnosis__options">
							<label><input type="radio" name="diagnosis-experience" value="quick">短時間で気軽に楽しんでほしい</label>
							<label><input type="radio" name="diagnosis-experience" value="personal">自分ごととして考えてほしい</label>
							<label><input type="radio" name="diagnosis-experience" value="deep">内容をじっくり理解してほしい</label>
						</div>
					</fieldset>
					<fieldset aria-describedby="diagnosis-social-error" data-diagnosis-question="social">
						<legend>質問3：SNSとの連動はどの程度重視する？</legend>
						<p id="diagnosis-social-error" class="choice-diagnosis__question-error" data-diagnosis-question-error hidden>この質問に回答してください</p>
						<div class="choice-diagnosis__options">
							<label><input type="radio" name="diagnosis-social" value="high">積極的に拡散へつなげたい</label>
							<label><input type="radio" name="diagnosis-social" value="medium">参加のきっかけとして活用したい</label>
							<label><input type="radio" name="diagnosis-social" value="low">Webサイト内の体験を優先したい</label>
						</div>
					</fieldset>
					<p class="choice-diagnosis__form-error" role="alert" data-diagnosis-form-error hidden>未回答の質問があります。すべての質問に回答してから、診断結果をご確認ください。</p>
					<div class="choice-diagnosis__actions">
						<button class="choice-diagnosis__confirm" type="submit">診断結果を確認する</button>
						<button class="choice-diagnosis__reset" type="reset">回答をリセットする</button>
					</div>
				</div>
				<section class="choice-diagnosis__result" data-diagnosis-result>
					<p class="choice-diagnosis__prompt" data-diagnosis-prompt>3つの質問に回答すると、今の目的に合うWeb施策とその理由を確認できます。</p>
					<div data-diagnosis-details hidden>
						<h3 id="diagnosis-result-title" tabindex="-1">あなたに合う施策</h3>
						<p class="choice-diagnosis__result-name" data-diagnosis-result-name></p>
						<p data-diagnosis-description></p>
						<div class="choice-diagnosis__purposes">
							<h4>向いている目的</h4>
							<ul data-diagnosis-purposes></ul>
						</div>
						<div class="choice-diagnosis__reason">
							<h4>今回の結果になった理由</h4>
							<p data-diagnosis-reason></p>
						</div>
						<div class="choice-diagnosis__answers">
							<h4>選択した回答</h4>
							<p data-diagnosis-summary></p>
						</div>
					</div>
					<p class="choice-diagnosis__changed" role="status" data-diagnosis-changed hidden>回答内容が変更されています。もう一度「診断結果を確認する」を押すと、結果が更新されます。</p>
					<p class="screen-reader-text" aria-live="polite" aria-atomic="true" data-diagnosis-announcement></p>
				</section>
				<p class="choice-diagnosis__notice">この診断は、Web施策を検討する際の考え方を体験するための簡易デモです。実際の施策は、目的、ターゲット、予算、実施期間などを踏まえて設計します。</p>
				<noscript><p class="notice choice-diagnosis__noscript">診断結果の表示にはJavaScriptを使用します。質問と選択肢をご確認いただけます。</p></noscript>
			</form>
			<div class="ui-demo-notes">
				<section><h3>どんな見せ方？</h3><p>いくつかの質問に回答して確定すると、選択した条件に応じた結果と、その理由が表示されるUIです。</p></section>
				<section><h3>向いている用途</h3><ul><li>タイプ診断</li><li>商品やプランの提案</li><li>コンテンツのレコメンド</li><li>学習コンテンツ</li><li>セルフチェック</li><li>相談前の簡易ヒアリング</li></ul></section>
				<section><h3>期待できること</h3><p>質問へ回答する体験を通じて、ユーザーがテーマを自分ごととして考えやすくなります。</p><p>結果だけでなく、回答に応じた理由を示すことで、納得感を持って次の情報や行動へ進みやすくなります。</p></section>
				<section><h3>設計のポイント</h3><p>質問数や選択肢を増やしすぎると、回答途中の離脱につながります。</p><p>結果の精度だけを追求するのではなく、ユーザーが負担なく回答できる量へ絞ることが重要です。</p><p>結果ごとに理由や次の行動を示し、診断を受けて終わるのではなく、その後のコンテンツやコンバージョン導線へつなげる設計が必要です。</p></section>
				<section><h3>関連する表現</h3><ul><li>タイプ診断</li><li>選択式コンテンツ</li><li>条件分岐</li><li>レコメンド</li><li>セルフチェック</li></ul></section>
			</div>
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
