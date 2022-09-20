/* eslint-disable max-len */
window.addEventListener('DOMContentLoaded', () => {
  const getTopMenu = document.querySelector('.mobile-menu__top');
  const getBottomMenu = document.querySelector('.mobile-menu__bottom');
  const getEditAccountForm = document.querySelector('.content__wrapper');

  if (getTopMenu && getBottomMenu) {
    const getTopMenuItems = getTopMenu?.querySelectorAll('.woocommerce-MyAccount-navigation-link');
    const getBottomMenuItems = getBottomMenu?.querySelectorAll('.woocommerce-MyAccount-navigation-link');
    const getActiveTopMenuItem = getTopMenu.querySelector('.is-active');
    const getActiveTopMenuItemIndex = Array.from(getTopMenuItems).findIndex((item) => item === getActiveTopMenuItem);
    const getTopMenuItemsAfterActive = Array.from(getTopMenuItems).slice(getActiveTopMenuItemIndex + 1);
    getTopMenuItemsAfterActive.forEach((item) => {
      item.remove();
    });

    const getBottomMenuItemsBeforeActive = Array.from(getBottomMenuItems).slice(0, getActiveTopMenuItemIndex + 1);
    getBottomMenuItemsBeforeActive.forEach((item) => {
      item.remove();
    });
    getEditAccountForm.classList.add('open');
    getActiveTopMenuItem.classList.add('open');

    getActiveTopMenuItem.addEventListener('click', (e) => {
      e.preventDefault();
      if (getEditAccountForm.classList.contains('open')) {
        getEditAccountForm.classList.remove('open');
        getEditAccountForm.classList.add('close');
        getActiveTopMenuItem.classList.remove('open');
        getActiveTopMenuItem.classList.add('close');
      } else {
        getEditAccountForm.classList.add('open');
        getEditAccountForm.classList.remove('close');
        getActiveTopMenuItem.classList.add('open');
        getActiveTopMenuItem.classList.remove('close');
      }
    });
  }
});
