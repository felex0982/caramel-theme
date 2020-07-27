// Main js for Caramel

console.log("------ Welcome to Caramel https://caramel.flellex.de ------");

class CaramelSlider {
    // For now only one Slider per Page
    slider;
    slides;
    slideIndex = 1;

    constructor() {
        this.slider = document.querySelector('#caramel-slider');
        this.slides = this.slider.querySelectorAll('.caramel-slide');
        this.slider.querySelector('#caramel-slider-next').addEventListener('click', nextSlide());

        this.slides.forEach(slide => console.log(slide));
    }

}

new CaramelSlider();
// End - Main Image Slider