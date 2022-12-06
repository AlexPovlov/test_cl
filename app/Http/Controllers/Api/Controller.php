<?php

namespace App\Http\Controllers\Api;
use OpenApi\Attributes as OA;

#[OA\Info(title:"Тест",version:"1.0.0",contact: new OA\Contact(email:"sasha.povlov47@gmail.com"))]
#[OA\Tag(name:"Contacts",description:"Методы работы с заявками сайта")]
#[OA\Server(url:"http://127.0.0.1:8000/api",description:"Laravel Swagger API server")]
class Controller extends \App\Http\Controllers\Controller
{
}