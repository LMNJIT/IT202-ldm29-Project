const img = document.getElementById("rollover_image");

img.addEventListener('mouseover', function() {
    img.classList.add('changeImg');
    console.log(img.classList);
});

img.addEventListener('mouseout', function() {
    img.classList.remove('changeImg');
    console.log(img.classList);

});