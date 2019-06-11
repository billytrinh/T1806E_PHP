<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = "book";

    protected $primaryKey = "book_id";

    public $fillable = ["book_name","author_id","nxb_id","qty"];
    

   // public $timestamps = true;

}
