const SHELL_CACHE = 'Visualizador-Shell-Cache-v3';
const DYNAMIC_CACHE = 'Visualizador-Dynamic-Cache-v2';
const IMAGE_CACHE = 'Visualizador-Image-Cache-v1';

const OLD_SHELL_CACHE = 'Visualizador-Shell-Cache-v2';
const OLD_DYNAMIC_CACHE = 'Visualizador-Dynamic-Cache-v1';
const OLD_IMAGE_CACHE = null;

const APP_SHELL = [
    '/',
    'assets/css/main.min.css',
    'assets/js/jquery-3.3.1.slim.min.js',
    'assets/js/mapbox-gl.js',
    'assets/js/main.min.js',
    '/sw.js',
    '/manifest.json',
    '/pwa-init.js'
];

self.addEventListener('install', event => {
    console.log('Installing Service Worker');
    if (OLD_SHELL_CACHE !== null) {
        caches.delete(OLD_SHELL_CACHE);
    }
    event.waitUntil(
        caches.open(SHELL_CACHE).then(cache => {
            console.log('Creating Shell Cache');
            return cache.addAll(APP_SHELL);
        })
    );
});

self.addEventListener('activate', event => {
    console.log('Activating Service Worker');
    event.waitUntil(self.clients.claim());
});

self.addEventListener('fetch', event => {
    if (event.request.method !== 'GET') return;
    if (event.request.url.includes('chrome-extension')) return;
    if (event.request.url.includes('mapbox')) return;

    if (event.request.destination === 'image') {
        if (OLD_IMAGE_CACHE !== null) {
            caches.delete(OLD_IMAGE_CACHE);
        }
        const respuesta = caches.open(IMAGE_CACHE).then(cache => {
            return cache.match(event.request).then(cacheResponse => {
                fetch(event.request).then(networkResponse => {
                    cache.put(event.request, networkResponse);
                });
                if (cacheResponse) {
                    return cacheResponse;
                } else {
                    return fetch(event.request)
                        .then(networkFallbackResponse => {
                            cache.add(event.request, networkFallbackResponse);
                            return networkFallbackResponse;
                        })
                        .catch(() => {
                            console.log('Fallback IMAGE');
                            return caches.open(SHELL_CACHE).then(shCache => {
                                return shCache.match(event.request).then(shellCacheResponse => {
                                    if (shellCacheResponse) return shellCacheResponse;
                                    else return shCache.match('/static/no-image.png');
                                });
                            });
                        });
                }
            });
        });

        event.respondWith(respuesta);
    } else {
        if (OLD_DYNAMIC_CACHE !== null) {
            caches.delete(OLD_DYNAMIC_CACHE);
        }
        const respuesta = fetch(event.request)
            .then(networkResponse => {
                return caches.open(DYNAMIC_CACHE).then(cache => {
                    cache.put(event.request, networkResponse.clone());
                    return networkResponse;
                });
            })
            .catch(() => {
                return caches.match(event.request).then(cacheResponse => {
                    if (cacheResponse) return cacheResponse;
                    else {
                        return caches.open(SHELL_CACHE).then(cache => {
                            console.log('Fallback ShellCache');
                            return cache.match(event.request).then(shellCacheResponse => {
                                if (shellCacheResponse) return shellCacheResponse;
                                else return cache.match('offline');
                            });
                        });
                    }
                });
            });
        event.respondWith(respuesta);
    }
});

self.addEventListener('push', function(event) {
    console.log('[Service Worker] Push Received.');
    console.log(`[Service Worker] Push had this data: "${event.data.text()}"`);

    const title = 'Visualizador Electoral México';
    const options = {
        body: 'Nueva Notificacion del Visualizador',
        icon: 'img/school.png',
        badge: './favicon.ico'
    };

    event.waitUntil(self.registration.showNotification(title, options));
});