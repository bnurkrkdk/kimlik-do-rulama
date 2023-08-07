const container = document.querySelector('.parallax-container');
let mouseX = 0;
let mouseY = 0;

container.addEventListener('mousemove', (e) => {
    mouseX = e.clientX;
    mouseY = e.clientY;
    updateParallax();
});

function updateParallax() {
    const parallaxBg = document.querySelector('.parallax-bg');
    const offsetX = (mouseX / container.clientWidth - 0.5) * 30;
    const offsetY = (mouseY / container.clientHeight - 0.5) * 30;
    parallaxBg.style.transform = `translateX(${offsetX}px) translateY(${offsetY}px)`;
}
