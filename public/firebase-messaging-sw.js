importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');

firebase.initializeApp({
    apiKey: "AIzaSyC8TRBWXfL3C7723ndTSCkOCosEmlF_Hhk",
    projectId: "larapushnotification-8ac52",
    messagingSenderId: "1079002974610",
    appId: "1:1079002974610:web:c2652afcbd34e92f00d94b",
});

const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function({data:{title,body,icon}}) {
    return self.registration.showNotification(title,{body,icon});
});
