```
    public function store()
    {
        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
        ]);

        $customer = new Customer();
        $customer->name => request('name'),
        $customer ->email => request('email'),
        $customer->active => requet('active'),
        $customer->save();

        return redirect('customers');
    }
    
```
