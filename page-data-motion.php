<?php get_header(); ?>

<article class="area-page area-page--data-motion">
	<div class="section-inner">
		<nav class="breadcrumb" aria-label="パンくずリスト">
			<ol class="breadcrumb__list"><li><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li><li aria-current="page">DATA MOTION</li></ol>
		</nav>
		<header class="area-page__header">
			<p class="section-label">DATA MOTION</p>
			<h1 class="section-title">数字や変化を体感させる表現</h1>
			<p>数値や進捗を動きとして見せ、<br>参加感や達成感を生み出す表現を体験できるエリアです。</p>
		</header>
		<section class="placeholder-content" aria-labelledby="data-placeholder-title">
			<h2 id="data-placeholder-title">今後追加する体験</h2>
			<p class="notice">現在は表示確認用の仮項目です。実データは取得・保存しません。</p>
			<ul class="placeholder-grid">
				<li id="progress-meter" class="placeholder-card">達成ゲージ</li><li id="count-up" class="placeholder-card">カウントアップ</li>
				<li id="vote-ratio" class="placeholder-card">投票比率</li><li id="click-counter" class="placeholder-card">クリック数表示</li>
				<li id="view-counter" class="placeholder-card">閲覧数表示</li><li id="scroll-progress" class="placeholder-card">スクロール進捗</li>
				<li id="circular-progress" class="placeholder-card">円形プログレス</li><li id="ranking" class="placeholder-card">ランキング</li>
			</ul>
		</section>
		<a class="text-link area-page__map-link" href="<?php echo esc_url(home_url('/#park-map')); ?>">TOPページの園内マップへ戻る</a>
		<?php get_template_part('template-parts/area-navigation'); ?>
	</div>
</article>

<?php get_footer(); ?>
