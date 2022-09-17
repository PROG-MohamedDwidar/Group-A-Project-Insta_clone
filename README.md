# Group-A-Project
Instagram clone with many shared functionalities such as adding posts, following people, etc  
This is a group project For a summer training with ITI 

# steps to run: 
## 1.download full project and place it somewhere safe 
## 2.Run composer install  
## 3.Create a database for the project (eg: laravel)
## 4.rename ".env.example" to ".env"  
## 5.Run php artisan key:generate  
## 6.fill your data in the .env file
   6.1. fill database data  
   6.2. change the APP_URL from localhost to localhost:8000  
   6.3. fill email data that the software can send emails from if you don't have one remove any "->middleware()" function from routes\web.php  
## 6.Run php artisan migrate  
## 7.Run php artisan serve  
## 8.Run npm install  
## 9.Run npm run dev  
## 10.Run php artisan storage:link  
## 11.Run php artisan queue:work





