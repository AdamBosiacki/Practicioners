<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticionerRole extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['practicioner_id', 'start_date', 'finish_date', 'name'];
}
