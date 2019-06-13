<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "order";

    protected $primaryKey = "order_id";

    public function getProducts(){
        return $this->belongsToMany("App\Product","product_order",
            "order_id","product_id")->withPivot("qty");
    }
}
