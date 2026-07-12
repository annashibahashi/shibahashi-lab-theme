<?php get_header(); ?>

<article class="area-page area-page--park-guide">
	<div class="section-inner">
		<nav class="breadcrumb" aria-label="パンくずリスト">
			<ol class="breadcrumb__list"><li><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li><li aria-current="page">PARK GUIDE</li></ol>
		</nav>
		<header class="area-page__header">
			<p class="section-label">PARK GUIDE</p>
			<h1 class="section-title">パークガイドについて</h1>
			<p>株式会社SINQでWebプロデューサーをしています。<br>企画から制作・運用まで、Webに関するご相談に伴走します。</p>
		</header>
		<section class="profile-placeholder" aria-labelledby="profile-placeholder-title">
			<div class="profile-placeholder__image" aria-hidden="true">PHOTO</div>
			<div><h2 id="profile-placeholder-title">プロフィール仮枠</h2><p>プロフィール、写真、会社紹介資料は後から差し替える予定です。</p></div>
		</section>
		<a class="text-link area-page__map-link" href="<?php echo esc_url(home_url('/#park-map')); ?>">TOPページの園内マップへ戻る</a>
		<?php get_template_part('template-parts/area-navigation'); ?>
	</div>
</article>

<?php get_footer(); ?>
