/*
Luka Mayer
4/16/2024
IT202 Internet Applications | Section 006
Phase 5 Assignment: Read SQL Data with PHP and Javascript
ldm29@njit.edu 

Version 1.0
*/

const img = document.getElementById("rollover_image");

img.addEventListener('mouseover', function() {
    img.classList.add('changeImg');
    console.log(img.classList);
});

img.addEventListener('mouseout', function() {
    img.classList.remove('changeImg');
    console.log(img.classList);
});