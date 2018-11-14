<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    
    protected $fillable = ['name', 'email', 'website','logo'];

    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}
