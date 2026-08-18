<?php
$front_areas = array(
	array('slug' => 'ui-collection', 'class' => 'ui', 'status' => 'OPEN', 'title' => 'UI COLLECTION', 'description' => 'カード、診断、比較など、使いやすさをつくるUIを実際に体験できます。', 'cta' => 'UIを体験する'),
	array('slug' => 'visual-playground', 'class' => 'visual', 'status' => 'COMING SOON', 'title' => 'VISUAL PLAYGROUND', 'description' => '文字やレイアウトから、記憶に残る見せ方を探すエリアです。', 'cta' => '公開予定を見る'),
	array('slug' => 'data-motion', 'class' => 'data', 'status' => 'COMING SOON', 'title' => 'DATA MOTION', 'description' => '数字や変化を、参加感や達成感へ変える表現を紹介します。', 'cta' => '公開予定を見る'),
	array('slug' => 'story-experience', 'class' => 'story', 'status' => 'COMING SOON', 'title' => 'STORY EXPERIENCE', 'description' => 'スクロールや情報の順序によって、物語を体験させる表現を紹介します。', 'cta' => '公開予定を見る'),
	array('slug' => 'idea-lab', 'class' => 'lab', 'status' => 'COMING SOON', 'title' => 'IDEA LAB', 'description' => '診断、クイズ、投票など、参加型Webコンテンツを実験するエリアです。', 'cta' => '公開予定を見る'),
	array('slug' => 'park-guide', 'class' => 'guide', 'status' => 'GUIDE', 'title' => 'PARK GUIDE', 'description' => 'このパークの見方と、表現を企画へつなげる考え方を案内します。', 'cta' => 'ガイドを見る'),
	array('slug' => 'contact-gate', 'class' => 'contact', 'status' => 'INFORMATION', 'title' => 'CONTACT GATE', 'description' => '気になった表現や、Web企画について相談するための案内ゲートです。', 'cta' => '相談方法を見る'),
);
?>
<section id="park-map" class="section front-map" aria-labelledby="front-map-title">
	<div class="section-inner">
		<p class="section-label">PARK MAP</p>
		<h2 id="front-map-title" class="section-title">気になるエリアから、冒険を始める。</h2>
		<p class="section-description">それぞれのエリアで、Web表現の異なる役割や使い方に出会えます。</p>
		<div class="front-map__canvas">
			<?php foreach ($front_areas as $area) : ?>
				<article class="front-map__spot front-map__spot--<?php echo esc_attr($area['class']); ?>">
					<p class="front-map__status"><?php echo esc_html($area['status']); ?></p>
					<h3><?php echo esc_html($area['title']); ?></h3>
					<p><?php echo esc_html($area['description']); ?></p>
					<a class="text-link" href="<?php echo esc_url(home_url('/' . $area['slug'] . '/')); ?>"><?php echo esc_html($area['cta']); ?></a>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
