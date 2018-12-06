# Eneza

### How to setup
- Clone this repository `git clone https://github.com/iteearmah/Eneza.git`
- Now copy and rename the `.env.example` to `.env`
- Create a database (e.g `eneza`) in MYSQL
- Replace the following with your MYSQL database credentials;
```
DB_DATABASE=your_database_name
DB_USERNAME=your_database_name
DB_PASSWORD=your_database_password
```
- Run the command `composer install` to install project dependencies 
- Run the command `php artisan migrate` to create project tables in the database
- Run the command `php artisan passport:install` to make Oauth issue tokens
- Run the command `php artisan db:seed` to create seed data for testing
- Run the command `php artisan serve` to start the application server; usually on `http://127.0.0.1:8000`

### Testing the application
- Click on the Register link on the top right of the homepage to register
- You will be presented with a one time visible access token (to be used for the `Bearer` parameter in postman)
- Copy the token to a safe place for future use.

- Example API url 
```
http://127.0.0.1:8000/api/v1/courses
```
- You can use Postman (a REST Client)
- Use the Access Token obtained from the registeration process to access the API

### Headers for Postman
```
Authorization: Bearer [YOUR_ACCESS_TOKEN_HERE]
Accept: application/json
```
### Note
- Run the command `./vendor/bin/phpunit` to test application
- Install Sqlite module using the commands below you get the error `[Illuminate\Database\QueryException: could not find driver]  when perfoming unit test`; Below is for Linux users (I'm a linux user), but use your OS equivalent.
```
sudo apt-get install php7.2-sqlite
sudo service apache2 restart
```
