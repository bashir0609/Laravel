
    public function index()
    {
        $activeCustomers = Customer::where('active', 1)->get();
        $inactiveCustomers = Customer::where('active', 0)->get();
        $companies = Company::all();

        return view('customers.index', compact($activeCustomers, $inactiveCustomers, $companies));
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
    
