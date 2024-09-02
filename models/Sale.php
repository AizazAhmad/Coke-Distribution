<?php
 
namespace Models;
 
use \Illuminate\Database\Eloquent\Model;
 
class Sale extends Model {
     
    protected $table = 'secondarysale';
	public $timestamps = false;
	
	public function subProduct() {
        return $this->belongsTo('Models\SubProduct', 'SubProductId');
    }
     
}
 
?>