// Main js for Caramel

console.log("------ Welcome to Caramel https://caramel.flellex.de ------");

// Colcade Masonry
if(document.querySelector('.caramel-portfolio')) {
    var colcade = new Colcade('.caramel-portfolio', {
        columns: '.caramel-portfolio__column',
        items: '.caramel-portfolio-item'
    });
}

// BasicLightbox
const lightboxItems = document.querySelectorAll('article[data-lightbox]');
if(lightboxItems.length > 0) {
    lightboxItems.forEach(item => {
        item.addEventListener('click', () => {
            const instance = basicLightbox.create('<img src="' + item.getAttribute('data-lightbox') + '">');
            instance.show();
        })
    })
}
