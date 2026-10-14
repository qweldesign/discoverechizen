// Action Core
import ActionCore from './js/action-core.js';
new ActionCore.ActiveHeader();
new ActionCore.BackToTop();
new ActionCore.DrawerMenu();
new ActionCore.ScrollSpy();
new ActionCore.ReadableOnScroll();

// Fader (トップページのメインギャラリー)
import Fader from './js/fader.js';
document.querySelectorAll('[data-gallery="fader"]').forEach((elem) => {
  new Fader(elem);
});

// Slider (トップページのバナーエリア)
import Slider from './js/slider.js';
document.querySelectorAll('[data-gallery="slider"]').forEach((elem) => {
  new Slider(elem);
});

// お問い合わせフォーム (トップページの入力, 確認画面)
import ContactForm from './js/contact-form.js';
new ContactForm();
