(function ($) {
    Mgm = function() {
		this.init();
    };
    $.extend(Mgm.prototype, {
		
        init: function(data) {
      		doPageview('Page_Glow')
      		document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
 				 WeixinJSBridge.call('hideToolbar');
 				 WeixinJSBridge.call('showOptionMenu');
			});
		  	$('.self_info img').attr('src',g_config.headimgurl)
			$('.self_info span').empty().html( g_config.nickname )
			var self = this;
			self.loadimages(['category.jpg','sub1.jpg','sub2.jpg','sub3.jpg','info_bg.jpg'])
        },
		
		loadimages:function(arr){
		
			var self=this;
			var newimages=[], loadedimages=0
			var arr=(typeof arr!="object")? [arr] : arr
			function imageloadpost(){
				loadedimages++
				
				if (loadedimages==arr.length){
					setTimeout(function(){
						self.startPage();
					},500)
				}
			}
			
			for (var i=0; i<arr.length; i++){
				newimages[i]=new Image()
				newimages[i].src= g_config.path.img + arr[i]
				newimages[i].onload=function(){
					imageloadpost()
				}
				newimages[i].onerror=function(){
				imageloadpost()
				}
			}
		},
		
		startPage:function(){
			
			$('.category').fadeIn(500)
			
			$('.category a').click(function(e){
			
				var index = $(this).index();
			
				switch(index){
					case 0:
						doTrack('Apply')
						$('.category').hide();
						$('.getprize').fadeIn(500)
						doPageview('Page_leads')
						break;
					case 1:
						doTrack('Natural_Glow')
						$('.category').hide()
						$('.sub_category').addClass('sub1').fadeIn(500);
						$('.sub_category').attr('data-id','1');
						doPageview('Page_NaturalGlow')
						break;
					case 2:
						doTrack('Mastre_Glow')
						$('.category').hide()
						$('.sub_category').addClass('sub2').fadeIn(500);
						$('.sub_category').attr('data-id','2');
						doPageview('Page_MasterGlow')
						break;
					case 3:
						doTrack('Sophisticated_Glow')
						$('.category').hide()
						$('.sub_category').addClass('sub3').fadeIn(500);
						$('.sub_category').attr('data-id','3');
							doPageview('Page_SophisticatedGlow')
						break;
				
				}
			
			})
			
			$('.sub_category a').click(function(e){
			
				var index = $(this).index();
				
				switch(index){
					case 0:
						doTrack('Apply')
						$('.sub_category').hide();
						$('.getprize').fadeIn(500)
						doPageview('Page_leads')
						break;
					case 1:
						$('.sub_category').attr('class','').addClass('sub_category').hide();
						$('.sub_category').attr('data-id','0');
						$('.category').fadeIn(500)
						break;
					case 2:
						
						
						var id = $('.sub_category').attr('data-id');
							switch(id){
								case '1':
									doTrack('Natural')
									doPageview('Page_NaturalLook')
								break;
								case '2':
									doTrack('Master')
									doPageview('Page_MasterLook')
								break;
								case '3':
									doTrack('Sophisticated')
									doPageview('Page_SophisticatedLook')
								break;
							}
						$('.sub_category').hide()
						$('.card .cardbg').attr('src',g_config.path.img + 'card/s'+id+'_1.jpg');
						$('.result').fadeIn();
						break;
					case 3:
						var id = $('.sub_category').attr('data-id');
						switch(id){
								case '1':
									doTrack('Node')
									doPageview('Page_NaturalLook')
								break;
								case '2':
									doTrack('Icon')
									doPageview('Page_IconLook')
								break;
								case '3':
									doTrack('Contour')
									doPageview('Page_ContourLook')
								break;
							}
						$('.sub_category').hide()
						$('.card .cardbg').attr('src',g_config.path.img + 'card/s'+id+'_2.jpg')
						$('.result').fadeIn();
						break;
					case 4:
						var id = $('.sub_category').attr('data-id');
						switch(id){
								case '1':
									doTrack('Skin')
									doPageview('Page_SkinLook')
								break;
								case '2':
									doTrack('shape')
									doPageview('Page_ShapeLook')
								break;
								case '3':
									doTrack('Hollywood')
									doPageview('Page_HollywoodLook')
								break;
							}
						$('.sub_category').hide()
						$('.card .cardbg').attr('src',g_config.path.img + 'card/s'+id+'_3.jpg')
						$('.result').fadeIn();
						break;
				
				}
			
			})
			
			$('.card a').click(function(){
				$('.overlay,.setinfo,.popup1').fadeIn()
			})
			
			$('.close').click(function(){
				$('.overlay,.overlay>div,.qrcode,.popup1,.popup2').hide();
				

			})
			
		
		
			
			
		}
			
		
	
    });
})(jQuery);



$(function() {

  var mgm = new Mgm();

});


function isChinese(str) {
    var str = str.replace(/(^\s*)|(\s*$)/g, '');
    if(!(/^[\u4E00-\uFA29]*$/.test(str) && (!/^[\uE7C7-\uE7F3]*$/.test(str)))) {
        return false;
    }
    return true;
}
function isMobile(str) {
    if(/^1[358]\d{9}/.test(str)) {
        return true;
    }
    return false;
}
function getQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg);
    if(r != null) return decodeURI(r[2]); return null;
}

function isWeiXin(){
    var ua = window.navigator.userAgent.toLowerCase();
    if(ua.match(/MicroMessenger/i) == 'micromessenger'){
	
    }else{
		
    }
}

function doTrack(name) {
	console.log('track',name)
	ga('send', {
	  'hitType': 'event',          // Required.
	  'eventCategory': "Armani",   // Required.
	  'eventAction': 'click',      // Required.
	  'eventLabel': name,
	  'eventValue': 1
	});
};
function doPageview(name) {
	console.log('doPageview',name)
	ga('send', 'pageview', {
	'page': name,
	'title': "Armani"
    });
};
