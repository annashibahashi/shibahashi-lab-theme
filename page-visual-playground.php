<?php get_header(); ?>

<article class="area-page area-page--visual-playground">
	<div class="section-inner">
		<nav class="breadcrumb" aria-label="パンくずリスト">
			<ol class="breadcrumb__list"><li><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li><li aria-current="page">VISUAL PLAYGROUND</li></ol>
		</nav>
		<header class="area-page__header">
			<p class="section-label">VISUAL PLAYGROUND</p>
			<h1 class="section-title">情報を印象的に見せる表現</h1>
			<p>文字、図形、レイアウトを活用し、<br>情報を楽しく印象に残す表現を体験できるエリアです。</p>
		</header>
		<section class="placeholder-content" aria-labelledby="visual-placeholder-title">
			<h2 id="visual-placeholder-title">今後追加する体験</h2>
			<ul class="placeholder-grid">
				<li id="clipboard-layout" class="placeholder-card">クリップボード風レイアウト</li><li id="scrapbook" class="placeholder-card">スクラップブック／コラージュ</li>
				<li id="typography" class="placeholder-card">タイポグラフィー</li><li id="word-art" class="placeholder-card">ワードアート</li>
				<li id="word-tree" class="placeholder-card">ワードツリー</li><li id="sticky-note" class="placeholder-card">付箋・マーカー表現</li>
				<li id="marquee" class="placeholder-card">マーキー</li><li id="ticket-ui" class="placeholder-card">チケット／スタンプ風UI</li>
			</ul>
		</section>
		<a class="text-link area-page__map-link" href="<?php echo esc_url(home_url('/#park-map')); ?>">TOPページの園内マップへ戻る</a>
		<?php get_template_part('template-parts/area-navigation'); ?>
	</div>
</article>

<?php get_footer(); ?>
