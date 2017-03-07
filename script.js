function main() {
    // for (let count = 0; count < document.getElementsByClassName("dot").length; count++) {
    //     document.getElementsByClassName("dot")[count].addEventListener("click", function() {
    //         currentSlide(count + 1);
    //     }, false);
    // }
    document.getElementById("dots").addEventListener("click", function(evt) {
        debugger;
        currentSlide();
    });
    showSlides(slideIndex);
}
var slideIndex = 1;

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}

document.addEventListener("DOMContentLoaded", main);
