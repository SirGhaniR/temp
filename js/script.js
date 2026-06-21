// Efek animasi Counter sederhana untuk bagian Statistik saat halaman selesai dimuat
function animateCounter(id, targetValue, duration) {
    const element = document.getElementById(id);
    let startValue = 0;
    const stepTime = Math.abs(Math.floor(duration / targetValue));

    const timer = setInterval(() => {
        startValue += 1;
        element.textContent = startValue + (id === 'stat-1' ? '%' : '+');
        if (startValue >= targetValue) {
            clearInterval(timer);
        }
    }, stepTime);
}

// Jalankan counter setelah halaman termuat sempurna
window.addEventListener('DOMContentLoaded', () => {
    animateCounter('stat-1', 92, 1500); // 92%
    animateCounter('stat-2', 50, 1500); // 50+
    animateCounter('stat-3', 100, 1500); // 100+
});

// Data kata yang akan diketik bergantian
const words = ["Masa Depan Digital!", "Web Development!", "Mobile Apps!", "Game Modern!"];
let wordIndex = 0;
let charIndex = 0;
let isDeleting = false;
const typingSpeed = 100; // Kecepatan mengetik (ms)
const erasingSpeed = 50;  // Kecepatan menghapus (ms)
const delayBetweenWords = 2000; // Jeda sebelum menghapus kata (ms)

function typeEffect() {
    const targetElement = document.getElementById("typing-text");
    if (!targetElement) return;

    const currentWord = words[wordIndex];

    if (isDeleting) {
        // Efek Menghapus
        targetElement.textContent = currentWord.substring(0, charIndex - 1);
        charIndex--;
    } else {
        // Efek Mengetik
        targetElement.textContent = currentWord.substring(0, charIndex + 1);
        charIndex++;
    }

    // Atur logika transisi mengetik/menghapus
    let currentSpeed = typingSpeed;

    if (!isDeleting && charIndex === currentWord.length) {
        // Selesai mengetik satu kata, beri jeda sebelum dihapus
        currentSpeed = delayBetweenWords;
        isDeleting = true;
        targetElement.classList.remove("border-r-4"); // Hilangkan kursor kaku saat diam
        targetElement.classList.add("border-r-2");
    } else if (isDeleting && charIndex === 0) {
        // Selesai menghapus, pindah ke kata berikutnya
        isDeleting = false;
        wordIndex = (wordIndex + 1) % words.length;
        currentSpeed = 500; // Jeda sebelum mulai mengetik kata baru
        targetElement.classList.add("border-r-4");
    }

    setTimeout(typeEffect, currentSpeed);
}

// Jalankan animasi ketik bersamaan dengan counter statistik saat DOM siap
window.addEventListener('DOMContentLoaded', () => {
    animateCounter('stat-1', 92, 1500);
    animateCounter('stat-2', 50, 1500);
    animateCounter('stat-3', 100, 1500);

    // Panggil efek ketik
    setTimeout(typeEffect, 800);
});