<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Symptom;
class Disease extends Model
{
    public function symptoms()
    {
    	return $this->belongsToMany('App\Symptom','diseases_symptoms','disease_id','symptom_id');
    }
}
