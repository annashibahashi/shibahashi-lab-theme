<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
	<div class="site-header__inner">
		<p class="site-title">
			<a href="<?php echo esc_url(home_url('/')); ?>">
				<span class="site-title__main">SINQ WEB PARK</span>
				<span class="site-title__sub">SHIBAHASHI LAB</span>
			</a>
		</p>

		<button class="menu-toggle" type="button" aria-controls="global-navigation" aria-expanded="false">
			<span class="menu-toggle__icon" aria-hidden="true"><span></span><span></span><span></span></span>
			<span class="menu-toggle__label">メニュー</span>
		</button>

		<nav id="global-navigation" class="global-nav" aria-label="メインナビゲーション">
			<ul class="global-nav__list">
				<li><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
				<li><a href="<?php echo esc_url(home_url('/#park-map')); ?>">見せ方を体験する</a></li>
				<li><a href="<?php echo esc_url(home_url('/park-index/')); ?>">表現から探す</a></li>
				<li><a href="<?php echo esc_url(home_url('/idea-lab/')); ?>">Webコンテンツ</a></li>
				<li><a href="<?php echo esc_url(home_url('/park-guide/')); ?>">パークガイド</a></li>
				<li><a href="<?php echo esc_url(home_url('/contact-gate/')); ?>">柴橋に相談する</a></li>
			</ul>
		</nav>
	</div>
</header>

<main id="main" class="site-main">
