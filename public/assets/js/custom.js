document.addEventListener('DOMContentLoaded', () => {
    const container = document.querySelector(' body');

    container.addEventListener('mousemove', (e) => {
      const xAxis = (window.innerWidth / 20 - e.pageX) / 150;
      const yAxis = (window.innerHeight / 20 - e.pageY) / 150;

      container.style.transform = `translateX(${xAxis}px) translateY(${yAxis}px) perspective(1000px)`;
    });

    container.addEventListener('mouseleave', () => {
      container.style.transform = 'translateX(0) translateY(0) perspective(1000px)';
    });
  });

