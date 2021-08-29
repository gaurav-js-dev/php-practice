# PHP Blog Application

**This a simple web blog with an Admin dashboard from which admin can create, edit and delete the blog posts including adding images and text content. Audience can navigate and view the post and also use contact form to send queries. This blog utilizes mainly PHP, MySQL for functionality .**

This applications includes various features as below

- CRUD functionality with MYSQl database

- Image upload storage, handling & deletion.

- Authentication with secure storage of credentials.

- Pagination

- PHPMailer library for contact form.

## Demo (Live Site)

[Click Here to see version of Blog](http://blogger.com/)

To access the admin area use following credentials

username : **dave**  
password : **secret**

## Local usage instructions

To run this project locally please clone this repo on your machine then add your own Database configuration details in **config.php** in root folder. Please create a MY SQL database of same name you have mentioned as DB name in config file.

define('DB_HOST', **'your DB host'**);  
define('DB_NAME', **'database name'**);  
define('DB_USER', **'your DB username'**);  
define('DB_PASS', **'your DB password'**);

define('SMTP_HOST', 'mail.example.com');  
define('SMTP_USER', 'user@example.com');  
define('SMTP_PASS', 'secret pass');
