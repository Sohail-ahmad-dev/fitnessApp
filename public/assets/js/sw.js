importScripts('https://storage.googleapis.com/workbox-cdn/releases/6.2.4/workbox-sw.js');

workbox.setConfig({ debug: false });

workbox.routing.registerRoute(
  ({url}) => url.origin === 'https://oasiss-solutions.com' && url.pathname.startsWith('/fitnessApp/'),
  new workbox.strategies.NetworkFirst({
    cacheName: 'my-app',
    plugins: [
      new workbox.expiration.ExpirationPlugin({
        maxEntries: 100,
        maxAgeSeconds: 7 * 24 * 60 * 60,
      }),
    ],
  })
);

workbox.routing.registerRoute(
  /\.(?:png|jpg|jpeg|svg|gif)$/,
  new workbox.strategies.CacheFirst({
    cacheName: 'images',
    plugins: [
      new workbox.expiration.ExpirationPlugin({
        maxEntries: 60,
        maxAgeSeconds: 30 * 24 * 60 * 60,
      }),
    ],
  })
);

workbox.routing.registerRoute(
  /\.(?:css)$/,
  new workbox.strategies.CacheFirst({
    cacheName: 'css',
    plugins: [
      new workbox.expiration.ExpirationPlugin({
        maxEntries: 30,
        maxAgeSeconds: 7 * 24 * 60 * 60,
      }),
    ],
  })
);

workbox.routing.registerRoute(
  /\.(?:js)$/,
  new workbox.strategies.CacheFirst({
    cacheName: 'js',
    plugins: [
      new workbox.expiration.ExpirationPlugin({
        maxEntries: 30,
        maxAgeSeconds: 7 * 24 * 60 * 60,
      }),
    ],
  })
);
