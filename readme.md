Steps to run the project
=========================

1) Git clone the project
2) Create a database in your localhost and update the credentials in the .env file
3) Import the sql("webuycart_db.sql") file present in the project
4) Run the command "composer install" in the project directory
5) Run the project by going to the project directory by running the below command
 
 php artisan serve

6) Also generate the encryption key by running the command 

php artisan key:generate


Flow of the project : 

User End : 

http://127.0.0.1/user

1) User Signup
2) Once signup is done, login using the credentials
3) List of products are displayed, add anyone to the cart.
4) Now click on checkout
5) Enter shipping address and click on confirm order.


Admin End : 

http://127.0.0.1/admin

1) Login using the credentials (used while signup)
2) Add category
3) Add product
4) View Orders
5) URL for API response "127.0.0.1/orders"