create_customers_table.php
--------------------------
```
public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->timestamps();
        });
    }
```
CustomersController.php
-----------------------
```
<?php
namespace App\Http\Controllers;
use App\Customer;
use Illuminate\Http\Request;
class CustomersController extends Controller
{
    public function list()
    {
        $customers = Customer::all();
        return view('customers.create', compact('customers'));
    }
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            ]);
        Customer::create($data);
        
        return back()->with('status', 'Customer Added Successfully!');
    }
}
```
customer.php
------------
```
protected $fillable = [ 'name', 'email', ];
```
web.php
-------
```
Route::get('customer', 'customersController@list');
Route::post('customer', 'customersController@store');
```
