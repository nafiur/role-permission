<?php

namespace App\Models;

use App\Models\Domain;
use App\Models\Sector;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Zone extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function sector(){
        return $this->belongsTo(Sector::class,'sector_id','id');
    }
    public function domain(){
        return $this->belongsTo(Domain::class,'domain_id','id');
    }
}
