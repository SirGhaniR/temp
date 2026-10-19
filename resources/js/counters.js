/**
 * Animate elements marked with [data-count-to] when they enter the viewport.
 * Falls back to setting the target value directly when IntersectionObserver
 * is unavailable, or when the user prefers reduced motion.
 */
document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll("[data-count-to]");
    if (!counters.length) return;

    const prefersReduced = window.matchMedia(
        "(prefers-reduced-motion: reduce)",
    ).matches;

    if (prefersReduced || !("IntersectionObserver" in window)) {
        counters.forEach((el) => {
            el.textContent = el.dataset.countTo;
        });
        return;
    }

    const animate = (el) => {
        const target = parseInt(el.dataset.countTo, 10) || 0;
        const duration = 1600;
        const start = performance.now();

        const tick = (now) => {
            const progress = Math.min((now - start) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3); // easeOutCubic
            el.textContent = Math.round(target * eased).toString();
            if (progress < 1) {
                requestAnimationFrame(tick);
            }
        };
        requestAnimationFrame(tick);
    };

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    animate(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.5 },
    );

    counters.forEach((el) => observer.observe(el));
});
