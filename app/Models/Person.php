<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Scopes\ScopePerson;

class Person extends Model
{
   protected $guarded = array('id');
   public $timestamps = false;
   public static $rules = array(
      'name' => 'required',
      'mail' => 'email',
      'age' => 'integer|min:0|max:150'
   );

   // getDataは残しておく
   public function getData()
   {
      return $this->id . ': ' . $this->name . ' (' . $this->age . ')';
   }
   public function board()
{
   return $this->hasOne('App\Models\Board');
}
public function boards()
{
   return $this->hasMany('App\Models\Board');
}
public function scopeAgeGreaterThan($query, $n)
{
   return $query->where('age','>=', $n);
}

public function scopeAgeLessThan($query, $n)
{
   return $query->where('age', '<=', $n);
}


}

