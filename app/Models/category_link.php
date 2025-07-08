<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\links;

class category_link extends Model
{

    protected $table = 'category_link';
    protected $fillable = ['nama'];
    public $timestamps = true;


    public function links()
    {
        return $this->hasMany(related: links::class);
    }
}
