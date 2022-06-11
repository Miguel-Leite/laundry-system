<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Client extends Model
{
    use HasFactory;
    protected $table = 'clients';
    protected $fillable = ['name','email','address','phone'];

    public static function getClientClothingById(int $id)
    {
        $client = DB::select("SELECT clients.name, clients.id as client_id, clients.name FROM clients INNER JOIN clothings ON
        clothings.clients_id=clients.id WHERE clothings.id=$id LIMIT 1");
        return (count($client) > 0 ? $client[0] : $client);
    }
}
