# Laravel
Laravel

1. Contact Page

2. User with defined access

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
