<?php get_header(); ?>

<section class="hero hero--future-entry" aria-labelledby="hero-title">
	<div class="section-inner hero__inner">
		<p class="hero__eyebrow">WELCOME TO</p>
		<h1 id="hero-title" class="hero__title">SINQ WEB PARK</h1>
		<p class="hero__lead">
			Webの見せ方を、触れて発見する。<br>
			次の企画のイメージが広がる、未来の体験型テーマパーク。
		</p>
	</div>
</section>

<section class="section statement" aria-labelledby="statement-title">
	<div class="section-inner section-inner--narrow">
		<p class="section-label">STATEMENT</p>
		<h2 id="statement-title" class="section-title">こんな見せ方も、できるんだ。</h2>
		<div class="statement__body">
			<p>Webの情報は、動きや順番、触れ方によって、<br>受け取られ方が変わります。</p>
			<p>SINQ WEB PARKは、Web表現を実際に触れながら、<br>次の企画につながるヒントを見つける体験型テーマパークです。</p>
			<p>気になる表現から自由に巡り、<br>自分の案件での活用を想像してみてください。</p>
		</div>
	</div>
</section>

<section id="how-to-enjoy" class="section how-to-enjoy" aria-labelledby="how-to-enjoy-title">
	<div class="section-inner">
		<p class="section-label">HOW TO ENJOY</p>
		<h2 id="how-to-enjoy-title" class="section-title">このサイトの楽しみ方</h2>
		<ol class="step-list">
			<li class="step-card">
				<p class="step-card__number" aria-hidden="true">01</p>
				<h3 class="step-card__title">選ぶ</h3>
				<p>マップや索引から、気になる表現を探します。</p>
			</li>
			<li class="step-card">
				<p class="step-card__number" aria-hidden="true">02</p>
				<h3 class="step-card__title">触れる</h3>
				<p>実際の動きや仕組みを操作して、伝わり方の違いを体験します。</p>
			</li>
			<li class="step-card">
				<p class="step-card__number" aria-hidden="true">03</p>
				<h3 class="step-card__title">想像する</h3>
				<p>活用場面や効果を知り、自分の案件に置き換えて考えます。</p>
			</li>
		</ol>
	</div>
</section>

<section id="park-search" class="section park-search" aria-labelledby="park-search-title">
	<div class="section-inner">
		<p class="section-label">PARK SEARCH</p>
		<h2 id="park-search-title" class="section-title">気になる表現を探してみる</h2>
		<p id="park-search-status" class="notice">検索・索引機能は準備中です</p>

		<form class="search-preview" action="<?php echo esc_url(home_url('/')); ?>" method="get" aria-describedby="park-search-status">
			<label class="search-preview__label" for="park-search-keyword">表現名や特徴を入力</label>
			<div class="search-preview__controls">
				<input id="park-search-keyword" class="search-preview__input" type="search" name="s" placeholder="カード形式、横スクロール、タイポグラフィー……" disabled>
				<button class="button-link search-preview__button" type="button" disabled>検索する</button>
			</div>
		</form>

		<div class="keyword-links" aria-label="人気キーワード">
			<p class="keyword-links__title">人気キーワード</p>
			<ul class="keyword-links__list">
				<li><a href="<?php echo esc_url(home_url('/ui-collection/#card-layout')); ?>">カードUI</a></li>
				<li><a href="<?php echo esc_url(home_url('/ui-collection/#flip-card')); ?>">フリップカード</a></li>
				<li><a href="<?php echo esc_url(home_url('/visual-playground/#typography')); ?>">タイポグラフィー</a></li>
				<li><a href="<?php echo esc_url(home_url('/data-motion/#progress-meter')); ?>">達成ゲージ</a></li>
				<li><a href="<?php echo esc_url(home_url('/story-experience/#scroll-animation')); ?>">スクロール演出</a></li>
			</ul>
		</div>
		<a class="text-link" href="<?php echo esc_url(home_url('/park-index/')); ?>">索引一覧を見る</a>
	</div>
