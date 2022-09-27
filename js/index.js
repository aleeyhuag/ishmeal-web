//toggle button
const toggleBtn = document.querySelector('.toggle-btn');
const linkContainer = document.querySelector('.links-container');

toggleBtn.addEventListener('click', () => {
    toggleBtn.classList.toggle('active');
    linkContainer.classList.toggle('show');
})

//programs toggle
const moreBtn = document.querySelectorAll('.more-btn');
moreBtn.forEach(moreBtns => {
    moreBtns.addEventListener('click', () => {
        moreBtns.classList.toggle('active');
    })
})

let details = document.querySelectorAll(".item-details");
function readMore(btn){
    let post = btn.parentElement;
    post.querySelector(".item-details").classList.toggle("hide");
}
//links
const link = document.querySelectorAll('.links');

link.forEach(links => {
    links.addEventListener('click', () => {
        link.forEach(ele => ele.classList.remove('active'));
        links.classList.add('active');
    })
})

