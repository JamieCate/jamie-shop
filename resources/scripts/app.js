import domReady from '@roots/sage/client/dom-ready';
import '@styles/app.scss';
import 'bootstrap';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';
import 'slick-carousel';



/**
 * Application entrypoint
 */
domReady(async () => {
  // ...
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);

