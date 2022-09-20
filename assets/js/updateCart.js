/* eslint-disable no-shadow */
/* eslint-disable prefer-const */
const enableCheckoutButton = () => {
  const checkboxes = document.querySelectorAll('.checkout-blocker input');
  let unblock = true;
  // eslint-disable-next-line no-plusplus
  for (let i = 0; i < checkboxes.length; i++) {
    if (!checkboxes[i].checked) {
      unblock = false;
    }
  }
  if (unblock) {
    document.querySelector('.checkout-button').classList.remove('disabled-checkout-button');
  } else {
    document.querySelector('.checkout-button').classList.add('disabled-checkout-button');
  }
};

const initArrowButtons = ({ inputs, updateCart }) => {
  inputs.forEach((input) => {
    const quantity = input.querySelector('input[type=number]');
    const minus = input.querySelector('.ag-cart__quantity-btn--minus');
    const plus = input.querySelector('.ag-cart__quantity-btn--plus');

    minus.addEventListener('click', () => {
      quantity.value = parseInt(quantity.value, 10) - 1;
      updateCart.removeAttribute('disabled');
    });

    plus.addEventListener('click', () => {
      quantity.value = parseInt(quantity.value, 10) + 1;
      updateCart.removeAttribute('disabled');
    });
  });
};

document.addEventListener('DOMContentLoaded', () => {
  const agCart = document.querySelector('.ag-cart');

  if (agCart) {
    document.querySelector('.checkout-button').classList.add('disabled-checkout-button');
    enableCheckoutButton();
    const checkboxes = document.querySelectorAll('.checkout-blocker input');
    // eslint-disable-next-line no-plusplus
    for (let i = 0; i < checkboxes.length; i++) {
      checkboxes[i].addEventListener('change', enableCheckoutButton);
    }
    let cartForm = document.querySelector('.woocommerce-cart-form');
    let inputs = cartForm.querySelectorAll('.ag-cart__quantity');
    let updateCart = cartForm.querySelector('button[name="update_cart"]');

    const observer = new MutationObserver(() => {
      if (!cartForm.classList.contains('processing')) {
        let cartForm = document.querySelector('.woocommerce-cart-form');
        let inputs = cartForm.querySelectorAll('.ag-cart__quantity');
        let updateCart = cartForm.querySelector('button[name="update_cart"]');
        initArrowButtons({ inputs, updateCart });
      }
    });

    observer.observe(agCart, {
      childList: true,
      subtree: true,
    });

    initArrowButtons({ inputs, updateCart });
  }
});

window.toggleNext = (el) => {
  const toggle = el.nextElementSibling;
  if (toggle.style.display === 'none') {
    toggle.style.display = 'block';
  } else {
    toggle.style.display = 'none';
  }
};
