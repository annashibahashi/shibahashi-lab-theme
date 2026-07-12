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
		<section class="placeholder-content" aria-labelledby="ui-placeholder-title">
			<h2 id="ui-placeholder-title">今後追加する体験</h2>
			<ul class="placeholder-grid">
				<li id="card-ui" class="placeholder-card">カード</li><li id="tabs" class="placeholder-card">タブ</li>
				<li id="accordion" class="placeholder-card">アコーディオン</li><li id="modal" class="placeholder-card">モーダル</li>
				<li id="slider" class="placeholder-card">スライダー</li><li id="horizontal-scroll" class="placeholder-card">横スクロール</li>
				<li id="fixed-navigation" class="placeholder-card">固定ナビ</li><li id="sticky-cta" class="placeholder-card">追従CTA</li>
			</ul>
		</section>
		<a class="text-link area-page__map-link" href="<?php echo esc_url(home_url('/#park-map')); ?>">TOPページの園内マップへ戻る</a>
		<?php get_template_part('template-parts/area-navigation'); ?>
	</div>
</article>

<?php get_footer(); ?>
