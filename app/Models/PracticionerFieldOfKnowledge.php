<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticionerFieldOfKnowledge extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['practicioner_id', 'field_of_knowledge_id'];
}
