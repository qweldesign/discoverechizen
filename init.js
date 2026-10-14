// Action Core
import ActionCore from './js/action-core.js';
new ActionCore.BackToTop();

// Fader (トップページのメインギャラリー)
import Fader from './js/fader.js';
document.querySelectorAll('[data-gallery="fader"]').forEach((elem) => {
  new Fader(elem);
});
