<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="API RESTful Laravel",
 *     version="1.0.0",
 *     description="API RESTful com autenticação JWT e operações CRUD para produtos",
 *     @OA\Contact(
 *         email="contato@exemplo.com",
 *         name="Suporte API"
 *     )
 * )
 *
 * @OA\SecurityScheme(
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     securityScheme="bearerAuth"
 * )
 *
 * @OA\Server(
 *     url="/",
 *     description="Servidor Local"
 * )
 */
abstract class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
