<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddChurch extends Model
{
    protected $table = 'add_church';

    protected $fillable = [
        'chcode',
        'churchname',
        'churchaddress'
    ];
}
