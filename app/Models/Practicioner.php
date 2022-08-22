<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practicioner extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['first_name', 'last_name', 'phone', 'email', 'hourly_rate', 'availability', 'cur_company', 'cur_position', 'contact_source'];
}
