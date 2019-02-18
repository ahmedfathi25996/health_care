<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class AdminMessages extends Model
{
    public function user()
{
  return $this->belongsTo(User::class);
}
}
