let serviceWorkerRegistration = null;
let isSubscribed = false;
const BASE64_MARKER = ';base64,';
const PWA_SK = 'R5Wzg8LDV7zFJ6qgDZhe5d1pJ1KFdxZhbbcXTUm8r-E';
const PWA_PK = 'BIPwOn92YSvfzy3sA84xtC-Tcbrks64ixio7Ap6mt4rwt4ACZwKuyGXYAL6bv2myEpF7YZ-aXB9mseKl3rv8a90';

if ('serviceWorker' in navigator && 'PushManager' in window) {
    navigator.serviceWorker.register('sw.js')
        .then(function(swReg) {
            console.log('Service Worker is registered', swReg);
            serviceWorkerRegistration = swReg;
            initialiseUI();
        })
        .catch(function(error) {
            console.error('Service Worker Error', error);
        });
} else {
    console.log('Push messaging is not supported');
}

function initialiseUI() {
    serviceWorkerRegistration.pushManager.getSubscription()
        .then(function(subscription) {
            isSubscribed = !(subscription === null);
            if (isSubscribed) {
                console.log('User IS subscribed.');
            } else {
                console.log('User is NOT subscribed.');
                subscribeUser();
            }
        });
}

function subscribeUser() {
    // const applicationServerKey = b64toBlob(PWA_PK, 'text/plain');
    serviceWorkerRegistration.pushManager.subscribe({
            userVisibleOnly: true,
            applicationServerKey: PWA_PK
        })
        .then(function(subscription) {
            console.log('User is subscribed:', subscription);
            isSubscribed = true;
        })
        .catch(function(err) {
            console.log('Failed to subscribe the user: ', err);
        });
}

function b64toBlob(b64Data, contentType, sliceSize) {
    contentType = contentType || '';
    sliceSize = sliceSize || 512;

    var byteCharacters = atob(b64Data);
    var byteArrays = [];

    for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
        var slice = byteCharacters.slice(offset, offset + sliceSize);

        var byteNumbers = new Array(slice.length);
        for (var i = 0; i < slice.length; i++) {
            byteNumbers[i] = slice.charCodeAt(i);
        }

        var byteArray = new Uint8Array(byteNumbers);

        byteArrays.push(byteArray);
    }

    var blob = new Blob(byteArrays, { type: contentType });
    return blob;
}