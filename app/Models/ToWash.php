<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ToWash extends Model
{
    use HasFactory;
    protected $table = 'to_washs';
    protected $fillable = ['start_date','end_date','returnned_to_the_client_date',
            'total','total_paid','clients_id','clothings_id','services_id'];

    public static function getToWashs()
    {
        return DB::select('SELECT to_washs.*, services.name as servicename,
        clothings.name as clothingname, clients.name as clientname FROM to_washs, services, 
        clothings, clients WHERE to_washs.clients_id = clients.id');
    }
}
