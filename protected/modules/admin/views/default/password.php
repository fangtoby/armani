<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<div id="modify_password" class="form">
    <div class="row">
    	<label>密 码：</label>
        <input type="password" placeholder="请输入密码"  id="old_pwd" />
    </div>
    <div class="row">
    	<label>新密码：</label>
        <input type="password" placeholder="请输入新密码" id="new_pwd" />
    </div>
    <div class="row">
    	<label>新密码：</label>
        <input type="password" placeholder="请重新输入新密码" id="new_pwd_repeat" />
    </div>
    <div class="row buttons">
    	<input type="button" id="modify" value="确认修改" />
    </div>
</div><!-- form -->

<script>
	$(function(){
		var $but = $('#modify');
        var $old_pwd = $('#old_pwd');
		var $new_pwd = $('#new_pwd');
		var $new_pwd_repeat = $('#new_pwd_repeat');
		
		$('#modify').click(function(e) {
			if($but.hasClass('load')){
				return;
			}
			if(($old_pwd.val() != '') && ($new_pwd.val() != '') && ($new_pwd_repeat.val() != '')){
				if($old_pwd.val() == $new_pwd.val()){
					alert('新密码不能与老密码相同!');
					return;
				}
				if($new_pwd.val() != $new_pwd_repeat.val()){
					alert('新密码验证错误!');
				}else{
					$but.addClass('load');
					$but.val( '请稍等' );
					send({
						'oldPwd':$old_pwd.val(),
						'newPwd':$new_pwd.val()
					});
				}
			}else{
				alert('请输入完全!');
			}
        });
		
		function send(data){
			 $.ajax({
					 type: "GET",
					 url: "/admin/default/modifyPassword",
					 data: data,
					 dataType:'json',
					 success: function(data){
						 $but.val( '确认修改' );
						 $but.removeClass('load');
						if(data.type == 0){
							alert("密码错误！");	
						}else{
							alert("修改成功");
							$old_pwd.val('');
							$new_pwd.val('');
							$new_pwd_repeat.val('');
						}
					 }
			});
		}
		
	});
</script>