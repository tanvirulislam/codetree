<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    public function brandInfo()
   {
   	return $this->belongsTo('App\Models\Brand','brand');
   }

   public function categoryInfo()
   {
   	return $this->belongsTo('App\Models\Category','category');
   }
    public function unitInfo()
   {
   	return $this->belongsTo('App\Models\Unit','unit');
   }
   public function stockInfo()
   {
      return $this->belongsTo('App\Models\Stock','id','pro_id');
   }
   public function supplierInfo()
   {
      return $this->belongsTo('App\Models\Supplier','supplier','id');
   }
}
