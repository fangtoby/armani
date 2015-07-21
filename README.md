# armani

echo # armani >> README.md
git init
git add README.md
git commit -m "first commit"
git remote add origin git@github.com:fangtoby/armani.git
git push -u origin master

#API
	
	商品列表
	
	api/productlist
	
	返回格式
	
	{
		"code":200,
		"message":"\u64cd\u4f5c\u6210\u529f",
		"data":[{"id":"1","name":"Nude","subname":"nude is beautiflu","url":"\/images\/list\/logo.png","createTime":"2015-07-21 14:10:23","updateTime":"2015-07-21 14:10:23"},{"id":"2","name":"Gene","subname":"Gene is Beautflu","url":"\/images\/list\/logo.png","createTime":"2015-07-21 14:10:23","updateTime":"2015-07-21 14:10:23"}]
	}
	
	商品详情，请求方法GET，参数id，id商品列表会给到
	
	api/productDetail/id/1

	{
		"code":200,
		"message":"\u64cd\u4f5c\u6210\u529f",
		"data":[{"id":"1","pid":"1","name":"Nude","url":"\/images\/list\/logo.png","createTime":"2015-07-21 14:10:23","updateTime":"2015-07-21 14:10:23","isDelete":"0"},{"id":"3","pid":"1","name":"Gebe","url":"\/images\/list\/logo.png","createTime":"2015-07-21 14:10:23","updateTime":"2015-07-21 14:10:23","isDelete":"0"}]
	}
	
	添加手机号码，code返回格式说明
	
	 *	code 1 输入成功
	 *	code 2 数据库错误
	 *	code 3 手机号码格式错误
	
	api/addphone/number/14782593339
	
	{
		"code":200,
		"message":"\u64cd\u4f5c\u6210\u529f",
		"data":{"code":1}
	}
	

# 虚拟主机配置 （这里以apache为例）

		<VirtualHost *>
			#ServerAdmin admin@newyiban
			DocumentRoot "F:/XAMPP/htdocs/armani/app"
			ServerName www.armani.cc
			DirectoryIndex index.php
			
			<Directory "F:/XAMPP/htdocs/armani/app">
				Options FollowSymLinks
				AllowOverride All
				Order deny,allow
				Allow from all
				</Directory>
		
			RewriteEngine on 
			
			ErrorLog logs/newcalendar-error_log
			 
			RewriteCond %{DOCUMENT_ROOT}%{REQUEST_FILENAME} !-f
				RewriteRule ^/admin/(.*)$ /admin/index.php [L]
		
				RewriteCond %{DOCUMENT_ROOT}%{REQUEST_FILENAME} !-f
				RewriteRule ^/(.*)$ /index.php [L]
		</VirtualHost>

