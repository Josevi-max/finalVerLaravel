<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserValoration extends Model
{
    use HasFactory;
    protected $table = 'user_valorations';

    protected $fillable = [
        'comments',
        'preliminaryChecks',
        'installationVehicle',
        "incorporationCirculation",
        "normalProgression",
        "sideShift",
        "overTaking",
        "intersections",
        "changeDirection",
        "stops",
        "parking",
        "obedienceSigns",
        "lights",
        "controlsOperation",
        "otherControls",
        "safeDriving",
        "teacherId",
        "studentId"
        
    ];
    
}
