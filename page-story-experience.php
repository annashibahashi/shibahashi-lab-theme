<?php get_header(); ?>

<article class="area-page area-page--story-experience">
	<div class="section-inner">
		<nav class="breadcrumb" aria-label="パンくずリスト">
			<ol class="breadcrumb__list"><li><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li><li aria-current="page">STORY EXPERIENCE</li></ol>
		</nav>
		<header class="area-page__header">
			<p class="section-label">STORY EXPERIENCE</p>
			<h1 class="section-title">順番や動きで物語を伝える表現</h1>
			<p>スクロールや画面の変化を使い、<br>情報を物語として順番に伝える表現を体験できるエリアです。</p>
		</header>
		<section class="placeholder-content" aria-labelledby="story-placeholder-title">
			<h2 id="story-placeholder-title">今後追加する体験</h2>
			<ul class="placeholder-grid">
				<li id="fade-in" class="placeholder-card">フェードイン</li><li id="scroll-animation" class="placeholder-card">スクロール連動</li>
				<li id="parallax" class="placeholder-card">パララックス</li><li id="horizontal-story" class="placeholder-card">横スクロールストーリー</li>
				<li id="before-after" class="placeholder-card">ビフォー・アフター</li><li id="timeline" class="placeholder-card">タイムライン</li>
				<li id="frame-animation" class="placeholder-card">コマ送り</li><li id="page-transition" class="placeholder-card">ページ遷移演出</li>
			</ul>
		</section>
		<a class="text-link area-page__map-link" href="<?php echo esc_url(home_url('/#park-map')); ?>">TOPページの園内マップへ戻る</a>
		<?php get_template_part('template-parts/area-navigation'); ?>
	</div>
</article>

<?php get_footer(); ?>
