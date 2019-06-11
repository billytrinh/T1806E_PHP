<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nxb extends Model
{
    protected $table = "nxb";

    protected $primaryKey = "nxb_id";

    public $fillable = ["nxb_name","active"];
}
