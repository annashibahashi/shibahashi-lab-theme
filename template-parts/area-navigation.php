<?php
/**
 * 各エリアページで共通して表示するナビゲーションです。
 */
$area_navigation_items = array(
	'ui-collection'       => 'UI COLLECTION',
	'visual-playground'   => 'VISUAL PLAYGROUND',
	'data-motion'         => 'DATA MOTION',
	'story-experience'    => 'STORY EXPERIENCE',
	'park-index'          => 'PARK INDEX',
	'idea-lab'            => 'IDEA LAB',
	'park-guide'          => 'PARK GUIDE',
	'contact-gate'        => 'CONTACT GATE',
);
?>
<nav class="area-navigation" aria-label="ほかのエリア">
	<h2 class="area-navigation__title">ほかのエリアへ</h2>
	<ul class="area-navigation__list">
		<?php foreach ($area_navigation_items as $area_slug => $area_name) : ?>
			<li>
				<a href="<?php echo esc_url(home_url('/' . $area_slug . '/')); ?>"<?php echo is_page($area_slug) ? ' aria-current="page"' : ''; ?>>
					<?php echo esc_html($area_name); ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</nav>
