<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index():  {
        $cars= Car::all();
        $cars = Car::select(columns: ['id','brand'])->get();
        dd(vars: $cars);

        //['name' => 'jerome']
    }
    public function show(int $id): void{
      $cars = Car::select(columns: ['id','brand'])->where(coloumn: 'id', operator: '=', value: '$id')->first();
      $car = Car::find(id: $id);
      dd(vars: $cars);
    }
}
