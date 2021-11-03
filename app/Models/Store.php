<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $guarded = array('id');
    public $timestamps = false;
    public static $rules = array(
       'name' => 'required',
       'adress' => 'required|string',
       'time' => 'required|string',
       'phone' => 'required|string|digits_between:8,11',
       'MOtime' => 'required|string',
       'audience_seat' => 'required|integer',
       'parking' => 'required|integer',
       'others' => 'string',
    );
    public function getData()
    {
       return $this->name . ' (住所:' 
          . $this->adress .'営業時間: '.$this->time . '電話番号: '.$this->phone . 'モバイルオーダー対応時間:'.$this->MOtime . '客席数: '.$this->audience_seat .
          '駐車場台数:'.$this->parking . 'その他:'.$this->others .')';
    }


    public function showStore()
   {
       $data['stores'] = $this->get();
       return $data;
   }
    use HasFactory;
}
   