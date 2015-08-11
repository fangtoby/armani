(function ($) {
    Armani = function() {
		this.init();
    };
    $.extend(Armani.prototype, {
		
        init: function(data) {
			this.iswechat = false;
        	this.isWeiXin();
        	this.type = null;
			$('.citylist select').empty();
			$(".shoplist select").hide();
			this.shopdata = ss.result;
			
			this.fillCity();
			this.block = true;
			var self = this;
			
			$('.getprize form a').click(function(){
				if(self.block == false){
					return false;
				}
			
				self.block = false;
				self.type = 0; 
				self.forminfo();
			})
			
			$('.setinfo form a').click(function(){
			
				
				if(self.block == false){
				
					return false;
				}
				self.block = false;
				self.type = 1; 
				self.forminfo();
			})
			
			$('.setback a').click(function(){
				window.location.href="http://masterofglow.comeyes.cn/index/list";
			})
			
			$('.shareTips').click(function(){
				$('.overlay,.shareTips').hide();
			})
			
        },
        
        forminfo:function(){
        	var mobile = $('input').val();
			var city = $('.city').attr('data-id');
			var seshops = $('.shop').attr('data-id');
		
			if(mobile !='' &&  /^1[34578]\d{9}/.test(mobile)) {
					if(city == '0' ){
						alert('请选择城市')
						this.block = true;
						return false;
					}
					  
					if(seshops == '0' ){		
							alert('请选择专柜')
							this.block = true;
							return false;
					}
					
						$('.setinfo .popup2 .msg').empty();
						this.ajax(city,seshops,this.type,mobile)  	
					
      		  }else{
					alert('请输入正确手机号')
					this.block = true;
					return false;	 
			  }
			  
			
			
		
        
        },
        
        fillCity:function() {
        	
			var tmphtml = '<option value="CITYID">CITYNAME</option>';
			var cityhtml = '<option value="0">选择你所在的城市</option>';
			var cityarray = [];
			var flag = false;
			var self = this;
			for (s in self.shopdata) {
				cityarray.forEach(function(c) {
					if (self.shopdata[s].CityID == c) {
						return flag = true
				}
			});
			if (!flag) {
				cityarray.push(self.shopdata[s].CityID);
				cityhtml += tmphtml.replace(/CITYID/, self.shopdata[s].CityID)
						.replace(/CITYNAME/, self.shopdata[s].CityName)
			}
				flag = false
			}
		
			$(".citylist select").append(cityhtml);
			
			this.shop_city()
		},	
		
		
		shop_city:function() {
			var self = this;
			$(".citylist select").on("change",function() {
				var val = $(this).find('option:selected').text();
				var id = $(this).val();
				$('.city').attr('data-id',id)
				$('.city').empty().html(val)
				$(".shoplist select").empty();
				var sthtml = '<option value="SHOPID">SHOPNAME</option>';
				var shtml = '<option value="0">选择你申领的柜台</option>';				
					for (s in self.shopdata) {
			   			if (self.shopdata[s].CityID == id) {
							shtml += sthtml.replace(/SHOPID/,
									self.shopdata[s].ShopID).replace(/SHOPNAME/,
									self.shopdata[s].ShopName)
						}
					}
					$(".shoplist select").append(shtml)
					$(".shoplist select").show();
				})
				
			$(".shoplist select").on("change",function() {
				var val = $(this).find('option:selected').text();
				var id = $(this).val();
				$('.shop').attr('data-id',id)
				$('.shop').empty().html(val)
				})
				
				
		},
		
		ajax:function(cityId,marketId,btntype,phone){
		var self = this;
			 $.ajax({
       			 url: '/api/lottery',
      			 type: "get",
        		 dataType: "json",
        		 async: false,
        		 data: {
        		 	cityId:cityId,
        		 	marketId:marketId,
        		 	type:btntype,
        		 	phone:phone
        		 	
        		 },
				 success: function (response) {
				 
				 	self.block = true;
				 	
				 	if(response.code != 200){
				 		alert(response.message)
				 		return false;
				 	}

				 	if(btntype == 0){
						 $('.getprize').hide();
						 $('.setback').show();
				 	}else{
				 	
				 		if(response.data.type == 1){
				 			$('.setinfo .popup2 .msg').html('恭喜您<br>获取阿玛尼赋予<br>'+response.data.prize+'<br>我们将短信通知邀您莅临专柜')
				 			
				 			$('.setinfo .popup1').hide();
				 			$('.setinfo .popup2').show();
				 			$('.qrcode').show();
				 			var vid = $('.cardbg').attr('src').split('images/card/')[1].split('.jpg')[0]
				 			window.share.link='http://masterofglow.comeyes.cn/index/share?openid='+ g_config.openid +'&v='+vid+''
				 			window.share.desc='底妆大师阿玛尼15周年，我是第'+response.data.number+'个致敬大师的追随者'
				 			shareConfig();
				 			
				 			
				 		}
				 		
				 		
				 		if(response.data.type == 3){
				 			alert('您已经中过奖了')
				 		}
				 		
				 		
				 		
				 		$('.share').click(function(){
							if(self.iswechat == false){
								window.location.href = "http://service.weibo.com/share/share.php?pic="
									+encodeURIComponent(g_config.path.img+'sharelogo.jpg')
									+"&title='底妆大师阿玛尼15周年，我是第"+response.data.number+"个致敬大师的追随者'&url="
									+ encodeURIComponent('http://masterofglow.comeyes.cn/index/share?openid='+ g_config.openid +'&v='+vid+'');
							}else{
								$('.setinfo').hide()
								$('.setinfo .popup2').hide()
								$('.qrcode').hide();
								$('.shareTips').fadeIn()
							}	
			
						})
				 	}
				 
       			 }
  			  });		
  			  
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

  var armani = new Armani();

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
