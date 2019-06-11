<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = "author";

    protected $primaryKey = "author_id";

    public $fillable = ["author_name","active"];
}
