/**
 * GemGeneve - GSAP Animations
 */

document.addEventListener('DOMContentLoaded', function() {

	// Register ScrollTrigger plugin
	gsap.registerPlugin(ScrollTrigger);

	// Intro text - borders expand from center
	const introText = document.querySelector('.home .entry-content p.intro');

	if (introText) {
		// Create pseudo-elements for animated borders using wrapper divs
		const wrapper = document.createElement('div');
		wrapper.className = 'intro-animation-wrapper';
		introText.parentNode.insertBefore(wrapper, introText);
		wrapper.appendChild(introText);

		// Create left and right border elements
		const leftBorder = document.createElement('div');
		leftBorder.className = 'intro-border intro-border-left';
		wrapper.appendChild(leftBorder);

		const rightBorder = document.createElement('div');
		rightBorder.className = 'intro-border intro-border-right';
		wrapper.appendChild(rightBorder);

		// Set initial state - borders start from center (height 0)
		gsap.set([leftBorder, rightBorder], {
			scaleY: 0,
			transformOrigin: 'center center'
		});

		// Animate borders expanding from center when scrolled into view
		gsap.to([leftBorder, rightBorder], {
			scaleY: 1,
			duration: 0.8,
			ease: 'power2.out',
			scrollTrigger: {
				trigger: wrapper,
				start: 'top 80%',
				toggleActions: 'play none none none'
			}
		});

		// Fade in the text slightly after borders start
		gsap.from(introText, {
			opacity: 0,
			duration: 0.6,
			delay: 0.3,
			ease: 'power2.out',
			scrollTrigger: {
				trigger: wrapper,
				start: 'top 80%',
				toggleActions: 'play none none none'
			}
		});
	}

});
