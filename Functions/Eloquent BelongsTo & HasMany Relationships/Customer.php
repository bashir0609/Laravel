<?php
class Customer extends Model
{
  protected $guarded = [];
  
  public function company()
  {
    return $this->belongsTo(Company::class);
  }
}
