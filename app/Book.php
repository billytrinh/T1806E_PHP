<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = "book";

    protected $primaryKey = "book_id";

    public $fillable = ["book_name","image","author_id","nxb_id","qty"];
    

   // public $timestamps = true;

    public function myAuthor(){
        return $this->belongsTo("App\Author","author_id");
    }

    public function myNxb(){
        return $this->belongsTo("App\Nxb","nxb_id");
    }

}
