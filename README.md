# armani

echo # armani >> README.md
git init
git add README.md
git commit -m "first commit"
git remote add origin git@github.com:fangtoby/armani.git
git push -u origin master


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

