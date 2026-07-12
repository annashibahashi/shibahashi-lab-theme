<?php get_header(); ?>

<article class="area-page area-page--contact-gate">
	<div class="section-inner section-inner--narrow">
		<nav class="breadcrumb" aria-label="パンくずリスト">
			<ol class="breadcrumb__list"><li><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li><li aria-current="page">CONTACT GATE</li></ol>
		</nav>
		<header class="area-page__header">
			<p class="section-label">CONTACT GATE</p>
			<h1 class="section-title">次の企画、どんなWeb体験にしましょう？</h1>
			<p>まだ内容が固まっていない段階でも大丈夫です。<br>見せ方や導線、実現方法から一緒に整理します。</p>
		</header>
		<section class="contact-placeholder" aria-labelledby="contact-placeholder-title">
			<h2 id="contact-placeholder-title">ご相談窓口</h2>
			<a class="button-link button-link--disabled" href="#" aria-disabled="true" aria-describedby="contact-page-note">柴橋に相談する</a>
			<p id="contact-page-note" class="notice">相談先は準備中のため、このリンクは現在利用できません。</p>
		</section>
		<a class="text-link area-page__map-link" href="<?php echo esc_url(home_url('/#park-map')); ?>">TOPページの園内マップへ戻る</a>
		<?php get_template_part('template-parts/area-navigation'); ?>
	</div>
</article>

<?php get_footer(); ?>