</section>

<section id="park-map" class="section park-map" aria-labelledby="park-map-title">
	<div class="section-inner">
		<p class="section-label">PARK MAP</p>
		<h2 id="park-map-title" class="section-title">園内マップから、気になるエリアへ。</h2>
		<p class="section-description">気になる見た目から、直感的にエリアを選んでみてください。</p>
		<div class="park-map__canvas" aria-label="園内エリアの仮マップ">
			<a class="map-spot map-spot--ui" href="<?php echo esc_url(home_url('/ui-collection/')); ?>">
				<strong>UI COLLECTION</strong><span>情報を使いやすくする基本UI</span>
			</a>
			<a class="map-spot map-spot--visual" href="<?php echo esc_url(home_url('/visual-playground/')); ?>">
				<strong>VISUAL PLAYGROUND</strong><span>情報を印象的に見せる表現</span>
			</a>
			<a class="map-spot map-spot--data" href="<?php echo esc_url(home_url('/data-motion/')); ?>">
				<strong>DATA MOTION</strong><span>数字や変化を体感させる表現</span>
			</a>
			<a class="map-spot map-spot--story" href="<?php echo esc_url(home_url('/story-experience/')); ?>">
				<strong>STORY EXPERIENCE</strong><span>順番や動きで物語を伝える表現</span>
			</a>
			<a class="map-spot map-spot--index" href="<?php echo esc_url(home_url('/park-index/')); ?>">
				<strong>PARK INDEX</strong><span>表現名・目的・用途から探す索引</span>
			</a>
			<a class="map-spot map-spot--lab" href="<?php echo esc_url(home_url('/idea-lab/')); ?>">
				<span class="status-badge">COMING SOON</span><strong>IDEA LAB</strong><span>Webコンテンツを体験するエリア</span>
			</a>
		</div>
	</div>
</section>

<section id="area-directory" class="section area-directory" aria-labelledby="area-directory-title">
	<div class="section-inner">
		<p class="section-label">AREA DIRECTORY</p>
		<h2 id="area-directory-title" class="section-title">見せ方を変えると、選び方も変わる。</h2>
		<p class="section-description">園内マップと同じエリアを、カード形式で整理しました。<br>機能やリンク先は同じでも、情報の見せ方によって、<br>直感的に選ぶ体験と、内容を比較して選ぶ体験が生まれます。</p>
		<div class="area-grid">
			<article class="area-card">
				<h3>UI COLLECTION</h3><p>情報を使いやすくする基本UI</p><a class="text-link" href="<?php echo esc_url(home_url('/ui-collection/')); ?>">このエリアを見る</a>
			</article>
			<article class="area-card">
				<h3>VISUAL PLAYGROUND</h3><p>情報を印象的に見せる表現</p><a class="text-link" href="<?php echo esc_url(home_url('/visual-playground/')); ?>">このエリアを見る</a>
			</article>
			<article class="area-card">
				<h3>DATA MOTION</h3><p>数字や変化を体感させる表現</p><a class="text-link" href="<?php echo esc_url(home_url('/data-motion/')); ?>">このエリアを見る</a>
			</article>
			<article class="area-card">
				<h3>STORY EXPERIENCE</h3><p>順番や動きで物語を伝える表現</p><a class="text-link" href="<?php echo esc_url(home_url('/story-experience/')); ?>">このエリアを見る</a>
			</article>
			<article class="area-card">
				<h3>PARK INDEX</h3><p>表現名・目的・用途から探す索引</p><a class="text-link" href="<?php echo esc_url(home_url('/park-index/')); ?>">このエリアを見る</a>
			</article>
			<article class="area-card area-card--coming-soon">
				<p class="status-badge">COMING SOON</p><h3>IDEA LAB</h3><p>Webコンテンツを体験するエリア</p><a class="text-link" href="<?php echo esc_url(home_url('/idea-lab/')); ?>">このエリアを見る</a>
			</article>
		</div>
	</div>
</section>

<?php get_footer(); ?>
