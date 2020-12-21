<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    public function client()
    {
    	return $this->belongsTo('App\Models\client');
    }
    public function doc()
    {
    	return $this->hasOne('App\Models\contract_doc');
    }
    
    
}