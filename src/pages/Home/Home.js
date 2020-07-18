const navbar = document.querySelector('.nav-bar');
const counters = document.querySelectorAll('.statistic');
const icon = document.querySelector('#floating-icon');
const speed = 200;

window.addEventListener('scroll', () => {
  if (window.pageYOffset > 70) {
    navbar.classList.add('active');
    icon.style.display = 'block';
  } else {
    navbar.classList.remove('active');
    icon.style.display = 'none';
    icon.style.display = 'none';
  }
});

window.addEventListener('scroll', () => {
  if (window.pageYOffset > 1000) {
    counters.forEach((counter) => {
      const updateCount = () => {
        const target = +counter.getAttribute('data-target');
        const count = +counter.innerText;
        console.log(count);

        const inc = target / speed;

        if (count < target) {
          counter.innerText = count + inc;

          setTimeout(updateCount, 1);
        } else {
          counter.innerText = target;
        }
      };

      updateCount();
    });
  } else {
    count.style.display = 'none';
  }
});
