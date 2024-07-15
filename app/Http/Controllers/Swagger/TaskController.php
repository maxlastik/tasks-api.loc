<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use OpenApi\Annotations as OA;

/**
 * @OA\Get(
 *      path="/api/tasks",
 *      summary="Get List of Tasks",
 *      tags={"Task"},
 *
 *      @OA\Parameter(
 *            name="status",
 *            description="Status",
 *            required=false,
 *            in="query",
 *            example=0
 *      ),
 *
 *     @OA\Parameter(
 *             name="due_date",
 *             description="Due date",
 *             required=false,
 *             in="query",
 *             example="year"
 *     ),
 *
 *      @OA\Response(
 *          response=200,
 *          description="OK",
 *          @OA\JsonContent(
 *               @OA\Property(property="data", type="array", @OA\Items(
 *                    @OA\Property(property="id", type="integer", example=1),
 *                    @OA\Property(property="title", type="string", example="New Title"),
 *                    @OA\Property(property="description", type="string", example="Some Description here"),
 *                    @OA\Property(property="status", type="integer", example=0),
 *                    @OA\Property(property="due_date", type="string", example="2024-08-04 13:33:03"),
 *                    @OA\Property(property="created_at", type="string", example="2024-08-01 13:33:03"),
 *               )),
 *          )
 *      )
 *  ),
 *
 *
 * @OA\Get(
 *       path="/api/tasks/{task}",
 *       summary="Get Task Information",
 *       tags={"Task"},
 *
 *      @OA\Parameter(
 *           name="task",
 *           description="Task id",
 *           required=true,
 *           in="path",
 *           example=1
 *       ),
 *
 *       @OA\Response(
 *           response=200,
 *           description="OK",
 *           @OA\JsonContent(
 *               @OA\Property(property="data", type="object",
 *                   @OA\Property(property="id", type="integer", example=1),
 *                   @OA\Property(property="title", type="string", example="New Title"),
 *                   @OA\Property(property="description", type="string", example="Some Description here"),
 *                   @OA\Property(property="status", type="integer", example=0),
 *                   @OA\Property(property="due_date", type="string", example="2024-08-04 13:33:03"),
 *                   @OA\Property(property="created_at", type="string", example="2024-08-01 13:33:03"),
 *               )
 *          )
 *       )
 *   ),
 *
 *
 * @OA\Post(
 *     path="/api/tasks",
 *     summary="Store New Task",
 *     tags={"Task"},
 *
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="title",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="description",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                      property="status",
 *                      type="integer"
 *                  ),
 *                 @OA\Property(
 *                      property="due_date",
 *                      type="string"
 *                  ),
 *                 example={"title": "New Title", "description": "Some Description here", "status": 0, "due_date": "2024-08-04 13:33:03"}
 *             )
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *              @OA\Property(property="data", type="object",
 *                  @OA\Property(property="id", type="integer", example=1),
 *                  @OA\Property(property="title", type="string", example="New Title"),
 *                  @OA\Property(property="description", type="string", example="Some Description here"),
 *                  @OA\Property(property="status", type="integer", example=0),
 *                  @OA\Property(property="due_date", type="string", example="2024-08-04 13:33:03"),
 *                  @OA\Property(property="created_at", type="string", example="2024-08-01 13:33:03"),
 *              )
 *         )
 *     )
 * ),
 *
 */
class TaskController extends Controller
{

}
