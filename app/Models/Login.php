<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'customer_name','customer_email','customer_phone','customer_password'
    ];
    protected $primaryKey = 'id';
    protected $table = 'customers';
}
