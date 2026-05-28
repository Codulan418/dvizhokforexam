let current = 0;
document.querySelector(".prev").onclick = () => slide(-1);
document.querySelector(".next").onclick = () => slide(1);

const slides = document.querySelectorAll(".slide");

//расчёт индекса
function slide(dir) {
  const slides = document.querySelectorAll(".slide");
  current = (current + dir + slides.length) % slides.length;
  updateSlider(current);
}

 //сдвиг
function updateSlider(current) {
  const track = document.querySelector(".slider-track");
  track.style.transform = `translateX(-${current * 100}%)`;
}

