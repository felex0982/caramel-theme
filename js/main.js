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

// LogoMagic
const landingLogo = document.querySelector('.caramel-landing-logo');
const navbarLogo = document.querySelector('.caramel-logo');
let lastScrollPos = 0;
let ticking = false;

function setLogoStatus(scrollPos) {
    if(scrollPos > 144) {
        landingLogo.classList.add("caramel-landing-logo--hidden");
        if(navbarLogo) {
            navbarLogo.classList.remove('caramel-logo--hidden');
        }
    }
    else {
        landingLogo.classList.remove("caramel-landing-logo--hidden");
        if(navbarLogo) {
            navbarLogo.classList.add('caramel-logo--hidden');
        }
    }
}

if(landingLogo) {
    window.addEventListener('scroll', function(e) {
        lastScrollPos = window.scrollY;
    
        if (!ticking) {
            window.requestAnimationFrame(function() {
            setLogoStatus(lastScrollPos);
            ticking = false;
            });
        
            ticking = true;
        }
    });

    const landingLogoSpacer = document.querySelector('.caramel-landing-logo-spacer');
    landingLogoSpacer.style.height = landingLogo.clientHeight + "px"; 
}
