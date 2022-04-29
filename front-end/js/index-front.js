//Sliding Products Start
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
//Sliding Products End

// let btnView = document.querySelector('.btn-viewall');
// btnView .addEventListener('click', ()=>{
//     btnView.innerText = "View Less";
//     btnView.style.color = '#00cc66';
// });

//Change Content in main page
const tabBtn = document.querySelectorAll(".tab");
const tab = document.querySelectorAll(".tabShow");
function tabs(panelIndex) {
    tab.forEach(function (node) {
        node.style.display = "none";
    });
    tab[panelIndex].style.display = "block";
}
tabs(0);
//Active class for the category selector
// $(".category-menu ul li").click(function () {
//        $(".active").removeClass("active");
//        $(this).addClass("active");
//    });

//Quantity + & - (Main-Products Page)
let $qty_up = $(".qty .qty-up");
let $qty_down = $(".qty .qty-down");
let $input = $(".qty-input");
$qty_up.click(function (e) {
    if ($input.val() >= 1 && $input.val() <= 9) {
        $input.val(function (i, oldval) {
            return ++oldval;
        });
    }
});