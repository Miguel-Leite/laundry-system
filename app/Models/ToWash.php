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

    public static function getPaymantsMonthlyToDay()
    {
        $month=date('m');
        $year=date('Y');
        $sql = DB::select("select year(created_at) as year, month(created_at) as month, 
        day(created_at) as day, sum(total) as total_amount from to_washs WHERE 
        month(created_at) = {$month} AND year(created_at) = {$year}
        group by year(created_at), month(created_at), day(created_at)");
        $data=[];
        foreach ($sql as $key => $res) {
            $data[getMonth_utils($res->month)] = $res->total_amount;
        }
        $dayOfMonth = self::_dayOfMonth();
        $finally = array_replace($dayOfMonth,$data);
        return $finally;
    }

    private static function _dayOfMonth()
    {
        $months = [getMonth_utils(0) => "0"];
        for ($i=1; $i < 12; $i++) { 
            $months[getMonth_utils($i)] = "0";
        }
        return $months;
    }
}
