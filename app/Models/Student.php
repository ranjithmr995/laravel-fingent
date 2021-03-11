<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public $timestamps = true;
    
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    protected $fillable = [
        'name',
        'age',
        'gender',
        'teacher_id',
        'created_at'
    ];
}
