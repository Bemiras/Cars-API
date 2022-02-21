<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CarsController extends Controller
{
    public function addCar(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|string|max:10'
        ]);

        $car = Cars::create($request->all())->toJson(JSON_PRETTY_PRINT);
        return response($car,201);
    }

    public function updateCar(Request $request, $id)
    {
        $car = Cars::find($id);
        $car->update($request->all());
        return response($car,200);
    }

    public function destroyCar($id){
        $car = Cars::find($id);
        $car->delete();
        return response(null,204);
    }

    public function listCars(){
        $cars = Cars::get()->toJson(JSON_PRETTY_PRINT);
        return response($cars, 200);
    }

    public function firstBigUppercase(){
        $Car = DB::table('cars')
            ->where('type',"big")
            ->first();

        return response()->json([
                'id' => $Car->id,
                'name' => Str::upper($Car->name),
                'type' => $Car->type,
                'created_at' => $Car->created_at,
                'updated_at' => $Car->updated_at
            ]
            ,200);
    }

    public function firstBigLowercase(){
        $Car = DB::table('cars')
            ->where('type',"big")
            ->first();

        return response()->json([
                'id' => $Car->id,
                'name' => Str::lower($Car->name),
                'type' => $Car->type,
                'created_at' => $Car->created_at,
                'updated_at' => $Car->updated_at
            ]
        ,200);
    }

    public function destroyFirstBig(){
        $firstBig = DB::table('cars')
            ->where('type',"big")
            ->take(1)
            ->delete();

        return response(null,204);
    }

}
