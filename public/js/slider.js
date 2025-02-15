let currentIndex = 0;

function showSlide(index) {
    const slides = document.querySelector('.slides');
    const totalSlides = document.querySelectorAll('.slide').length;
    index = (index + totalSlides) % totalSlides; // Para asegurar que el índice esté siempre en el rango válido
    slides.style.transform = `translateX(-${index * 100}%)`;
    currentIndex = index;
}

function nextSlide() {
    showSlide(currentIndex + 1);
}

function prevSlide() {
    showSlide(currentIndex - 1);
}

// Cambiar la imagen cada 3 segundos
setInterval(nextSlide, 3000);
