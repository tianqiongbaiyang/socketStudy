// index.js
// This is our App Service.
// This is our data.
var helloData = {
    name: 'Weixin'
}

const appInstance = getApp();
console.log(appInstance.globalData + 'test');// I am global datatest

// Register a Page.
Page({
/*     data: helloData,
    changeName: function(e) {
        // sent data change to view
        this.setData({
            name: 'MINA'
        })
    } */

    data: {
        name: "This is page data."
    },
    onLoad: function(options) {
         // 页面创建时执行
         console.log('onLoad');
    },
    onShow: function() {
         // 页面出现在前台时执行
         console.log('onShow');
    },
    onReady: function() {
        // 页面首次渲染完毕时执行
        console.log('onReady');
    },
    onHide: function() {
        // 页面从前台变为后台时执行
        console.log('onHide');
    },
    onUnload: function() {
        // 页面销毁时执行
        console.log('onUnload');
    },
    onPullDownRefresh: function() {
        // 触发下拉刷新时执行
        console.log('on')
    },
    onReachBottom: function() {
        // 页面触底时执行
        console.log('onReachBottom');
    },
    onShareAppMessage: function() {
        // 页面被用户分享时执行
        console.log('onShareAppMessage');
    },
    onPageScroll: function() {
         // 页面滚动时执行
         console.log('onPageScroll');
    },
    onResize: function() {
        // 页面尺寸变化时执行
        console.log('onResize');
    },
    onTabItemTap(item) {
        // tab 点击时执行
        console.log('onTabItemTap');
        console.log('item.index');
        console.log('item.pagePath');
        console.log('item.text');
    },
    // 事件响应函数
    changeName: function() {
        this.setData({
            name: 'Set some data for updating view.'
        }, function() {
            // this is setData callback
            console.log('Set data successfully');
        });
    },
    // 自由数据
    customData: {
        hi: 'MINA'
    } 
 })

