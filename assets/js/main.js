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

	const initMultiTagFilter = (filter) => {
		const groups = Array.from(filter.querySelectorAll('[data-filter-group]'));
		const items = Array.from(filter.querySelectorAll('[data-filter-item]'));
		const resultCount = filter.querySelector('[data-filter-count]');
		const selectionSummary = filter.querySelector('[data-filter-selection]');
		const emptyState = filter.querySelector('[data-filter-empty]');

		if (!groups.length || !items.length || !resultCount || !selectionSummary || !emptyState) {
			return;
		}

		const groupTags = groups.map((group) => Array.from(group.querySelectorAll('[data-filter-tag]')));
		const allTags = groupTags.flat();
		const itemTags = new Map(items.map((item) => [
			item,
			new Set((item.dataset.filterTags || '').split(/\s+/).filter(Boolean)),
		]));

		if (!allTags.length) {
			return;
		}

		const updateResults = () => {
			const selectedByGroup = groupTags.map((tags) => tags.filter((tag) => tag.checked));
			const selectedTags = selectedByGroup.flat();
			let visibleCount = 0;

			items.forEach((item) => {
				const tags = itemTags.get(item);
				const isVisible = selectedByGroup.every((selectedInGroup) => (
					!selectedInGroup.length || selectedInGroup.some((tag) => tags.has(tag.value))
				));

				item.hidden = !isVisible;
				if (isVisible) {
					visibleCount += 1;
				}
			});

			const selectedLabels = selectedTags.map((tag) => tag.closest('label')?.textContent.trim() || tag.value);
			const isFiltered = selectedTags.length > 0;

			resultCount.textContent = isFiltered
				? `${visibleCount}件のコンテンツが見つかりました`
				: `${visibleCount}件のコンテンツを表示しています`;
			selectionSummary.textContent = `選択中：${isFiltered ? selectedLabels.join('、') : 'すべて'}`;
			emptyState.hidden = visibleCount !== 0;
		};

		allTags.forEach((tag) => {
			tag.addEventListener('change', updateResults);
		});
		filter.addEventListener('submit', (event) => event.preventDefault());
		filter.addEventListener('reset', () => {
			window.requestAnimationFrame(updateResults);
		});

		updateResults();
	};

	const initBeforeAfter = (comparison) => {
		const range = comparison.querySelector('[data-before-after-range]');
		const valueText = comparison.querySelector('[data-before-after-value]');

		if (!range || !valueText) {
			return;
		}

		const updateComparison = () => {
			const minimum = Number(range.min);
			const maximum = Number(range.max);
			const inputValue = Number(range.value);

			if (!Number.isFinite(minimum) || !Number.isFinite(maximum) || !Number.isFinite(inputValue)) {
				return;
			}

			const currentValue = Math.min(maximum, Math.max(minimum, inputValue));
			const displayValue = String(currentValue);
			const accessibleValue = `改善後を${displayValue}％表示`;

			comparison.style.setProperty('--after-position', `${currentValue}%`);
			valueText.textContent = accessibleValue;
			range.setAttribute('aria-valuenow', displayValue);
			range.setAttribute('aria-valuetext', accessibleValue);
		};

		range.addEventListener('input', updateComparison);
		updateComparison();
		comparison.classList.add('is-enhanced');
	};

	const initFilterSimulator = (simulator) => {
		const experienceSelect = simulator.querySelector('[data-simulator-experience]');
		const livelinessRange = simulator.querySelector('[data-simulator-liveliness]');
		const livelinessValue = simulator.querySelector('[data-simulator-liveliness-value]');
		const stayOptions = Array.from(simulator.querySelectorAll('[data-simulator-stay]'));
		const result = simulator.querySelector('[data-simulator-result]');
		const resultArea = simulator.querySelector('[data-simulator-area]');
		const resultDescription = simulator.querySelector('[data-simulator-description]');
		const resultGuidance = simulator.querySelector('[data-simulator-guidance]');
		const resultSummary = simulator.querySelector('[data-simulator-summary]');
		const resultLink = simulator.querySelector('[data-simulator-link]');
		const resultPending = simulator.querySelector('[data-simulator-pending]');

		if (!experienceSelect || !livelinessRange || !livelinessValue || !stayOptions.length || !result || !resultArea || !resultDescription || !resultGuidance || !resultSummary || !resultLink || !resultPending) {
			return;
		}

		const recommendations = {
			ui: {
				name: 'UI COLLECTION',
				description: '基本UIを操作しながら、情報設計の仕組みを学べるエリアです。',
				hasLink: true,
			},
			visual: {
				name: 'VISUAL PLAYGROUND',
				description: '色や形の変化に触れながら、直感的にWeb表現を楽しめるエリアです。',
				hasLink: false,
			},
			idea: {
				name: 'IDEA LAB',
				description: 'アイデアを深めながら、表現の組み立て方をじっくり考えられるエリアです。',
				hasLink: false,
			},
			story: {
				name: 'STORY EXPERIENCE',
				description: '物語の流れに沿って、場面の変化を体験できるエリアです。',
				hasLink: false,
			},
		};

		const livelinessOptions = {
			1: {
				label: '落ち着いている',
				guidance: '自分のペースで、落ち着いて楽しめるルートがおすすめです。',
			},
			2: {
				label: 'ほどよくにぎやか',
				guidance: '見どころを巡りながら、ほどよく体験できるルートがおすすめです。',
			},
			3: {
				label: 'とてもにぎやか',
				guidance: '動きや変化をたっぷり楽しめる、にぎやかなルートがおすすめです。',
			},
		};

		const getRecommendationKey = (experience, stay) => {
			if (experience === 'visual') {
				return 'visual';
			}

			if (experience === 'story') {
				return 'story';
			}

			return stay === 'long' ? 'idea' : 'ui';
		};

		const updateResult = () => {
			const selectedStay = stayOptions.find((option) => option.checked);
			const selectedExperience = experienceSelect.selectedOptions[0];
			const liveliness = livelinessOptions[livelinessRange.value];

			if (!selectedStay || !selectedExperience || !liveliness) {
				return;
			}

			const recommendation = recommendations[getRecommendationKey(experienceSelect.value, selectedStay.value)];
			const stayLabel = selectedStay.closest('label')?.textContent.trim() || selectedStay.value;
			const stayDescription = selectedStay.value === 'long'
				? '時間をかけて、ゆっくり巡る選択に合っています。'
				: '短時間で、ポイントを絞って巡る選択に合っています。';

			livelinessValue.textContent = `${livelinessRange.value}：${liveliness.label}`;
			livelinessRange.setAttribute('aria-valuenow', livelinessRange.value);
			livelinessRange.setAttribute('aria-valuetext', liveliness.label);
			resultArea.textContent = recommendation.name;
			resultDescription.textContent = `${recommendation.description}${stayDescription}`;
			resultGuidance.textContent = liveliness.guidance;
			resultSummary.textContent = `${selectedExperience.textContent} ／ ${liveliness.label} ／ ${stayLabel}`;
			resultLink.hidden = !recommendation.hasLink;
			resultPending.hidden = recommendation.hasLink;
			result.hidden = false;
		};

		experienceSelect.addEventListener('change', updateResult);
		livelinessRange.addEventListener('input', updateResult);
		stayOptions.forEach((option) => option.addEventListener('change', updateResult));
		simulator.addEventListener('submit', (event) => event.preventDefault());
		simulator.addEventListener('reset', () => {
			window.requestAnimationFrame(updateResult);
		});

		updateResult();
	};

	const initChoiceDiagnosis = (diagnosis) => {
		const questionGroups = Array.from(diagnosis.querySelectorAll('[data-diagnosis-question]'));
		const resultContainer = diagnosis.querySelector('[data-diagnosis-result]');
		const resultPrompt = diagnosis.querySelector('[data-diagnosis-prompt]');
		const resultDetails = diagnosis.querySelector('[data-diagnosis-details]');
		const resultTitle = diagnosis.querySelector('#diagnosis-result-title');
		const resultName = diagnosis.querySelector('[data-diagnosis-result-name]');
		const resultDescription = diagnosis.querySelector('[data-diagnosis-description]');
		const resultPurposes = diagnosis.querySelector('[data-diagnosis-purposes]');
		const resultReason = diagnosis.querySelector('[data-diagnosis-reason]');
		const resultSummary = diagnosis.querySelector('[data-diagnosis-summary]');
		const formError = diagnosis.querySelector('[data-diagnosis-form-error]');
		const changedNotice = diagnosis.querySelector('[data-diagnosis-changed]');
		const announcement = diagnosis.querySelector('[data-diagnosis-announcement]');

		if (!questionGroups.length || !resultContainer || !resultPrompt || !resultDetails || !resultTitle || !resultName || !resultDescription || !resultPurposes || !resultReason || !resultSummary || !formError || !changedNotice || !announcement) {
			return;
		}

		const diagnosisResults = {
			socialCampaign: {
				name: 'SNS参加型キャンペーン',
				description: 'SNS上で参加しやすい仕組みを設け、ユーザーの投稿や反応を通じて認知を広げる施策です。',
				purposes: [
					'短期間で認知を広げたい',
					'SNS上の話題やUGCを生み出したい',
					'参加への心理的ハードルを下げたい',
				],
			},
			diagnosisContent: {
				name: '診断コンテンツ',
				description: '質問への回答を通じて、ユーザー自身に関係する結果を返し、商品やテーマを自分ごととして捉えてもらう施策です。',
				purposes: [
					'ユーザーの興味を引き出したい',
					'自分ごと化を促したい',
					'結果のシェアへつなげたい',
				],
			},
			interactiveContent: {
				name: 'インタラクティブコンテンツ',
				description: '操作や変化を伴う体験を通じて、商品やサービスの特徴を感覚的に理解してもらう施策です。',
				purposes: [
					'説明だけでは伝わりにくい価値を体験化したい',
					'ユーザーの記憶に残る接点を作りたい',
					'ブランドらしいWeb体験を作りたい',
				],
			},
			informationLandingPage: {
				name: '情報理解型ランディングページ',
				description: 'ストーリーや情報の順番を設計し、ユーザーの理解と納得を段階的に深める施策です。',
				purposes: [
					'商品やサービスの特徴を丁寧に伝えたい',
					'理解から検討、行動までの導線を作りたい',
					'複数の訴求内容を整理して伝えたい',
				],
			},
			applicationCampaign: {
				name: '応募キャンペーン',
				description: '明確な参加条件とインセンティブを設け、応募や購入などの具体的な行動を促す施策です。',
				purposes: [
					'応募数を増やしたい',
					'購入や来店を参加条件にしたい',
					'行動喚起を明確に設計したい',
				],
			},
		};

		const determineDiagnosis = ({ purpose, experience, social }) => {
			if (purpose === 'participation') {
				if (social === 'high') {
					return {
						key: 'socialCampaign',
						reason: '参加数の獲得に加えてSNS上の拡散も重視しているため、SNS内で参加が完結または開始できるキャンペーンが適しています。',
					};
				}

				return {
					key: 'applicationCampaign',
					reason: '応募や参加を最優先にしているため、参加条件とインセンティブを明確に設計できる応募キャンペーンが適しています。',
				};
			}

			if (experience === 'personal') {
				return {
					key: 'diagnosisContent',
					reason: '回答を通じてユーザー自身に関係する結果を返すことで、テーマや商品を自分ごととして捉えてもらいやすくなります。',
				};
			}

			if (purpose === 'understanding' && experience === 'deep') {
				return {
					key: 'informationLandingPage',
					reason: '情報を段階的に整理し、ストーリーに沿って伝えることで、特徴や価値への理解と納得を深めやすくなります。',
				};
			}

			if (purpose === 'understanding' && experience === 'quick') {
				return {
					key: 'interactiveContent',
					reason: '操作や視覚的な変化を取り入れることで、説明量を増やしすぎずに商品やサービスの特徴を体験として伝えられます。',
				};
			}

			if (purpose === 'awareness' && (social === 'high' || social === 'medium')) {
				return {
					key: 'socialCampaign',
					reason: '参加のしやすさとSNS上での接触機会を組み合わせることで、短期間で認知を広げやすくなります。',
				};
			}

			return {
				key: 'interactiveContent',
				reason: 'Webサイト内で楽しめる体験を設けることで、ユーザーとの接触時間を増やし、印象に残るコミュニケーションを作れます。',
			};
		};

		let hasConfirmedResult = false;

		const setQuestionError = (group, hasError) => {
			const questionError = group.querySelector('[data-diagnosis-question-error]');
			group.classList.toggle('has-error', hasError);

			if (hasError) {
				group.setAttribute('aria-invalid', 'true');
			} else {
				group.removeAttribute('aria-invalid');
			}

			if (questionError) {
				questionError.hidden = !hasError;
			}
		};

		const getCheckedAnswers = () => questionGroups.map((group) => group.querySelector('input[type="radio"]:checked'));

		const clearResult = () => {
			resultName.textContent = '';
			resultDescription.textContent = '';
			resultReason.textContent = '';
			resultSummary.textContent = '';
			resultPurposes.replaceChildren();
			resultDetails.hidden = true;
			resultPrompt.hidden = false;
			changedNotice.hidden = true;
		};

		const showDiagnosisResult = (checkedAnswers) => {
			const answers = Object.fromEntries(questionGroups.map((group, index) => [
				group.dataset.diagnosisQuestion,
				checkedAnswers[index].value,
			]));
			const selectedLabels = checkedAnswers.map((answer) => answer.closest('label')?.textContent.trim() || answer.value);
			const diagnosisDecision = determineDiagnosis(answers);
			const selectedResult = diagnosisResults[diagnosisDecision.key];

			resultName.textContent = selectedResult.name;
			resultDescription.textContent = selectedResult.description;
			resultReason.textContent = diagnosisDecision.reason;
			resultSummary.textContent = selectedLabels.join(' ／ ');

			const purposeItems = selectedResult.purposes.map((purpose) => {
				const item = document.createElement('li');
				item.textContent = purpose;
				return item;
			});
			resultPurposes.replaceChildren(...purposeItems);
			resultPrompt.hidden = true;
			resultDetails.hidden = false;
			changedNotice.hidden = true;
			hasConfirmedResult = true;
			announcement.textContent = `診断結果は「${selectedResult.name}」です。${diagnosisDecision.reason}`;

			const resultBounds = resultContainer.getBoundingClientRect();
			const isOutsideViewport = resultBounds.top < 0 || resultBounds.bottom > document.documentElement.clientHeight;

			if (isOutsideViewport) {
				const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
				resultContainer.scrollIntoView({
					behavior: reduceMotion ? 'auto' : 'smooth',
					block: 'nearest',
				});
			}
		};

		questionGroups.forEach((group) => {
			group.querySelectorAll('input[type="radio"]').forEach((option) => {
				option.addEventListener('change', () => {
					setQuestionError(group, false);

					if (getCheckedAnswers().every(Boolean)) {
						formError.hidden = true;
					}

					if (hasConfirmedResult) {
						changedNotice.hidden = false;
					}
				});
			});
		});
		diagnosis.addEventListener('submit', (event) => {
			event.preventDefault();

			const checkedAnswers = getCheckedAnswers();
			const unansweredGroups = questionGroups.filter((group, index) => !checkedAnswers[index]);

			questionGroups.forEach((group) => {
				setQuestionError(group, unansweredGroups.includes(group));
			});

			if (unansweredGroups.length) {
				formError.hidden = false;
				clearResult();
				hasConfirmedResult = false;
				unansweredGroups[0].querySelector('input[type="radio"]')?.focus();
				return;
			}

			formError.hidden = true;
			showDiagnosisResult(checkedAnswers);
		});
		diagnosis.addEventListener('reset', () => {
			window.requestAnimationFrame(() => {
				questionGroups.forEach((group) => setQuestionError(group, false));
				formError.hidden = true;
				hasConfirmedResult = false;
				clearResult();
				announcement.textContent = '回答と診断結果をリセットしました。';
			});
		});

		clearResult();
	};

	document.querySelectorAll('[data-carousel]').forEach(initCarousel);
	document.querySelectorAll('[data-multi-tag-filter]').forEach(initMultiTagFilter);
	document.querySelectorAll('[data-before-after]').forEach(initBeforeAfter);
	document.querySelectorAll('[data-filter-simulator]').forEach(initFilterSimulator);
	document.querySelectorAll('[data-choice-diagnosis]').forEach(initChoiceDiagnosis);
});

