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

document.addEventListener('DOMContentLoaded', () => {
	document.querySelectorAll('[data-flip-card]').forEach((card) => {
		const front = card.querySelector('.flip-card__front');
		const back = card.querySelector('.flip-card__back');
		const openButton = card.querySelector('[data-flip-open]');
		const closeButton = card.querySelector('[data-flip-close]');

		if (!front || !back || !openButton || !closeButton) {
			return;
		}

		const setFlipped = (isFlipped) => {
			card.classList.toggle('is-flipped', isFlipped);
			openButton.setAttribute('aria-expanded', String(isFlipped));
			front.setAttribute('aria-hidden', String(isFlipped));
			back.setAttribute('aria-hidden', String(!isFlipped));
			openButton.tabIndex = isFlipped ? -1 : 0;
			closeButton.tabIndex = isFlipped ? 0 : -1;

			window.requestAnimationFrame(() => {
				(isFlipped ? closeButton : openButton).focus();
			});
		};

		openButton.addEventListener('click', () => setFlipped(true));
		closeButton.addEventListener('click', () => setFlipped(false));
	});

	document.querySelectorAll('[data-tabs]').forEach((tabGroup) => {
		const tabs = Array.from(tabGroup.querySelectorAll('[role="tab"]'));
		const panels = tabs.map((tab) => document.getElementById(tab.getAttribute('aria-controls')));

		if (!tabs.length || panels.some((panel) => !panel)) {
			return;
		}

		const activateTab = (nextIndex, moveFocus = false) => {
			tabs.forEach((tab, index) => {
				const isSelected = index === nextIndex;
				tab.setAttribute('aria-selected', String(isSelected));
				tab.tabIndex = isSelected ? 0 : -1;
				panels[index].hidden = !isSelected;
			});

			if (moveFocus) {
				tabs[nextIndex].focus();
			}
		};

		tabs.forEach((tab, index) => {
			tab.addEventListener('click', () => activateTab(index));
			tab.addEventListener('keydown', (event) => {
				let nextIndex = index;

				if (event.key === 'ArrowRight') {
					nextIndex = (index + 1) % tabs.length;
				} else if (event.key === 'ArrowLeft') {
					nextIndex = (index - 1 + tabs.length) % tabs.length;
				} else if (event.key === 'Home') {
					nextIndex = 0;
				} else if (event.key === 'End') {
					nextIndex = tabs.length - 1;
				} else {
					return;
				}

				event.preventDefault();
				activateTab(nextIndex, true);
			});
		});
	});

	document.querySelectorAll('[data-accordion]').forEach((accordion) => {
		accordion.querySelectorAll('.accordion__button').forEach((button) => {
			const panel = document.getElementById(button.getAttribute('aria-controls'));

			if (!panel) {
				return;
			}

			button.addEventListener('click', () => {
				const isOpen = button.getAttribute('aria-expanded') === 'true';
				button.setAttribute('aria-expanded', String(!isOpen));
				panel.hidden = isOpen;
			});
		});
	});

	document.querySelectorAll('[data-modal-open]').forEach((openButton) => {
		const dialog = document.getElementById(openButton.dataset.modalOpen);

		if (!dialog || typeof dialog.showModal !== 'function') {
			return;
		}

		const closeButton = dialog.querySelector('[data-modal-close]');
		let lastTrigger = null;

		const closeDialog = () => {
			if (dialog.open) {
				dialog.close();
			}
		};

		openButton.addEventListener('click', () => {
			lastTrigger = openButton;
			dialog.showModal();
			document.documentElement.classList.add('modal-open');
		});

		if (closeButton) {
			closeButton.addEventListener('click', closeDialog);
		}

		dialog.addEventListener('click', (event) => {
			if (event.target === dialog) {
				closeDialog();
			}
		});

		dialog.addEventListener('close', () => {
			document.documentElement.classList.remove('modal-open');

			if (lastTrigger && lastTrigger.isConnected) {
				lastTrigger.focus();
			}
		});
	});
});
