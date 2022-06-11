<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Clothings extends Model
{
    use HasFactory;
    protected $table = 'clothings';
    protected $fillable = ['name','description','color','size','iron',
    'image','clients_id','fabrics_id','categories_id'];

    public static function getAllClothingsWithClient()
    {
        return DB::select("SELECT clothings.*, clients.name as clientname FROM clothings
        INNER JOIN clients ON clothings.clients_id=clients.id");
    }
}
