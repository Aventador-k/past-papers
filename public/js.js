const menu = document.querySelector('#menu');
const navbar = document.querySelector('.navbar');

menu.addEventListener('click', () => {
    menu.classList.toggle('fa-xmark');
    navbar.classList.toggle('active');
});


// modal dialog

const modal = document.querySelector('#modal');
const open = document.querySelectorAll('.open-pp1');
const close = document.querySelector('.close');

open.forEach(btn => {
    btn.addEventListener('click', (e) => {
        console.log(e.target.dataset)
        modal.showModal();
    });
});
// open.addEventListener('click', () => {
//     modal.showModal();
// });
close.addEventListener('click', () => {
    modal.close();
});
