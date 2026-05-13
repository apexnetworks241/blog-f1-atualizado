const slides = document.querySelectorAll('.slide');
const dotsEl = document.getElementById('dots');
const counter = document.getElementById('counter');
let current = 0;

slides.forEach((_, i) => {
    const d = document.createElement('div');
    d.className = 'dot' + (i === 0 ? ' active' : '');
    d.onclick = () => goTo(i);
    dotsEl.appendChild(d);
});

counter.textContent = '1 / ' + slides.length;

function goTo(n) {
    slides[current].classList.remove('active');
    dotsEl.children[current].classList.remove('active');
    current = (n + slides.length) % slides.length;
    slides[current].classList.add('active');
    dotsEl.children[current].classList.add('active');
    counter.textContent = (current + 1) + ' / ' + slides.length;
}

document.getElementById('prev').onclick = () => goTo(current - 1);
document.getElementById('next').onclick = () => goTo(current + 1);