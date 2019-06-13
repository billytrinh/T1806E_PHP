<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = "author";

    protected $primaryKey = "author_id";

    public $fillable = ["author_name","active"];

    public function oneBook(){
        return $this->hasOne("App\Book","author_id");
    }

    public function getBooks(){
        return $this->hasMany("App\Book","author_id");
    }

    public function getNxbs(){
        return $this->hasManyThrough("App\Nxb","App\Book",
            "nxb_id","nxb_id","author_id");
    }
}
