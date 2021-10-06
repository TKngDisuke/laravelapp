<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = array('id');
    public $timestamps = false;
    protected $fillable = [
        'image',
        ];
    public static $rules = array(
       'name' => 'required',
       'price' => 'integer|min:0|max:10000',
       'type' => 'integer|min:0|max:200',
    );
    public function getData()
    {
       return $this->name . ' (' 
          . $this->price . '円タイプ '.$this->type .')';
    }
    use HasFactory;
}
