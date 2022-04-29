//Declearing the Elements.
const imgAut = document.querySelector('.author');
const img = document.querySelector('#photo');
const file = document.querySelector('#profile_img');
const uploadBtn = document.querySelector('#uploadBtn');

//What happens when the User hovers the Image.
imgAut.addEventListener('mouseenter', function () {
    uploadBtn.style.display = 'block';
});
//What happens when the User hovers out of the Image.
imgAut.addEventListener('mouseleave', function () {
    uploadBtn.style.display = 'none';
});