$(() => {
    let menuHeaders = $('.menu-header');
    for (let a = 0; a < menuHeaders.length; a++) {
        menuHeaders[a].addEventListener('click', openMenuLat, false);
    }
    let dataButtons = $('.data-button');
    for (let a = 0; a < dataButtons.length; a++) {
        dataButtons[a].addEventListener('click', activateButton, false);
    }
});

const openMenuLat = ev => {
    const menuId = ev.target.dataset.menu;
    const menus = document.getElementsByClassName('menu-content');
    const menuContent = document.getElementById('menu-content-' + menuId);
    for(let i = 0; i < menus.length; i++) {
        menus[i].classList.remove('opened');
    }
    menuContent.classList.toggle('opened');
}

const activateButton = ev => {
    const button = ev.target;
    const buttonData = ev.target.dataset;
    let add = true; 
    if(button.classList.contains('bg-gray-500')) add = false;
    button.classList.toggle('bg-gray-100');
    button.classList.toggle('bg-gray-500');
    button.classList.toggle('text-white');
    loadData(buttonData.targetLayer, add);
}