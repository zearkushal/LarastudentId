<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    protected $table = 'studentcard';
    protected $fillable = ['name', 'address', 'dob', 'expiry_date', 'rollno', 'photo'];

}
