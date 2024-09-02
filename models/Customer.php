<?php
 
namespace Models;
 
use \Illuminate\Database\Eloquent\Model;
 
class Customer extends Model {
     
    protected $table = 'customer';
	public $timestamps = false;
	
	

public function sales() {
	return $this->hasMany('Models\Sale', 'CustomerId');
}
     
}
 
?>