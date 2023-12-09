<?php

namespace App\Models;

use App\Models\GroupMembers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table='groups';

    public function supervisors(){
        return $this->hasMany(Supervisor::class,'id','supervisor_id');
    }
    public function groupMembers(){
        return $this->hasMany(GroupMembers::class);
    }
    public function thesises(){
        return $this->belongsTo(Thesis::class);
    }
   
}
