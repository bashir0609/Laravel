<div class="row">
  <div class="col-6">
    <ul>
      @foreach($activeCustomers as $activeCustomer)
        <li>{{ $activeCustomers->name }} <span class="text-muted">({{$activeCustomers->company->name}})</span> </li>
      @endforeach
    </ul>
  </div>
</div>
<div class="row">
  <div class="col-6">
    <ul>
      @foreach($inactiveCustomers as $inactiveCustomer)
        <li>{{ $inactiveCustomer->name }} <span class="text-muted">({{$inactiveCustomer->company->name}})</span> </li>
      @endforeach
    </ul>
  </div>
</div>

<div class="row">
  <div class="col-6">
    @foreach($cpmanies as $company)
      <h3>{{ $company->name }}</h3>
      <ul>
        @foreach($company->Customers as $customer)
          <li>{{$customer->name}} </li>
        @endforeach
      </ul>
    @endforeach
  </div>
</div>
