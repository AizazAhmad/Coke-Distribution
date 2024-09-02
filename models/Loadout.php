<?php
 
namespace Models;
 
use \Illuminate\Database\Eloquent\Model;
 
class Loadout extends Model {
     
    protected $table = 'loadout';
	public $timestamps = false;
	
	public function subProduct() {
        return $this->belongsTo('Models\SubProduct', 'SubProductId');
    }
     
}
 
?>