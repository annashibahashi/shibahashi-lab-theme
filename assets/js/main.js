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

	const modalTriggers = Array.from(document.querySelectorAll('[data-modal-open]'));
	const modalDialogs = new Set(modalTriggers.map((button) => document.getElementById(button.dataset.modalOpen)).filter(Boolean));

	modalDialogs.forEach((dialog) => {
		if (typeof dialog.showModal !== 'function') {
			return;
		}

		const openButtons = modalTriggers.filter((button) => button.dataset.modalOpen === dialog.id);
		const closeButton = dialog.querySelector('[data-modal-close]');
		let lastTrigger = null;

		const closeDialog = () => {
			if (dialog.open) {
				dialog.close();
			}
		};

		openButtons.forEach((openButton) => {
			openButton.addEventListener('click', () => {
				lastTrigger = openButton;
				dialog.showModal();
				document.documentElement.classList.add('modal-open');
			});
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

	const initCarousel = (carousel) => {
		const slides = Array.from(carousel.querySelectorAll('[data-carousel-slide]'));
		const controls = carousel.querySelector('[data-carousel-controls]');
		const dotsContainer = carousel.querySelector('[data-carousel-dots]');
		const dots = dotsContainer ? Array.from(dotsContainer.querySelectorAll('button')) : [];
		const viewport = carousel.querySelector('.carousel__viewport');
		const previousButton = carousel.querySelector('[data-carousel-prev]');
		const nextButton = carousel.querySelector('[data-carousel-next]');
		const currentPosition = carousel.querySelector('[data-carousel-current]');

		if (!slides.length || !viewport || !controls || dots.length !== slides.length || !previousButton || !nextButton || !currentPosition) {
			return;
		}

		let currentIndex = 0;

		const showSlide = (nextIndex) => {
			currentIndex = (nextIndex + slides.length) % slides.length;

			slides.forEach((slide, index) => {
				const isCurrent = index === currentIndex;
				slide.hidden = !isCurrent;
				slide.classList.toggle('is-active', isCurrent);
				slide.setAttribute('aria-hidden', String(!isCurrent));
			});

			dots.forEach((dot, index) => {
				if (index === currentIndex) {
					dot.setAttribute('aria-current', 'true');
				} else {
					dot.removeAttribute('aria-current');
				}
			});

			currentPosition.textContent = String(currentIndex + 1);
		};

		carousel.classList.add('is-enhanced');
		controls.hidden = false;
		dotsContainer.hidden = false;
		previousButton.addEventListener('click', () => showSlide(currentIndex - 1));
		nextButton.addEventListener('click', () => showSlide(currentIndex + 1));
		dots.forEach((dot, index) => dot.addEventListener('click', () => showSlide(index)));

		let activePointerId = null;
		let startX = 0;
		let startY = 0;
		let isHorizontalDrag = false;
		let suppressClickUntil = 0;
		const directionThreshold = 10;
		const slideThreshold = 48;

		const resetDrag = () => {
			const pointerId = activePointerId;
			activePointerId = null;
			isHorizontalDrag = false;
			carousel.classList.remove('is-dragging');

			if (pointerId !== null && viewport.hasPointerCapture(pointerId)) {
				viewport.releasePointerCapture(pointerId);
			}
		};

		viewport.addEventListener('pointerdown', (event) => {
			if (!event.isPrimary || (event.pointerType === 'mouse' && event.button !== 0)) {
				return;
			}

			activePointerId = event.pointerId;
			startX = event.clientX;
			startY = event.clientY;
			isHorizontalDrag = false;
			viewport.setPointerCapture(event.pointerId);
		});

		viewport.addEventListener('pointermove', (event) => {
			if (event.pointerId !== activePointerId) {
				return;
			}

			const deltaX = event.clientX - startX;
			const deltaY = event.clientY - startY;
			const horizontalDistance = Math.abs(deltaX);
			const verticalDistance = Math.abs(deltaY);

			if (!isHorizontalDrag) {
				if (horizontalDistance >= directionThreshold && horizontalDistance > verticalDistance * 1.2) {
					isHorizontalDrag = true;
					carousel.classList.add('is-dragging');
				} else if (verticalDistance >= directionThreshold && verticalDistance > horizontalDistance * 1.2) {
					resetDrag();
					return;
				}
			}

			if (isHorizontalDrag) {
				event.preventDefault();
			}
		}, { passive: false });

		viewport.addEventListener('pointerup', (event) => {
			if (event.pointerId !== activePointerId) {
				return;
			}

			const deltaX = event.clientX - startX;
			if (isHorizontalDrag) {
				suppressClickUntil = performance.now() + 400;

				if (Math.abs(deltaX) >= slideThreshold) {
					showSlide(currentIndex + (deltaX < 0 ? 1 : -1));
				}
			}

			resetDrag();
		});

		viewport.addEventListener('pointercancel', resetDrag);
		viewport.addEventListener('lostpointercapture', () => {
			if (activePointerId !== null) {
				resetDrag();
			}
		});

		viewport.addEventListener('click', (event) => {
			if (performance.now() < suppressClickUntil) {
				event.preventDefault();
				event.stopPropagation();
				suppressClickUntil = 0;
			}
		}, true);

		showSlide(0);
	};

	const initAttractionFilter = (filter) => {
		const queryInput = filter.querySelector('[data-filter-query]');
		const categoryButtons = Array.from(filter.querySelectorAll('[data-filter-category]'));
		const items = Array.from(filter.querySelectorAll('[data-filter-item]'));
		const resultCount = filter.querySelector('[data-filter-count]');
		const resetButton = filter.querySelector('[data-filter-reset]');
		const emptyState = filter.querySelector('[data-filter-empty]');

		if (!queryInput || !categoryButtons.length || !items.length || !resultCount || !resetButton || !emptyState) {
			return;
		}

		let selectedCategory = 'all';
		const normalizeText = (value) => value.normalize('NFKC').trim().toLocaleLowerCase('ja-JP');

		const updateResults = () => {
			const query = normalizeText(queryInput.value);
			let visibleCount = 0;

			items.forEach((item) => {
				const matchesKeyword = !query || normalizeText(item.textContent).includes(query);
				const matchesCategory = selectedCategory === 'all' || item.dataset.category === selectedCategory;
				const isVisible = matchesKeyword && matchesCategory;

				item.hidden = !isVisible;
				if (isVisible) {
					visibleCount += 1;
				}
			});

			resultCount.textContent = `${items.length}件中${visibleCount}件を表示`;
			emptyState.hidden = visibleCount !== 0;
		};

		queryInput.addEventListener('input', updateResults);
		categoryButtons.forEach((button) => {
			button.addEventListener('click', () => {
				selectedCategory = button.dataset.filterCategory;
				categoryButtons.forEach((categoryButton) => {
					categoryButton.setAttribute('aria-pressed', String(categoryButton === button));
				});
				updateResults();
			});
		});

		resetButton.addEventListener('click', () => {
			queryInput.value = '';
			selectedCategory = 'all';
			categoryButtons.forEach((button) => {
				button.setAttribute('aria-pressed', String(button.dataset.filterCategory === 'all'));
			});
			updateResults();
			queryInput.focus();
		});

		updateResults();
	};

	document.querySelectorAll('[data-carousel]').forEach(initCarousel);
	document.querySelectorAll('[data-attraction-filter]').forEach(initAttractionFilter);
});
