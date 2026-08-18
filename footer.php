</main>

<footer class="site-footer">
	<div class="site-footer__inner">
		<p class="site-footer__title">SINQ WEB PARK <span class="site-footer__subtitle">/ SHIBAHASHI LAB</span></p>

		<nav class="footer-nav" aria-label="フッターナビゲーション">
			<ul class="footer-nav__list">
				<li><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
				<li><a href="<?php echo esc_url(home_url('/park-index/')); ?>">PARK INDEX</a></li>
				<li><a href="<?php echo esc_url(home_url('/ui-collection/')); ?>">UI COLLECTION</a></li>
				<li><a href="<?php echo esc_url(home_url('/park-guide/')); ?>">PARK GUIDE</a></li>
				<li><a href="<?php echo esc_url(home_url('/contact-gate/')); ?>">CONTACT GATE</a></li>
			</ul>
		</nav>

		<p class="site-footer__affiliation">株式会社SINQ所属</p>
		<p class="site-footer__copyright">
			&copy; <?php echo esc_html(wp_date('Y')); ?>
			<?php echo esc_html(get_bloginfo('name')); ?>
		</p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
