$(document).ready(function () {

    window.share = {
        imgUrl: 'http://masterofglow.comeyes.cn/public/images/sharelogo.jpg',
        link: 'http://masterofglow.comeyes.cn/',
        title: "",
        desc: "致敬阿玛尼 底妆大师15周年",
    }

    shareConfig();
});
// JavaScript Document
// WEIXIN SHARE
function shareConfig() {
	
	$.ajax({url:'http://armani2014.ccegroup.cn/ArmaniGetSignaturePara.ashx?Token=3808053',
		
		type:'get',
		dataType:"jsonp",
		jsonp:"flightHandler",
		jsonpCallback:"callback",
		data:{urlAddress:window.location.href},
		success: function(msg){
	
			weixin(msg);
			},
		error:function(e){
			}});
			


}
	function flightHandler(w)
	{
	//alert(w);
	//alert(w.AppID)
	weixin(w);
	}
	
function weixin(msg)
{
	wx.config({
    debug: false,// 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
    appId: msg.AppID,// 必填，公众号的唯一标识
    timestamp:msg.TimesTamp, // 必填，生成签名的时间戳
    nonceStr: msg.NonceStr, // 必填，生成签名的随机串
    signature: msg.SignaTure,// 必填，签名，见附录1
    jsApiList: ['onMenuShareTimeline','onMenuShareAppMessage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
	
	});
	wx.ready(function(){
		
		wx.onMenuShareTimeline({
			title:window.share.desc, // 分享标题
			link:  window.share.link, // 分享链接
			imgUrl: window.share.imgUrl, // 分享图标
			success: function () { 
			ga('send', {
			  'hitType': 'event',          // Required.
			  'eventCategory': "Armani",   // Required.
			  'eventAction': 'click',      // Required.
			  'eventLabel':'Share_2',
			  'eventValue': 1
			});
			},
			cancel: function () { 
				// 用户取消分享后执行的回调函数
			}
		});
		
		 wx.onMenuShareAppMessage({
			title: '', // 分享标题
			link: window.share.link, // 分享链接
			imgUrl: window.share.imgUrl,
			desc: window.share.desc,
			trigger: function (res) {
				//	alert('用户点击分享到朋友圈');
			},
			success: function (res) {
				ga('send', {
			  'hitType': 'event',          // Required.
			  'eventCategory': "Armani",   // Required.
			  'eventAction': 'click',      // Required.
			  'eventLabel':'Share_2',
			  'eventValue': 1
			});
			},
			cancel: function (res) {
				//	alert('已取消');
			},
			fail: function (res) {
				//	alert(JSON.stringify(res));
			}
            });
		
		});
		
	
	wx.error(function(res){
		//alert('error');
		});
}

