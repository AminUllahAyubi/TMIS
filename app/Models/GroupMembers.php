<?php

namespace App\Models;

use App\Models\Group;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GroupMembers extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function group(){
        return $this->belongsTo(Group::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }
   
}
