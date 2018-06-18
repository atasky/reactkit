const reactkit = document.querySelectorAll('[data-reactkit]');

reactkit.forEach(el => {
  const component = el.getAttribute('data-reactkit');
  window[component] = require(`./${component}`).default;
});