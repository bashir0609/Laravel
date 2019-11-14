```
    public function index()
    {
        $activeCustomers = Customer::active()->get();
        $inactiveCustomers = Customer::inactive()->get();

        return view('customers.index', compact($activeCustomers, $inactiveCustomers));
    }
    public function store()
    {
        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
        ]);

        $customer::create($data);

        return redirect('customers');
    }
    
```
