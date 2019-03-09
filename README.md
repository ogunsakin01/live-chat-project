### Live Chat App

#### Introduction
Live chat app is built off the tutorial **[BUILD A CHAT APP WITH LARAVEL](https://pusher.com/tutorials/chat-laravel/)** by Chimezie Enyinnaya. 

#### Quick Start
To load in your php dependencies
````
$ cd live-chat
$ composer install
````

 Once this is complete. Copy your .env.example file to .env and update the following accordingly
 
 ````
DB_CONNECTION=XXXXX
DB_HOST=XXXXX
DB_PORT=XXXXXX
DB_DATABASE=XXXXXXX
DB_USERNAME=XXXXXXXX
DB_PASSWORD=XXXXXXX
````
Don't forget to replace the Xs with you actual value then proceed to generate a key for your laravel project

````
$ php artisan key:generate
````

This chat app makes use of pusher, so you will need to create an account on **[pusher](https://pusher.com/signup)**. Create a new app once you login and update your .env file with your app info

````
PUSHER_APP_ID=XXXXXX
PUSHER_APP_KEY=XXXXXXX
PUSHER_APP_SECRET=XXXXXXX
PUSHER_APP_CLUSTER=XXXX
````

Don't forget to replace the Xs with the actual data. When all this has been done, you then proceed to running your migration command

````
$ php artisan migrate
````

Once the migration is successful, we need to load in our node_modules. To do this, we run the code below
````
$ npm install
````

Once the node modules have been installed then we can proceed to compiling our chat app using Laravel Mix 
````
$ npm run build
````

Now we can start our chat app by

````
$ php artisan serve
````


