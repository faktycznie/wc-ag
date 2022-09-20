const mapSwitcher = () => {
  const mapsContainer = document.querySelector('.maps-container');
  const mapButtons = document.querySelectorAll('.contact-box');
  if (mapsContainer && mapButtons) {
    const mapMaps = mapsContainer.querySelectorAll('.wpmapblockrender');
    if (mapsContainer && mapButtons && mapMaps) {
      mapMaps.forEach((map, index) => {
        map.classList.add(`map-${index}`);
        if (index === 0) {
          map.classList.add('active');
        } else {
          map.classList.add('inactive');
        }
      });

      mapButtons.forEach((button, index) => {
        button.classList.add(`map-button-${index}`);
        if (index === 0) {
          button.classList.add('active');
        } else {
          button.classList.add('inactive');
        }
      });

      mapButtons.forEach((button) => {
        button.addEventListener('click', (e) => {
          e.preventDefault();
          const buttonClassList = button.classList;
          const buttonClass = Array.from(buttonClassList).filter((className) => className.includes('map-button-'))[0];
          const buttonIndex = buttonClass.split('-')[2];
          const mapIndex = mapMaps[buttonIndex].classList[1].split('-')[1];
          mapButtons.forEach((btn) => {
            btn.classList.remove('active');
            btn.classList.add('inactive');
          });
          mapMaps.forEach((map) => {
            map.classList.remove('active');
            map.classList.add('inactive');
          });
          button.classList.remove('inactive');
          button.classList.add('active');
          mapMaps[mapIndex].classList.remove('inactive');
          mapMaps[mapIndex].classList.add('active');
        });
      });
    }
  }
};

window.addEventListener('DOMContentLoaded', () => {
  mapSwitcher();
});
