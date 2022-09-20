/* eslint-disable max-len */
const debounce = (func, wait, immediate) => {
  let timeout;
  // eslint-disable-next-line func-names
  return function () {
    const context = this;
    // eslint-disable-next-line prefer-rest-params
    const args = arguments;
    // eslint-disable-next-line func-names
    const later = function () {
      timeout = null;
      if (!immediate) func.apply(context, args);
    };
    const callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) func.apply(context, args);
  };
};

const validateFormat = (input) => {
  const inputType = input.getAttribute('type');
  const phoneRegex = /^(\+?)(\d{2,3})?[-. ]?(\d{3})[-. ]?(\d{2,3})[-. ]?(\d{2,3})$/;
  // eslint-disable-next-line operator-linebreak
  const emailRegex =
    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  const nipRegex = /^\d{10}$/;
  const peselRegex = /^\d{11}$/;
  const zipCodeRegex = /^\d{2}-\d{3}$/;

  if (inputType === 'tel') {
    const inputValue = input.value;
    const isPhoneValid = phoneRegex.test(inputValue);
    return isPhoneValid;
  }
  if (inputType === 'email') {
    const inputValue = input.value;
    const isEmailValid = emailRegex.test(inputValue);
    return isEmailValid;
  }
  if (inputType === 'text' && input.name === 'billing_nip') {
    const inputValue = input.value;
    const isNipValid = nipRegex.test(inputValue);
    return isNipValid;
  }
  if (inputType === 'text' && input.name === 'billing_pesel') {
    const inputValue = input.value;
    const isPeselValid = peselRegex.test(inputValue);
    return isPeselValid;
  }
  if (inputType === 'text' && input.name === 'billing_postcode') {
    const inputValue = input.value;
    const isZipCodeValid = zipCodeRegex.test(inputValue);

    return isZipCodeValid;
  }

  return true;
};

const checkRequiredFields = ({ getAllRequiredFields, currentStepNextButton }) => {
  const requiredFields = Array.from(getAllRequiredFields);
  const filteredRequiredFields = requiredFields.filter((field) => !field.disabled);
  const requiredFieldsValues = filteredRequiredFields.map((field) => field.value);

  const requiredFieldsValuesLength = requiredFieldsValues.filter((value) => value.length > 0).length;
  if (requiredFieldsValuesLength === filteredRequiredFields.length) {
    currentStepNextButton?.removeAttribute('disabled');
  } else {
    currentStepNextButton?.setAttribute('disabled', 'disabled');
  }
};

const checkFormatFields = ({ getAllFormatFields, currentStepNextButton }) => {
  const formatFields = Array.from(getAllFormatFields);
  const filteredFormatFields = formatFields.filter((field) => !field.disabled);
  filteredFormatFields.forEach((field) => {
    const isFieldValid = validateFormat(field);

    if (isFieldValid) {
      currentStepNextButton?.removeAttribute('disabled');
    } else {
      currentStepNextButton?.setAttribute('disabled', 'disabled');
      field.classList.add('is-invalid');
      field.classList.remove('is-valid');
    }
  });
};

const stepValidation = ({ checkoutSteps }) => {
  const steps = checkoutSteps.querySelectorAll('.accordion-item');
  const buttons = checkoutSteps.querySelectorAll('.accordion-button');
  const currentStepIndex = Array.from(buttons).findIndex((button) => !button.classList.contains('collapsed'));
  const currentStep = steps[currentStepIndex];
  const currentStepNextButton = currentStep.querySelector('.btn-confirm');
  const currentStepForm = currentStep.querySelector('.accordion-body');
  const getAllRequiredFields = currentStepForm.querySelectorAll('.validate-required input, .validate-required select, .validate-required textarea');
  const getAnotherShippingAddressCheckboxValue = currentStepForm.querySelector('#ship-to-different-address-checkbox');
  const getShippingInputContainer = currentStepForm.querySelector('.woocommerce-shipping-fields');
  const getShippingRequiredFields = getShippingInputContainer?.querySelectorAll(
    '.validate-required input, .validate-required select, .validate-required textarea',
  );

  getAllRequiredFields.forEach((field) => {
    field.addEventListener(
      'input',
      debounce(() => {
        if (field.value) {
          if (validateFormat(field) === false) {
            currentStepNextButton.setAttribute('disabled', '');
            field.classList.remove('is-valid');
            field.classList.add('is-invalid');
          } else {
            currentStepNextButton.removeAttribute('disabled');
            field.classList.remove('is-invalid');
            field.classList.add('is-valid');
          }
        } else {
          currentStepNextButton.setAttribute('disabled', '');
          field.classList.remove('is-valid');
          field.classList.add('is-invalid');
        }
      }, 100),
    );
  });

  // billing_pesel_field billing_nip_field

  if (getShippingInputContainer && getAnotherShippingAddressCheckboxValue.checked === false) {
    getShippingRequiredFields.forEach((field) => {
      field.setAttribute('disabled', '');
      field.classList.remove('is-invalid');
      field.classList.remove('is-valid');
    });
    currentStepNextButton.removeAttribute('disabled');
  } else if (getShippingInputContainer && getAnotherShippingAddressCheckboxValue.checked === true) {
    getShippingRequiredFields.forEach((field) => {
      field.removeAttribute('disabled');
    });
  }

  checkRequiredFields({ getAllRequiredFields, currentStepNextButton });
  checkFormatFields({ getAllFormatFields: getAllRequiredFields, currentStepNextButton });

  if (getShippingInputContainer) {
    getAnotherShippingAddressCheckboxValue.addEventListener('change', () => {
      if (getAnotherShippingAddressCheckboxValue.checked === true) {
        getShippingRequiredFields.forEach((field) => {
          field.removeAttribute('disabled');
        });
        checkRequiredFields({ getAllRequiredFields, currentStepNextButton });
        checkFormatFields({ getAllFormatFields: getAllRequiredFields, currentStepNextButton });
      } else {
        getShippingRequiredFields.forEach((field) => {
          field.setAttribute('disabled', '');
          field.classList.remove('is-invalid');
          field.classList.remove('is-valid');
        });
        checkRequiredFields({ getAllRequiredFields, currentStepNextButton });
        checkFormatFields({ getAllFormatFields: getAllRequiredFields, currentStepNextButton });
      }
    });
  }
};

