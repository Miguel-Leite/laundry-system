<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clothings extends Model
{
    use HasFactory;
    protected $table = 'clothings';
    protected $fillable = ['name','description','color','size','iron',
    'image','users_id','fabrics_id','categories_id'];
}
