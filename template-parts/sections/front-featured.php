<?php
$ui_collection_url = home_url('/ui-collection/');
$featured_items = array(
	array('class' => 'diagnosis', 'title' => '選択式診断', 'description' => '回答に応じた提案と、その理由を分かりやすく伝えるUIです。', 'uses' => '診断、商品提案、簡易ヒアリング', 'anchor' => 'choice-diagnosis', 'cta' => '選択式診断を見る'),
	array('class' => 'comparison', 'title' => '比較スライダー', 'description' => '改善前後や二つの状態を、同じ画面上で直感的に比較できます。', 'uses' => '改善事例、商品比較、変化の説明', 'anchor' => 'before-after', 'cta' => '比較スライダーを見る'),
	array('class' => 'cta', 'title' => 'CTAマイクロインタラクション', 'description' => '小さな光と反応で、次に押せる場所を自然に伝えます。', 'uses' => '資料請求、詳細導線、購入ボタン', 'anchor' => 'cta-microinteraction', 'cta' => 'CTAの動きを見る'),
);
?>
<section class="section front-featured" aria-labelledby="front-featured-title">
	<div class="section-inner">
		<p class="section-label">FEATURED ATTRACTION</p>
		<h2 id="front-featured-title" class="section-title">まずは、触ってみる。</h2>
		<p class="section-description">カード、診断、比較、アニメーション。実際に操作すると、見せ方によって受け取る印象や使いやすさがどう変わるかを体験できます。</p>
		<div class="front-featured__grid">
			<?php foreach ($featured_items as $item) : ?>
				<article class="front-featured__card">
					<div class="front-featured__preview front-featured__preview--<?php echo esc_attr($item['class']); ?>" aria-hidden="true"><span></span><span></span><span></span></div>
					<div class="front-featured__body">
						<h3><?php echo esc_html($item['title']); ?></h3>
						<p><?php echo esc_html($item['description']); ?></p>
						<p class="front-featured__uses"><strong>向いている用途</strong><span><?php echo esc_html($item['uses']); ?></span></p>
						<a class="text-link" href="<?php echo esc_url($ui_collection_url . '#' . $item['anchor']); ?>"><?php echo esc_html($item['cta']); ?></a>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section front-index-gate" aria-labelledby="front-index-title">
	<div class="section-inner front-index-gate__inner">
		<div>
			<p class="section-label">PARK INDEX GATE</p>
			<h2 id="front-index-title" class="section-title">目的に合う表現を探す。</h2>
			<p>見たい表現や用途が決まっている方は、PARK INDEXからすべてのエリアを確認できます。</p>
			<a class="button-link is-arrow-shine" href="<?php echo esc_url(home_url('/park-index/')); ?>"><span>すべての表現から探す</span><span class="cta-arrow-shine__icon" aria-hidden="true">→</span></a>
		</div>
		<ul class="front-index-gate__tags" aria-label="探せる表現の例">
			<li>UI</li><li>モーション</li><li>データ</li><li>ストーリー</li><li>診断</li><li>キャンペーン</li><li>コンバージョン導線</li>
		</ul>
	</div>
</section>

<section class="section front-why" aria-labelledby="front-why-title">
	<div class="section-inner front-why__inner">
		<div class="front-why__copy">
			<p class="section-label">WHY THIS PARK</p>
			<h2 id="front-why-title" class="section-title">表現には、使う理由がある。</h2>
			<p class="front-why__lead">動きがあるから、目立つ。<br>触れるから、楽しい。</p>
			<p>それだけでは、企画や成果につながる表現とは限りません。</p>
			<p>このパークでは、見た目や動きだけでなく、ユーザーの気持ち、情報の伝わり方、次の行動へのつながりまで含めて紹介します。</p>
		</div>
		<ul class="front-why__points">
			<li><span aria-hidden="true">01</span><strong>感情を動かす</strong></li>
			<li><span aria-hidden="true">02</span><strong>情報を分かりやすくする</strong></li>
			<li><span aria-hidden="true">03</span><strong>次の行動へつなげる</strong></li>
		</ul>
	</div>
</section>
