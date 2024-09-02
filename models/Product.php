<?php
 
namespace Models;
 
use \Illuminate\Database\Eloquent\Model;
 
class Product extends Model {
     
    protected $table = 'product';
	public $timestamps = false;
	
	public function products() {
	return $this->hasMany('Models\SubProducts', 'ProductId');
}
     
}
 
?>