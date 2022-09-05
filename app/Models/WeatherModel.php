<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherModel extends Model
{
    use HasFactory;

    protected $table = 'weather';
    protected $fillable = ['current'];

    protected $casts = [
    'current' => 'array'
    ];

    public function getWeather($location){

        return WeatherModel::where('location', '=', $location)->where('created_hour', '=', date('H'))->latest()->first();

    }

}
