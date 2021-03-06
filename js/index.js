//toggle button
const toggleBtn = document.querySelector('.toggle-btn');
const linkContainer = document.querySelector('.links-container');

toggleBtn.addEventListener('click', () => {
    toggleBtn.classList.toggle('active');
    linkContainer.classList.toggle('show');
})

// slider

const slideshowImages = document.querySelectorAll("#hero .slider");

const nextImageDelay = 5000;
let currentImageCounter = 0;

slideshowImages[currentImageCounter].style.opacity = 1;

setInterval(nextImage, nextImageDelay);

function nextImage(){
    slideshowImages[currentImageCounter].style.opacity = 0;
    currentImageCounter = (currentImageCounter + 1) % slideshowImages.length;
    slideshowImages[currentImageCounter].style.opacity = 1;
}
