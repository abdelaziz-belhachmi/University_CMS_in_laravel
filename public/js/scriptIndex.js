
let slideIndex = 0;

function showSlides() {
    let slides = document.getElementsByClassName("slide");

    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    slideIndex++;

    if (slideIndex > slides.length) {
        slideIndex = 1;
    }

    slides[slideIndex - 1].style.display = "block";
}

function changeSlide(n) {
    slideIndex += n;
    showSlides();
}

// Run the slideshow automatically every 5 seconds
setInterval(showSlides, 5000);

// Run the slideshow when the page loads
showSlides();

function show(element){
    var headingElement = element.children[0];
    var contentElement = element.children[2];

    document.getElementById('details-heading').innerText = headingElement.innerText;
    document.getElementById('details-content').innerText = contentElement.innerText;
    
}