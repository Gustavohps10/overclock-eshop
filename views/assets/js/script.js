let menu = document.querySelector('#menu-bars');
let navbar = document.querySelector('.navbar');

menu.onclick = () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}

window.onscroll = () =>{
    menu.classList.remove('fa-times');
}

document.querySelector('#search-icon').onclick = () =>{
    document.querySelector('#search-form').classList.toggle('active');
};

document.querySelector('#search-form label').onclick = () =>{
    document.querySelector('#search-form').submit();
};

document.querySelector('#close').onclick = () =>{
    document.querySelector('#search-form').classList.remove('active');
};