document.addEventListener('DOMContentLoaded', () => {
	const hoverPointerMedia = window.matchMedia('(hover: hover) and (pointer: fine)');
	const reducedMotionMedia = window.matchMedia('(prefers-reduced-motion: reduce)');
	const root = document.documentElement;
	const activeSparkles = new Set();
	const minimumDistance = 14;
	const maximumSparkles = 10;
	const fallbackLifetime = 800;
	let isEnabled = false;
	let candyCursor = null;
	let lastSparkleX = null;
	let lastSparkleY = null;
	let latestPoint = null;
	let animationFrameId = null;

	const removeSparkle = (sparkle) => {
		activeSparkles.delete(sparkle);
		sparkle.remove();
	};

	const removeAllSparkles = () => {
		activeSparkles.forEach((sparkle) => sparkle.remove());
		activeSparkles.clear();
	};

	const createCandyCursor = () => {
		const cursor = document.createElement('span');
		const icon = document.createElement('span');

		cursor.className = 'custom-candy-cursor is-hidden';
		cursor.setAttribute('aria-hidden', 'true');
		icon.className = 'custom-candy-cursor__icon';
		cursor.append(icon);
		document.body.append(cursor);
		return cursor;
	};

	const createSparkle = ({ x, y }) => {
		if (!isEnabled || activeSparkles.size >= maximumSparkles || !document.body) {
			return;
		}

		const sparkle = document.createElement('span');
		const distanceX = x - lastSparkleX;
		const distanceY = y - lastSparkleY;
		const distance = Math.hypot(distanceX, distanceY);
		const trailOffset = 12;
		const sparkleX = distance > 0 ? x - (distanceX / distance) * trailOffset : x;
		const sparkleY = distance > 0 ? y - (distanceY / distance) * trailOffset : y;

		sparkle.className = 'candy-cursor-spark';
		sparkle.setAttribute('aria-hidden', 'true');
		sparkle.style.left = `${sparkleX}px`;
		sparkle.style.top = `${sparkleY}px`;
		activeSparkles.add(sparkle);
		document.body.append(sparkle);

		const fallbackId = window.setTimeout(() => removeSparkle(sparkle), fallbackLifetime);
		sparkle.addEventListener('animationend', () => {
			window.clearTimeout(fallbackId);
			removeSparkle(sparkle);
		}, { once: true });

		lastSparkleX = x;
		lastSparkleY = y;
	};

	const renderLatestPoint = () => {
		animationFrameId = null;

		if (!latestPoint || !candyCursor) {
			return;
		}

		const point = latestPoint;
		const isSuspended = root.classList.contains('is-custom-cursor-suspended');
		latestPoint = null;
		candyCursor.style.setProperty('--candy-cursor-x', `${point.x}px`);
		candyCursor.style.setProperty('--candy-cursor-y', `${point.y}px`);
		candyCursor.classList.toggle('is-hovering-interactive', point.isInteractive);
		candyCursor.classList.toggle('is-hidden', point.isDisabled || isSuspended);
		root.classList.add('has-custom-candy-cursor');

		if (point.isDisabled || isSuspended || point.buttons !== 0) {
			return;
		}

		if (lastSparkleX === null || lastSparkleY === null) {
			lastSparkleX = point.x;
			lastSparkleY = point.y;
			return;
		}

		const distance = Math.hypot(point.x - lastSparkleX, point.y - lastSparkleY);
		if (distance < minimumDistance) {
			return;
		}

		createSparkle(point);
	};

	const isDisabledTarget = (target) => {
		if (!(target instanceof Element)) {
			return true;
		}

		return Boolean(target.closest(
			'input, textarea, select, [contenteditable="true"], iframe, dialog, [data-before-after], .carousel__viewport, .is-custom-cursor-disabled'
		));
	};

	const isInteractiveTarget = (target) => {
		if (!(target instanceof Element)) {
			return false;
		}

		return Boolean(target.closest(
			'a[href], button:not([disabled]), summary, [role="button"], [role="link"]'
		));
	};

	const handlePointerMove = (event) => {
		if (!isEnabled || event.pointerType !== 'mouse') {
			return;
		}

		latestPoint = {
			x: event.clientX,
			y: event.clientY,
			buttons: event.buttons,
			isDisabled: isDisabledTarget(event.target),
			isInteractive: isInteractiveTarget(event.target),
		};

		if (animationFrameId === null) {
			animationFrameId = window.requestAnimationFrame(renderLatestPoint);
		}
	};

	const handlePointerDown = (event) => {
		if (!isEnabled || event.pointerType !== 'mouse' || !candyCursor) {
			return;
		}

		if (isDisabledTarget(event.target)) {
			root.classList.add('is-custom-cursor-suspended');
			candyCursor.classList.add('is-hidden');
			removeAllSparkles();
			return;
		}

		candyCursor.classList.add('is-pointer-down');
	};

	const restorePointerState = (event) => {
		root.classList.remove('is-custom-cursor-suspended');
		candyCursor?.classList.remove('is-pointer-down');

		if (event?.pointerType === 'mouse' && candyCursor) {
			const isDisabled = isDisabledTarget(event.target);
			candyCursor.classList.toggle('is-hidden', isDisabled);
			candyCursor.classList.toggle('is-hovering-interactive', !isDisabled && isInteractiveTarget(event.target));
		}
	};

	const hideCandyCursor = () => {
		root.classList.remove('has-custom-candy-cursor', 'is-custom-cursor-suspended');
		candyCursor?.classList.add('is-hidden');
		candyCursor?.classList.remove('is-pointer-down');
	};

	const handlePointerOut = (event) => {
		if (!event.relatedTarget) {
			hideCandyCursor();
		}
	};

	const handleVisibilityChange = () => {
		if (document.hidden) {
			hideCandyCursor();
		}
	};

	const addCursorListeners = () => {
		document.addEventListener('pointermove', handlePointerMove, { passive: true });
		document.addEventListener('pointerdown', handlePointerDown, { passive: true });
		document.addEventListener('pointerup', restorePointerState, { passive: true });
		document.addEventListener('pointercancel', restorePointerState, { passive: true });
		document.addEventListener('pointerout', handlePointerOut, { passive: true });
		document.addEventListener('visibilitychange', handleVisibilityChange);
		window.addEventListener('blur', hideCandyCursor);
	};

	const removeCursorListeners = () => {
		document.removeEventListener('pointermove', handlePointerMove);
		document.removeEventListener('pointerdown', handlePointerDown);
		document.removeEventListener('pointerup', restorePointerState);
		document.removeEventListener('pointercancel', restorePointerState);
		document.removeEventListener('pointerout', handlePointerOut);
		document.removeEventListener('visibilitychange', handleVisibilityChange);
		window.removeEventListener('blur', hideCandyCursor);
	};

	const updateCustomCandyCursor = () => {
		const shouldEnable = hoverPointerMedia.matches && !reducedMotionMedia.matches;

		if (shouldEnable === isEnabled) {
			return;
		}

		isEnabled = shouldEnable;
		lastSparkleX = null;
		lastSparkleY = null;
		latestPoint = null;

		if (animationFrameId !== null) {
			window.cancelAnimationFrame(animationFrameId);
			animationFrameId = null;
		}

		if (isEnabled) {
			candyCursor = createCandyCursor();
			addCursorListeners();
		} else {
			removeCursorListeners();
			root.classList.remove('has-custom-candy-cursor', 'is-custom-cursor-suspended');
			candyCursor?.remove();
			candyCursor = null;
			removeAllSparkles();
		}
	};

	const watchMediaChange = (mediaQuery) => {
		if (typeof mediaQuery.addEventListener === 'function') {
			mediaQuery.addEventListener('change', updateCustomCandyCursor);
		} else {
			mediaQuery.addListener(updateCustomCandyCursor);
		}
	};

	watchMediaChange(hoverPointerMedia);
	watchMediaChange(reducedMotionMedia);
	updateCustomCandyCursor();
});
