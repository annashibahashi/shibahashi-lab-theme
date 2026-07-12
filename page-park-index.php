<?php get_header(); ?>

<article class="area-page area-page--park-index">
	<div class="section-inner">
		<nav class="breadcrumb" aria-label="パンくずリスト">
			<ol class="breadcrumb__list"><li><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li><li aria-current="page">PARK INDEX</li></ol>
		</nav>
		<header class="area-page__header">
			<p class="section-label">PARK INDEX</p>
			<h1 class="section-title">表現名・目的・用途から探す</h1>
			<p>気になる表現や実現したいことから、<br>該当するデモを探せる索引です。</p>
			<p class="notice">検索・絞り込み機能は今後追加予定です。</p>
		</header>
		<section class="index-preview" aria-labelledby="index-preview-title">
			<h2 id="index-preview-title">表現名から探す</h2>
			<ul class="index-preview__list">
				<li class="index-preview__item" data-index-name="カード" data-index-purpose="情報整理"><a href="<?php echo esc_url(home_url('/ui-collection/#card-layout')); ?>">カード</a><span>UI COLLECTION</span></li>
				<li class="index-preview__item" data-index-name="タイポグラフィー" data-index-purpose="印象づくり"><a href="<?php echo esc_url(home_url('/visual-playground/#typography')); ?>">タイポグラフィー</a><span>VISUAL PLAYGROUND</span></li>
				<li class="index-preview__item" data-index-name="達成ゲージ" data-index-purpose="進捗表示"><a href="<?php echo esc_url(home_url('/data-motion/#progress-meter')); ?>">達成ゲージ</a><span>DATA MOTION</span></li>
				<li class="index-preview__item" data-index-name="スクロール連動" data-index-purpose="物語表現"><a href="<?php echo esc_url(home_url('/story-experience/#scroll-animation')); ?>">スクロール連動</a><span>STORY EXPERIENCE</span></li>
			</ul>
		</section>
		<a class="text-link area-page__map-link" href="<?php echo esc_url(home_url('/#park-map')); ?>">TOPページの園内マップへ戻る</a>
		<?php get_template_part('template-parts/area-navigation'); ?>
	</div>
</article>

<?php get_footer(); ?>
