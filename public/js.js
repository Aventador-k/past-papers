const menu = document.querySelector('#menu');
const navbar = document.querySelector('.navbar');

menu.addEventListener('click', () => {
    menu.classList.toggle('fa-xmark');
    navbar.classList.toggle('active');
});


// modal dialog

const modal = document.querySelector('#modal');
const open = document.querySelector('.open-pp1');
const close = document.querySelector('.close');

open.addEventListener('click', () => {
    modal.showModal();
});
close.addEventListener('click', () => {
    modal.close();
});