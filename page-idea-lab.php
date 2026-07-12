<?php get_header(); ?>

<article class="area-page area-page--idea-lab">
	<div class="section-inner">
		<nav class="breadcrumb" aria-label="パンくずリスト">
			<ol class="breadcrumb__list"><li><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li><li aria-current="page">IDEA LAB</li></ol>
		</nav>
		<header class="area-page__header">
			<p class="status-badge">COMING SOON</p>
			<p class="section-label">IDEA LAB</p>
			<h1 class="section-title">Webコンテンツを体験するエリア</h1>
			<p>診断、クイズ、投票、ルーレット、ミニゲームなど、<br>参加型のWebコンテンツを紹介する予定のエリアです。</p>
		</header>
		<section class="placeholder-content placeholder-content--coming-soon" aria-labelledby="idea-placeholder-title">
			<h2 id="idea-placeholder-title">コンテンツ準備中</h2><p>詳細コンテンツは今後追加予定です。</p>
		</section>
		<a class="text-link area-page__map-link" href="<?php echo esc_url(home_url('/#park-map')); ?>">TOPページの園内マップへ戻る</a>
		<?php get_template_part('template-parts/area-navigation'); ?>
	</div>
</article>

<?php get_footer(); ?>
