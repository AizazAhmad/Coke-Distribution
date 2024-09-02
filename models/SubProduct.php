<?php
 
namespace Models;
 
use \Illuminate\Database\Eloquent\Model;
 
class SubProduct extends Model {
     
    protected $table = 'sub_product';
	public $timestamps = false;
	
	public function product() {
        return $this->belongsTo('Models\Product', 'ProductId');
    }
    
    public function loadouts() {
	return $this->hasMany('Models\Loadout', 'SubProductId');
}

public function sales() {
	return $this->hasMany('Models\Sale', 'SubProductId');
}

     
}
 
?>