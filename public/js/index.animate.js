(function ($) {
    Mgm = function() {
		this.init();
    };
    $.extend(Mgm.prototype, {
		
        init: function(data) {
        doPageview('Homepage')
        this.iswechat = false;
        this.isWeiXin();
        var self = this;
     	   setTimeout(function(){
			self.loadimages(['gifjpg/1-0.jpg','gifjpg/1-1.jpg','gifjpg/1-2.jpg','gifjpg/1-3.jpg','gifjpg/1-4.jpg','gifjpg/1-5.jpg',
			'gifjpg/1-6.jpg','gifjpg/1-7.jpg','gifjpg/1-8.jpg','gifjpg/1-9.jpg','gifjpg/1-10.jpg','gifjpg/1-11.jpg','gifjpg/1-12.jpg',
			'gifjpg/1-13.jpg','gifjpg/1-14.jpg','gifjpg/1-15.jpg','gifjpg/1-16.jpg','gifjpg/1-17.jpg','gifjpg/1-18.jpg','gifjpg/1-19.jpg',
			'gifjpg/1-20.jpg','p1_1.png','p1_2.png','p1_3.png','p3_bg.jpg','bg.jpg'])
			},500)
			
        },
        
		loadimages : function(arr){
			var self=this;
			var newimages=[], loadedimages=0
			var arr=(typeof arr!="object")? [arr] : arr
			function imageloadpost(){
				loadedimages++
				var num = parseInt(100/arr.length*loadedimages)
				var hei = 635-425/arr.length*loadedimages
				$('.loading .mask').css('height',hei)
				
				$('.loading p em').empty().html(num)
				if (loadedimages==arr.length){
					setTimeout(function(){
						self.landing();
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
		
		
		
		
		landing:function(){
		
		var self = this;
		$('.loading').fadeOut();
		
		$('.animate,.part0').fadeIn(1000);
			setTimeout(function(){
					$('.part0 img:nth-child(2)').fadeIn()
			 },800)
			 setTimeout(function(){
					$('.part0 img:nth-child(1)').fadeIn()
			 },800)
			 setTimeout(function(){
					$('.part0 img:nth-child(3)').fadeIn()
			 },1600)
		
			setTimeout(function(){
					self.startPage();
			 },2400)
		
		},
		
		startPage:function(){
			$('.part0').fadeOut(500);
			$('.part1').fadeIn(1000);
			var self = this;
			setTimeout(function(){
				self.flow(0);
			},1000)
			
			$('.part3 a').on('touchstart',function(){
				doTrack('Start')
				if(self.iswechat == true){
					window.location.replace( g_config.validateUrl.wx );
				}else{
					window.location.replace( g_config.validateUrl.wb );
				}
				
			})
			
		},
		flow:function(num){
			var self = this;
				num++;
				if(num==18){
					$('.part1').fadeOut(1000);
					$('.part2').fadeIn(500);
				}
				if(num<=20){
					$('.part1 img').attr('src',g_config.path.img + 'gifjpg/1-'+num+'.jpg')
					setTimeout(function(){
						self.flow(num);
					},100)
					
				}else{
					
					setTimeout(function(){
					    
					   $('.part2 img:nth-child(1)').addClass('p1_on');
					    $('.part2 img:nth-child(2)').delay(500).addClass('p2_on');
					    $('.part2 img:nth-child(3)').delay(1000).addClass('p1_on');
					    $('.part2 img:nth-child(4)').delay(1000).fadeIn(500);
					    $('.part2').delay(3000).fadeOut();
					    $('.part3').delay(3000).fadeIn(1000);
					    $('.p3cp1,.year').delay(3000).fadeIn(500)
					    setTimeout(function(){
							self.setyear(2000);
						},3800)
						
						
					},1000)
					
				}
		},
		
		setyear:function(num){
			var self = this;
			num++;
			if(num == 2001){
				 $('.p3cp1').fadeIn(700)
				}
				
			if(num == 2004){
				 $('.p3cp2').fadeIn(700)
				}
				
			if(num == 2009){
				 $('.p3cp3').fadeIn(700)
				}
				
			if(num == 2014){
				  $('.part3 a').fadeIn(700)
				}
				
			if(num<=2015){
				$('.year em').empty().html(num)
					setTimeout(function(){
						self.setyear(num);
					},200)
				}
		
		},
		
		
		isWeiXin:function(){
  			  var ua = window.navigator.userAgent.toLowerCase();
   			if(ua.match(/MicroMessenger/i) == 'micromessenger'){
				this.iswechat = true
				
  			  }else{
				this.iswechat = false
  			  }
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

	ga('send', 'pageview', {
	'page': name,
	'title': "Armani"
    });
    
	
};
