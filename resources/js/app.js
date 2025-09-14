import.meta.glob([
  '../images/**',
  '../fonts/**',
]);

// Show/hide the mobile menu dialog
document.addEventListener('DOMContentLoaded', function () {
  const menuButton = document.getElementById('menu-toggle');
  const menuCloseButton = document.getElementById('menu-close');
  const menuDialog = document.getElementById('primary-menu');
  const landingSection = document.getElementById('landing-section');
  const header = document.querySelector('header');

  if (menuButton && menuDialog) {
    menuButton.addEventListener('click', function () {
      if (typeof menuDialog.showModal === 'function') {
        menuDialog.showModal();
      } else {
        menuDialog.setAttribute('open', '');
      }
    });

    // Optional: close dialog when clicking outside or pressing ESC
    menuDialog.addEventListener('click', function (e) {
      if (e.target === menuDialog) menuDialog.close();
    });
  }

  if (menuCloseButton) {
    menuCloseButton.addEventListener('click', function () {
      menuDialog.close();
    });
  }

  if (landingSection) {
    const callback = (entries, observer) => {
      entries.forEach(entry => {
        // Check if the element is NOT intersecting and its top is above the viewport's top
        if (!entry.isIntersecting && entry.boundingClientRect.y < 0) {
          header.classList.add('scrolled-past-landing');
        }
        else {
          header.classList.remove('scrolled-past-landing');
        }
      });
    };

    const options = {
      root: null, // observes intersections relative to the viewport
      threshold: 0 // callback fires as soon as the element is 0% visible
    };

    const observer = new IntersectionObserver(callback, options);
    observer.observe(landingSection);
  }
});