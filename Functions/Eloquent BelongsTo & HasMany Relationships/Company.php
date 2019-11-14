<?php
class Customer extends Model
{
  protected $guarded = [];

  public function customer()
  {
    return $this->hasMany(Customer::class);
  }
}
