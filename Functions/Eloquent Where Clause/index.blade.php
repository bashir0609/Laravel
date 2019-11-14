<div class="row">
  <div class="col-6">
    <ul>
      @foreach($activeCustomers as $activeCustomer)
        <li>{{ $activeCustomers->name }} <span class="text-muted">({{$activeCustomers->email}})</span> </li>
      @endforeach
    </ul>
  </div>
</div>
<div class="row">
  <div class="col-6">
    <ul>
      @foreach($inactiveCustomers as $inactiveCustomer)
        <li>{{ $inactiveCustomer->name }} <span class="text-muted">({{$inactiveCustomer->email}})</span> </li>
      @endforeach
    </ul>
  </div>
</div>
