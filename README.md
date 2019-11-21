# Laravel
```
1. CRUD : General CRUD
2. Contact : Contact Form
3. User : Show All Registered Users from Database
4. Image : Upload Image
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
app.blade.php
-------------

@if(session()->has('message'))
    <div class="alert alert-success" role="alert">
	<strong>Success</strong> {{ session()->get('message') }}
    </div
@endif
@if ($errors->all())
    <div class="alert alert-danger">
	@foreach ($errors->all() as $error)
	    <li>{{ $error }}</li>                                                        
	@endforeach
    </div>                        
@endif
```
