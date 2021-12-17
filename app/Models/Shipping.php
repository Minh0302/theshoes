<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'shipping_name','shipping_email','shipping_phone','shipping_address_city','shipping_address_province','shipping_address_wards','shipping_address','shipping_method','shipping_notes'
    ];
    protected $primaryKey = 'shipping_id';
    protected $table = 'shipping';
    public function city(){
        return $this->belongsTo('App\Models\City','shipping_address_city','matp');
    }
    public function province(){
        return $this->belongsTo('App\Models\Province','shipping_address_province','maqh');
    }
    public function ward(){
        return $this->belongsTo('App\Models\Ward','shipping_address_wards','xaid');
    }
}
