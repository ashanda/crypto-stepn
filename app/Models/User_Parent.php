<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Parent extends Model
{
    use HasFactory;
    protected $primaryKey = 'uid';
    protected $fillable = [
        'parent_id',
        'ref_s',
        
    ];

    
}
