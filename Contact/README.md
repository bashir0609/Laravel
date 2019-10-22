web.php
--------
```
Route::get('contact', 'ContactController@create');
Route::get('contact', 'ContactController@store');
```

ContactController.php
--------------------
```
use Illuminate\Support\Mail;

public function create()
{
  return view('contact.create');
}
public function store()
{
  $data = request()->valudate([
    'name' => 'required',
    'email' => 'required|email',
    'message' => 'required',
  ]);
  
  Mail::to('test@test.com')->send(new ContactMail($data));
  
  Return redirect('contact')->with('message', 'Thanks for your message, We will be in touch.');
  
}
```

contact\create.blade.php
----------------------------
```
<form action="/contact" method="POST">
@csrf
  name
  email
  message
  btn
</form>
```
layouts\app.blade.php
---------------------
```
@if(session()->has('message'))
  <div class="alert alert-success" role="alert">
    <strong>Success</strong> {{ session()->get('message') }}
  </div
@endif
```

Craete Mailable Class
------------
```
php artisan make:mail ContactMail --markdown=emails.contact.contact-from
```

.env
--------
```
MAIL_USERNAME= your username
MAIL_PASSWORD= your password
```

emails\contact\contact-from.blade.php
-------------------------------------
```
@component('mail::message')

#Thank you for your message

<strong>Name</strong> {{$data['name'] }}
<strong>Email</strong> {{$data['email'] }}
<strong>Message</strong> {{ $date['message'] }}

@endcomponent
```
