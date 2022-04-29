$(document).ready(function () {
    $('.post-wrapper').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
//        autoplay: true,
        autoplaySpeed: 2000,
        nextArrow: $('.next'),
        prevArrow: $('.prev'),
    });
});
$(document).ready(function () {
    $('.post-wrapper1').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
//        autoplay: true,
        autoplaySpeed: 2000,
        nextArrow: $('.next1'),
        prevArrow: $('.prev1'),
    });
});
// let btnView = document.querySelector('.btn-viewall');
// btnView .addEventListener('click', ()=>{
//     btnView.innerText = "View Less";
//     btnView.style.color = '#00cc66';
// });

