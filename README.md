# Laravel
Laravel
```
1. CRUD : General CRUD
2. Contact : Contact Form

3. User : Show All Registered Users from Database
```
Start a new project
---------------------
```
		laravel new project
		php artisan key:generate
		composer update
```
	Authentication
	------------------------
  ```
		php artisan make:auth
		(For Laravel 6.0)
		composer require laravel/ui
		php artisan ui vue --auth
```
	Migrations
	------------------------
  ```
		appserveiceprovider.php :
		use Illuminate\Support\Facades\Schema;

		class AppServiceProvider extends ServiceProvider
		{

			public function boot()
			{
			Schema::defaultStringLength(191);
			}
		}
 ```
 ```
		php artisan migrate
```
		php artisan serve
```
