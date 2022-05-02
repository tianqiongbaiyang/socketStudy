// app.js
App({
    onLaunch (option) {
         // Do something initial when launch.
         console.log('initial');
    },
    onShow (options) {
        // Do something when show.
        console.log('show');
    },
    onHide () {
        // Do something when hide.
        console.log('hide');
    },
    onError (msg) {
        console.log(msg);
    },
    globalData: 'I am global data'
    
})
