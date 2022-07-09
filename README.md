# Welcome to Webapp Blog Yii PHP Framework 

# 1. Configuration requirements

    - Version PHP 7.2, 7.4
    - OpenSSL PHP Extension

# 2. Technology
- PHP language (Yii PHP Framework)
- Using MVC model
- Javascript (Jquery, Bootstrap,...)

# 3. Feature



# 4. Edit Connect Database

You need to change the connection information to the database if you want to store and use data for the website.

Path: [`/config/database.php`](https://github.com/tanhongit/Webapp_Blog_Yii_PHP/tree/main/protected/config)

Change **dbname**, **dbuser**, **dbpass**, **dbhost** to your database information.

```php
return array(
    'connectionString' => 'mysql:host=localhost;dbname=webapp_blog_yii_php',
    'emulatePrepare' => true,
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
    'tablePrefix' => 'tbl_',
);
```

# 5. Change SMTP Mail (phpmailer information)

>You need to change the information about SMTP Mail to be able to use some functions about user account authentication, change passwords, notify users, ...

1. Go to [`/protected/libs`](https://github.com/tanhongit/Webapp_Blog_Yii_PHP/tree/main/protected/libs)
2. Create **setting_mail.php** file from **setting_mail_copy.php** file in the folder libs (copy setting_mail_copy.php to setting_mail.php)
3. Change the information about SMTP Mail:

```php
define('SMTP_HOST','smtp.gmail.com');
define('SMTP_PORT','465');
define('SMTP_UNAME','add_your_mail');
define('SMTP_PWORD','add_your_application_password_from_your_mail');
```

Change the value of the constant **SMTP_UNAME** and **SMTP_PWORD** to match the configuration you added on your Gmail.
- add_your_mail: Your email address
- add_your_application_password_from_your_mail: Get Your application password from your email

Tips: https://support.google.com/accounts/answer/185833?hl=en

# 6. Install and using ssl certificate

Using **mkcert** to create ssl certificate

### On Ubuntu

```shell
sudo apt install libnss3-tools

sudo wget https://github.com/FiloSottile/mkcert/releases/download/v1.4.3/mkcert-v1.4.3-linux-amd64 && \
sudo mv mkcert-v1.4.3-linux-amd64 mkcert && \
sudo chmod +x mkcert && \
sudo cp mkcert /usr/local/bin/
```

Now that the mkcert utility is installed, run the command below to generate and install your local CA:

```shell
mkcert -install
```

### Create ssl certificate for this project

Run:

```shell
cd /var/www/certs
mkcert local.webapp_blog_yii_php.com
```

### Update configuration

Change **local.webapp_blog_yii_php.com.conf** file (/apache2/sites-available/ to this)

```
<VirtualHost *:80>
	ServerAdmin localserver@localhost
	ServerName local.webapp_blog_yii_php.com
	ServerAlias www.webapp_blog_yii_php.vdx.com
	DocumentRoot /var/www/webapp_blog_yii_php
	ErrorLog /var/www/logs/error-webapp_blog_yii_php.log
    CustomLog /var/www/logs/access-webapp_blog_yii_php.log combined
</VirtualHost>

<VirtualHost *:443>
    ServerAdmin localserver@localhost
    ServerName local.webapp_blog_yii_php.com
    ServerAlias www.local.webapp_blog_yii_php.com
    DocumentRoot /var/www/webapp_blog_yii_php

    ErrorLog /var/www/logs/error-webapp_blog_yii_php.log
    CustomLog /var/www/logs/access-webapp_blog_yii_php.log combined

    SSLEngine on
	SSLCertificateFile /var/www/certs/local.webapp_blog_yii_php.com.pem
	SSLCertificateKeyFile /var/www/certs/local.webapp_blog_yii_php.com-key.pem

    <Directory /var/www/webapp_blog_yii_php>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

# Demo

When done, you can test the website by opening the browser and typing the following URL:

Admin account:
```text
username: admin
password: admin
```

Frontend some demo URLs:
```text
APP_URL/category/list/2
APP_URL/contact
APP_URL/product/list/2
APP_URL/post/view/post-1
...
```

Backend Admin Manager URLs:
```text
APP_URL/admin/slug/
APP_URL/admin/product/
APP_URL/admin/post/
APP_URL/admin/category/
APP_URL/admin/tag/
```

![2022-07-09_100848](https://user-images.githubusercontent.com/35853002/178089397-909c5dff-f45b-422d-a53d-59975bfc4c8d.png)
