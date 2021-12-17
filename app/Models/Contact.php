<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'contact_name','contact_email','contact_phone','contact_notes'
    ];
    protected $primaryKey = 'contact_id';
    protected $table = 'contact';
}
