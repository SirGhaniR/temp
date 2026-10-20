import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

/**
 * Draws the curved SVG timeline in sync with scroll, then reveals cards
 * and step numbers as they enter the viewport.
 *
 * Under prefers-reduced-motion, skips all animation and just reveals content.
 */
document.addEventListener("DOMContentLoaded", () => {
    const section = document.querySelector("[data-timeline]");
    if (!section) return;

    const path = section.querySelector("[data-timeline-path]");
    const cards = section.querySelectorAll("[data-timeline-card]");
    const numbers = section.querySelectorAll("[data-timeline-number]");

    const prefersReduced = window.matchMedia(
        "(prefers-reduced-motion: reduce)",
    ).matches;

    if (prefersReduced) {
        cards.forEach((el) => el.classList.remove("opacity-0"));
        numbers.forEach((el) => el.classList.remove("opacity-0"));
        if (path) path.style.strokeDashoffset = "0";
        return;
    }

    if (path) {
        const length = path.getTotalLength();
        path.style.strokeDasharray = `${length}`;
        path.style.strokeDashoffset = `${length}`;

        gsap.to(path, {
            strokeDashoffset: 0,
            ease: "none",
            scrollTrigger: {
                trigger: section,
                start: "top 65%",
                end: "bottom 90%",
                scrub: 0.6,
            },
        });
    }

    cards.forEach((card) => {
        gsap.fromTo(
            card,
            { opacity: 0, y: 40 },
            {
                opacity: 1,
                y: 0,
                duration: 0.9,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: card,
                    start: "top 85%",
                },
            },
        );
    });

    numbers.forEach((num) => {
        gsap.fromTo(
            num,
            { opacity: 0 },
            {
                opacity: 1,
                duration: 1,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: num,
                    start: "top 85%",
                },
            },
        );
    });

    ScrollTrigger.refresh();
});
