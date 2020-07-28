// Main js for Caramel

console.log("------ Welcome to Caramel https://caramel.flellex.de ------");


if(document.querySelector('.caramel-portfolio')) {
    var colcade = new Colcade('.caramel-portfolio', {
        columns: '.caramel-portfolio__column',
        items: '.caramel-portfolio-item'
    });
}