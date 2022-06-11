<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToWash extends Model
{
    use HasFactory;
    protected $table = 'to_washs';
    protected $fillable = ['start_date','end_date','returnned_to_the_client_date',
            'total','total_paid','users_id','clothings_id','services_id'];
}
