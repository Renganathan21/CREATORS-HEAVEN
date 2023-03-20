const navItems = document.querySelector('.nav_items');
const openNavBtn = document.querySelector('#open_nav-btn');
const closeNavBtn = document.querySelector('#close_nav-btn');

const openNav = () =>{
    navItems.style.display = 'flex';
    openNavBtn.style.display ='none';
    closeNavBtn.style.display='inline-block';
}

const closeNav = () =>{
    navItems.style.display = 'none';
    openNavBtn.style.display ='inline-block';
    closeNavBtn.style.display='none';
}

openNavBtn.addEventListener('click',openNav);
closeNavBtn.addEventListener('click',closeNav);




const sidebar = document.querySelector('aside');
const showSidebarBtn = document.querySelector('#show__sidebar-btn');
const hidesidebarBtn = document.querySelector('#hide-sidebar-btn');


const showSideBar = ()=>{
    sidebar.style.left='0';
    showSidebarBtn.style.display='none';
    hidesidebarBtn.style.display='inline-block'
}
const hideSideBar = ()=>{
    sidebar.style.left='-100%';
    showSidebarBtn.style.display='inline-block';
    hidesidebarBtn.style.display='none'
}

showSidebarBtn.addEventListener('click',showSideBar);

hidesidebarBtn.addEventListener('click',hideSideBar);