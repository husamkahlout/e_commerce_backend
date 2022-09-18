// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');

/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
*/
firebase.initializeApp({
    apiKey: "AIzaSyAu0jnElPDP8uWBzYfjt05v7iDjkZs0iMI",
    authDomain: "ecommerce-1e019.firebaseapp.com",
    databaseURL: 'https://project-id.firebaseio.com',
    projectId: "ecommerce-1e019",
    storageBucket: "ecommerce-1e019.appspot.com",
    messagingSenderId: "221076419297",
    appId: "1:221076419297:web:3e755c31ed81d673563da0",
    measurementId: 'G-measurement-id',
});


// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function (payload) {
    console.log("Message received.", payload);

    const title = "Hello world is awesome";
    const options = {
        body: "Your notificaiton message .",
        icon: "/firebase-logo.png",
    };

    return self.registration.showNotification(
        title,
        options,
    );
});
