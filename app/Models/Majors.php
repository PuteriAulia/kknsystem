<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Majors extends Model
{
    use HasFactory;

    protected $table = 'majors';
    protected $fillable = [
        'majors_id',
        'faculty_id',
        'name',
        'status',
    ];

    public function faculties(){
        return $this->belongsTo(Faculties::class,'faculty_id', 'faculty_id');
    }
}
