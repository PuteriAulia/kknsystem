<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = [
        'students_id',
        'major_id',
        'name',
        'phone',
        'photo',
        'status',
    ]; 

    public function majors(){
        return $this->belongsTo(Majors::class,'major_id','major_id');
    }
}
