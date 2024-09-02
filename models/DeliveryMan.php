<?php
 
namespace Models;
 
use \Illuminate\Database\Eloquent\Model;
 
class DeliveryMan extends Model {
     
    protected $table = 'deliveryman';
	public $timestamps = false;
	
	public function loadouts() {
	return $this->hasMany('Models\Loadout', 'DeliveryManId');
}

public function sales() {
	return $this->hasMany('Models\Sale', 'DeliveryManId');
}
     
}
 
?>