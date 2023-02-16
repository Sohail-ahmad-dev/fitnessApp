importScripts('https://storage.googleapis.com/workbox-cdn/releases/5.1.2/workbox-sw.js');


workbox.routing.registerRoute(
  /\.(?:js|css|png|jpg|jpeg|svg)$/,
  new workbox.strategies.CacheFirst()
);


workbox.precaching.precacheAndRoute([
  { url: '/css/app.css', revision: '12345' },
  { url: '/js/app.js', revision: '12345' },
  { url: '/offline.html', revision: '12345' },
]);
