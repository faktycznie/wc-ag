import { isTouchDevice } from './utils';

const desktopTouch = () => {
  if (isTouchDevice) {
    const menuContainer = document.querySelector('.nav-menu');
    const menuItems = menuContainer?.querySelectorAll(
      '.nav-menu .menu-item-has-children > a',
    );
    if (menuItems) {
      menuItems.forEach((item) => {
        item.addEventListener('click', (e) => {
          if (!item.classList.contains('clicked')) {
            e.preventDefault();
            item.classList.add('clicked');
          } else {
            item.classList.remove('clicked');
          }
        });
      });

      document.addEventListener('click', (e) => {
        if (menuContainer !== e.target && !menuContainer.contains(e.target)) {
          const clickedItems = document.querySelectorAll(
            '.nav-menu .menu-item-has-children > a.clicked',
          );
          clickedItems.forEach((el) => el.classList.remove('clicked'));
        }
      });
    }
  }
};

const mobileMenu = () => {
  const menuContainer = document.querySelector('.offcanvas .nav-menu');
  const menuItems = menuContainer?.querySelectorAll('.menu-item-has-children');
  if (menuItems) {
    menuItems.forEach((item) => {
      const subMenu = item.querySelector('.sub-menu');
      const menuToggle = item.querySelector('.toggle');
      menuToggle.classList.add('closed');
      if (subMenu && menuToggle) {
        menuToggle.addEventListener('click', (e) => {
          e.preventDefault();
          if (menuToggle.classList.contains('closed')) {
            menuToggle.classList.remove('closed');
            menuToggle.classList.add('opened');
            subMenu.classList.add('opened');
          } else {
            menuToggle.classList.remove('opened');
            menuToggle.classList.add('closed');
            subMenu.classList.remove('opened');
          }
        });
      }
    });
  }
};

window.addEventListener('DOMContentLoaded', () => {
  desktopTouch();
  mobileMenu();
});
