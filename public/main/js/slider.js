const slide = document.getElementById('carouselSlide');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');

let currentIndex = 0; // Tracks the current slide index
const totalSlides = document.querySelectorAll('.carousel-item').length;
if(slide)
{
    // Function to move the slide
    function moveSlide(index) {
    slide.style.transform = `translateX(-${index * 100}%)`;
    }

    // Next Button
    nextBtn.addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % totalSlides; // Loop back to start
    moveSlide(currentIndex);
    });

    // Prev Button
    prevBtn.addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides; // Loop back to end
    moveSlide(currentIndex);
    });
}