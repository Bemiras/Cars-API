<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @OA\Schema(
 *     title="Model",
 *     description="Cars model",
 *     @OA\Xml(
 *         name="Cars"
 *     )
 * )
 */
class Cars extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'type'
        ];

    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *      title="Name",
     *      description="Name of car",
     *      example="Toyota"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="Type",
     *      description="Type of car",
     *      example="big"
     * )
     *
     * @var string
     */
    public $type;

    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;
}
