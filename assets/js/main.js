document.addEventListener('DOMContentLoaded', () => {
	const root = document.documentElement;
	const menuButton = document.querySelector('.menu-toggle');
	const navigation = document.querySelector('#global-navigation');

	root.classList.add('js');

	if (!menuButton || !navigation) {
		root.classList.remove('js');
		return;
	}

	const menuLabel = menuButton.querySelector('.menu-toggle__label');
	const mobileMedia = window.matchMedia('(max-width: 48rem)');

	const closeMenu = (returnFocus = false) => {
		menuButton.setAttribute('aria-expanded', 'false');
		menuButton.classList.remove('is-active');
		navigation.classList.remove('is-open');
		root.classList.remove('menu-open');

		if (menuLabel) {
			menuLabel.textContent = 'メニュー';
		}

		if (returnFocus) {
			menuButton.focus();
		}
	};

	const openMenu = () => {
		menuButton.setAttribute('aria-expanded', 'true');
		menuButton.classList.add('is-active');
		navigation.classList.add('is-open');
		root.classList.add('menu-open');

		if (menuLabel) {
			menuLabel.textContent = '閉じる';
		}
	};

	menuButton.addEventListener('click', () => {
		const isOpen = menuButton.getAttribute('aria-expanded') === 'true';

		if (isOpen) {
			closeMenu();
		} else {
			openMenu();
		}
	});

	navigation.addEventListener('click', (event) => {
		if (event.target.closest('a')) {
			closeMenu();
		}
	});

	document.addEventListener('click', (event) => {
		const isOpen = menuButton.getAttribute('aria-expanded') === 'true';

		if (isOpen && !menuButton.contains(event.target) && !navigation.contains(event.target)) {
			closeMenu();
		}
	});

	document.addEventListener('keydown', (event) => {
		if (event.key === 'Escape' && menuButton.getAttribute('aria-expanded') === 'true') {
			closeMenu(true);
		}
	});

	const handleViewportChange = (event) => {
		if (!event.matches) {
			closeMenu();
		}
	};

	if (typeof mobileMedia.addEventListener === 'function') {
		mobileMedia.addEventListener('change', handleViewportChange);
	} else {
		mobileMedia.addListener(handleViewportChange);
	}
});
