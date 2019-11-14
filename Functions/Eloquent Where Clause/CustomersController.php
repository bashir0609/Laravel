```
    public function store()
    {
        $customer = Customer::create($this->validateRequest());
        return redirect('customers');
    }
    
    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
        ]);
    }
```