const checkCurrentStep = ({ checkoutSteps }) => {
  const steps = checkoutSteps.querySelectorAll('.accordion-item');
  const buttons = checkoutSteps.querySelectorAll('.accordion-button');
  const currentStepIndex = Array.from(buttons).findIndex((button) => !button.classList.contains('collapsed'));
  const stepsBeforeCurrent = Array.from(steps).slice(0, currentStepIndex);
  const stepsAfterCurrent = Array.from(steps).slice(currentStepIndex);

  const currentStep = steps[currentStepIndex];

  const billingPeselField = currentStep.querySelector('#billing_pesel_field');
  const billingNipField = currentStep.querySelector('#billing_nip_field');
  const billingEmailField = currentStep.querySelector('#billing_email_field');
  const billingPhoneField = currentStep.querySelector('#billing_phone_field');
  const shippingWrapper = currentStep.querySelector('.woocommerce-shipping-methods');
  const doctypeWrapper = currentStep.querySelector('.woocommerce-order_doctype');

  if (doctypeWrapper) {
    const doctypeMethods = doctypeWrapper.querySelectorAll('li');
    doctypeMethods.forEach((element) => {
      const input = element.querySelector('input');
      const styledRadio = element.querySelector('.styled-radio');
      element.addEventListener('click', () => {
        input.checked = true;
        input.setAttribute('checked', 'checked');
        styledRadio.classList.add('checked');
        doctypeMethods.forEach((el) => {
          if (el !== element) {
            el.querySelector('input').removeAttribute('checked');
            el.querySelector('.styled-radio').classList.remove('checked');
          }
        });
      });
    });
  }

  if (shippingWrapper) {
    const shippingMethods = shippingWrapper.querySelectorAll('li');

    shippingMethods.forEach((element) => {
      const input = element.querySelector('input');
      const styledRadio = element.querySelector('.styled-radio');
      element.addEventListener('click', () => {
        input.checked = true;
        input.setAttribute('checked', 'checked');
        styledRadio.classList.add('checked');
        document.querySelector('body').dispatchEvent(new Event('update_checkout'));
        shippingMethods.forEach((el) => {
          if (el !== element) {
            const inputEl = el.querySelector('input');
            const styledRadioEl = el.querySelector('.styled-radio');
            inputEl.checked = false;
            inputEl.removeAttribute('checked');
            styledRadioEl.classList.remove('checked');
          }
        });
      });
    });
  }

  if (billingPeselField) {
    const PeselInput = billingPeselField.querySelector('#billing_pesel');

    PeselInput.insertAdjacentHTML('afterend', '<div class="invalid-feedback">Podany PESEL jest nieprawidłowy</div>');
  }
  if (billingNipField) {
    const NipInput = billingNipField.querySelector('#billing_nip');
    NipInput.insertAdjacentHTML('afterend', '<div class="invalid-feedback">Wpisz poprawny numer NIP</div>');
  }
  if (billingEmailField) {
    const EmailInput = billingEmailField.querySelector('#billing_email');

    EmailInput.insertAdjacentHTML('afterend', '<div class="invalid-feedback">Wpisz poprawny adres e-mail</div>');
  }
  if (billingPhoneField) {
    const PhoneInput = billingPhoneField.querySelector('#billing_phone');
    PhoneInput.insertAdjacentHTML('afterend', '<div class="invalid-feedback">Wpisz poprawny numer telefonu</div>');
  }

  stepsBeforeCurrent.forEach((step) => {
    const stepButton = step.querySelector('.accordion-button');
    stepButton.removeAttribute('disabled');
    stepButton.classList.add('completed');
  });

  stepsAfterCurrent.forEach((step) => {
    const stepButton = step.querySelector('.accordion-button');
    stepButton.setAttribute('disabled', '');
    stepButton.classList.remove('completed');
  });

  stepValidation({ checkoutSteps });
};

window.addEventListener('DOMContentLoaded', () => {
  const checkoutSteps = document.querySelector('#checkoutSteps');

  if (checkoutSteps) {
    const nextButtons = checkoutSteps.querySelectorAll('.btn-confirm');
    const prevButtons = checkoutSteps.querySelectorAll('.accordion-button');

    if (checkoutSteps) {
      checkCurrentStep({ checkoutSteps });
    }

    if (prevButtons) {
      prevButtons.forEach((button) => {
        button.addEventListener('click', () => {
          checkCurrentStep({ checkoutSteps });
        });
      });
    }

    if (nextButtons) {
      nextButtons.forEach((button) => {
        button.addEventListener('click', () => {
          checkCurrentStep({ checkoutSteps });
        });
      });
    }
  }
});
