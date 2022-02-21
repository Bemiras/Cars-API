<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

/**
 * @OA\OpenApi(
 *      @OA\Info (
 *          version="1.0",
 *          title="Laravel Cars Api Demo Documentation",
 *          description="Simple Cars Api Laravel"
 *      ),
 *     @OA\Server (
 *          url=L5_SWAGGER_CONST_HOST,
 *          description="Demo API Server"
 *      ),
 *      @OA\Tag (
 *          name="Cars",
 *          description="API Endpoints of Cars"
 *      )
 * )
 */

class CarsController extends Controller
{
    /**
     * Add Car
     * @OA\Post(
     *      path="/cars",
     *      operationId="addCar",
     *      tags={"Cars"},
     *      summary="Add new car",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema (
     *                      @OA\Property(
     *                          property="name",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="type",
     *                          type="string"
     *                      ),
     *                      example={
     *                          "name":"Toyota",
     *                          "type":"big"
     *                      }
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property (property="status", type="string", example="success"),
     *              @OA\Property (property="name", type="string", example="Toyota"),
     *              @OA\Property (property="type", type="string", example="big"),
     *              @OA\Property (property="created_at", type="number", example="2022-02-21 14:14:31"),
     *              @OA\Property (property="updated_at", type="number", example="2022-02-21 14:14:31"),
     *              @OA\Property (property="id", type="number", example=1),
     *              @OA\Property (property="message", type="string", example="Add new car success"),
     *         ),
     *       ),
     *     @OA\Response(
     *          response=422,
     *          description="Error: Unprocessable Content",
     *          @OA\JsonContent(
     *              @OA\Property (property="message", type="string", example="The name field is required"),
     *         ),
     *       ),
     *
     * )
     */
    public function addCar(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string|max:10',
        ]);

        $car = Cars::create($request->all());

        return response()->json([
            'status' => "success",
            'car' => $car,
            'message'=> "Add new car success"]
            ,Response::HTTP_CREATED);
    }

    /**
     * Update Car
     * @OA\Put(
     *      path="/cars/{id}",
     *      operationId="updateCar",
     *      tags={"Cars"},
     *      summary="Update car",
     *     @OA\Parameter (
     *          in="path",
     *          name="id",
     *          description="Car id",
     *          required=true,
     *          @OA\Schema (type="integer")
     *      ),
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema (
     *                      @OA\Property(
     *                          property="name",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="type",
     *                          type="string"
     *                      ),
     *                      example={
     *                          "name":"Toyota",
     *                          "type":"big"
     *                      }
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property (property="status", type="string", example="success"),
     *              @OA\Property (property="id", type="number", example=1),
     *              @OA\Property (property="name", type="string", example="Toyota"),
     *              @OA\Property (property="type", type="string", example="big"),
     *              @OA\Property (property="created_at", type="number", example="2022-02-21 14:14:31"),
     *              @OA\Property (property="updated_at", type="number", example="2022-02-21 14:14:31"),
     *              @OA\Property (property="message", type="string", example="Update car"),
     *         ),
     *       ),
     *     @OA\Response(
     *          response=404,
     *          description="Error: Not found",
     *          @OA\JsonContent(
     *              @OA\Property (property="message", type="string", example="No query results for model [App\\Models\\Cars] {id}"),
     *         ),
     *       ),
     *
     * )
     */
    public function updateCar(Request $request, $id)
    {
            $validated = $request->validate([
                'name' => 'string',
                'type' => 'string|max:10',
            ]);

            $car = Cars::findOrFail($id);
            $car->update($request->all());

            return response()->json([
                'status'=>"success",
                'car'=>$car,
                'message'=> "Update car"
            ],Response::HTTP_CREATED);
    }

    /**
     * Delete Car
     * @OA\Delete(
     *      path="/cars/{id}",
     *      operationId="deleteCar",
     *      tags={"Cars"},
     *     summary="Delete car",
     *      @OA\Parameter (
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema (
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response (
     *          response=201,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property (property="message", type="string", example="Delete car success"),
     *          )
     *      ),
     *     @OA\Response(
     *          response=404,
     *          description="Error: Not found",
     *          @OA\JsonContent(
     *              @OA\Property (property="message", type="string", example="No query results for model [App\\Models\\Cars] {id}"),
     *         ),
     *       ),
     * )
     */
    public function destroyCar($id){

        $car = Cars::findOrFail($id);
        $car->delete();

        return response()->json([
                'message'=>"Delete car success"
            ],Response::HTTP_CREATED);
    }

    /**
     * List of cars
     *@OA\Get (
     *     path="/cars",
     *     operationId="listCars",
     *     summary="List of cars",
     *     tags={"Cars"},
     *     @OA\Response (
     *          response=201,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property (property="id", type="number", example=1),
     *              @OA\Property (property="name", type="string", example="TOYOTA"),
     *              @OA\Property (property="type", type="string", example="big"),
     *              @OA\Property (property="created_at", type="number", example="2022-02-21 14:14:31"),
     *              @OA\Property (property="updated_at", type="number", example="2022-02-21 14:14:31"),
     *          )
     *     )
     *)
     */
    public function listCars(){
            $cars = Cars::get();

            return response()->json([
                'status' => "success",
                'car' => $cars,
                'message' => "List of cars success"
                ],Response::HTTP_CREATED);
    }


    /**
     * Get first car where type='big' name uppercase
     *@OA\Get (
     *     path="/cars/firstBigUppercase",
     *     operationId="getFirstBigUppercase",
     *     summary="Get first car for table where type=='big', name uppercase",
     *     tags={"Cars"},
     *     @OA\Response (
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property (property="id", type="number", example=1),
     *              @OA\Property (property="name", type="string", example="TOYOTA"),
     *              @OA\Property (property="type", type="string", example="big"),
     *              @OA\Property (property="created_at", type="number", example="2022-02-21 14:14:31"),
     *              @OA\Property (property="updated_at", type="number", example="2022-02-21 14:14:31"),
     *          )
     *     )
     *)
     */
    public function firstBigUppercase()
    {
        $Car = DB::table('cars')
            ->where('type', "big")
            ->first();

            return response()->json([
                    'id' => $Car->id,
                    'name' => Str::upper($Car->name),
                    'type' => $Car->type,
                    'created_at' => $Car->created_at,
                    'updated_at' => $Car->updated_at
                ]
                , 200);
    }

    /**
     * Get first car where type='big' name lowercase
     *@OA\Get (
     *     path="/cars/firstBigLowercase",
     *     operationId="getFirstBigLowercase",
     *     summary="Get first car for table where type=='big', name lowercase",
     *     tags={"Cars"},
     *     @OA\Response (
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property (property="id", type="number", example=1),
     *              @OA\Property (property="name", type="string", example="toyota"),
     *              @OA\Property (property="type", type="string", example="big"),
     *              @OA\Property (property="created_at", type="number", example="2022-02-21 14:14:31"),
     *              @OA\Property (property="updated_at", type="number", example="2022-02-21 14:14:31"),
     *          )
     *     )
     *)
     */
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
                , 200);
    }

    /**
     * Delete first car where type='big'
     * @OA\Delete(
     *      path="/cars",
     *      operationId="deleteFirstBig",
     *      tags={"Cars"},
     *     summary="Delete first car where type=='big'",
     *     @OA\Response (
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property (property="message", type="string", example="First big car delete success")
     *          )
     *      )
     * )
     */
    public function destroyFirstBig(){
        $firstBig = DB::table('cars')
            ->where('type',"big")
            ->take(1)
            ->delete();

            return response()->json([
                "message"=>"First car where type=='big' delete success"
            ],200);
    }

}
