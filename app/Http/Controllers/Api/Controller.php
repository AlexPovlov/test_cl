<?php

namespace App\Http\Controllers\Api;

/**
 * @OA\Info(
 *     title="Тест",
 *     version="1.0.0",
 *     @OA\Contact(
 *         email="sasha.povlov47@gmail.com"
 *     ),
 *    
 * )
 * @OA\Tag(
 *     name="Contacts",
 *     description="Апи работы с заявками сайта",
 * )
 * @OA\Server(
 *     description="Laravel Swagger API server",
 *     url="http://127.0.0.1:8000/api"
 * )
 * @OA\SecurityScheme(
 *     type="apiKey",
 *     in="header",
 *     name="Authorization",
 *     securityScheme="Authorization"
 * )
 */

class Controller extends \App\Http\Controllers\Controller
{
}