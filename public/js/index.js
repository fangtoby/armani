(function ($) {
    Mgm = function() {
		this.init();
    };
    $.extend(Mgm.prototype, {
		
        init: function(data) {
        
		  	
		  	$('.self_info img').attr('src','<?=$info["headimgurl"];?>')
			$('.self_info span').empty().html('<?=$info["nickname"];?>')
			var self = this;
			self.loadimages(['images/category.jpg','images/sub1.jpg','images/sub2.jpg','images/sub3.jpg'])
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
				newimages[i].src=arr[i]
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
				console.log(index)
				
				switch(index){
					case 0:
						window.location.href='http://'+window.location.host+'/html/setinfo.html';
						break;
					case 1:
						$('.category').hide()
						$('.sub_category').addClass('sub1').fadeIn(500);
						$('.sub_category').attr('data-id','1');
						break;
					case 2:
						$('.category').hide()
						$('.sub_category').addClass('sub2').fadeIn(500);
						$('.sub_category').attr('data-id','2');
						break;
					case 3:
						$('.category').hide()
						$('.sub_category').addClass('sub3').fadeIn(500);
						$('.sub_category').attr('data-id','3');
						break;
				
				}
			
			})
			
			$('.sub_category a').click(function(e){
			
				var index = $(this).index();
				
				switch(index){
					case 0:
						window.location.href='http://'+window.location.host+'/html/setinfo.html';
						break;
					case 1:
						$('.sub_category').attr('class','').addClass('sub_category').hide();
						$('.sub_category').attr('data-id','0');
						$('.category').fadeIn(500)
						break;
					case 2:
						var id = $('.sub_category').attr('data-id');
						$('.sub_category').hide()
						$('.card .cardbg').attr('src','images/card/s'+id+'_1.jpg');
						$('.result').fadeIn();
						break;
					case 3:
						var id = $('.sub_category').attr('data-id');
						$('.sub_category').hide()
						$('.card .cardbg').attr('src','images/card/s'+id+'_2.jpg')
						$('.result').fadeIn();
						break;
					case 4:
						var id = $('.sub_category').attr('data-id');
						$('.sub_category').hide()
						$('.card .cardbg').attr('src','images/card/s'+id+'_3.jpg')
						$('.result').fadeIn();
						break;
				
				}
			
			})
			
			$('.card a').click(function(){
				$('.overlay,.setinfo').fadeIn()
			})
			
			$('.close').click(function(){
				$('.overlay,.overlay>div').hide()
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
	  'eventCategory': "",   // Required.
	  'eventAction': 'click',      // Required.
	  'eventLabel': name,
	  'eventValue': 1
	});
};
function doPageview(name) {
	console.log('doPageview',name)
	ga('send', 'pageview', {
	'page': name,
	'title': ""
    });
	ga('send', {
	  'hitType': 'event',          // Required.
	  'eventCategory': "",   // Required.
	  'eventAction': 'page',      // Required.
	  'eventLabel': name,
	  'eventValue': 1
	});
};
