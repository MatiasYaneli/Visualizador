$(() => {
    let menuHeaders = $('.menu-header');
    for (let a = 0; a < menuHeaders.length; a++) {
        menuHeaders[a].addEventListener('click', openMenuLat, false);
    }
});

const openMenuLat = ev => {
    // console.log(ev.target);
    let menuId = ev.target.dataset.menu;
    console.log(menuId);
    const menuContent = document.getElementById('menu-content-' + menuId);
    console.log(menuContent);
    menuContent.classList.toggle('active');
}