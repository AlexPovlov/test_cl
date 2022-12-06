<?php
namespace App\ExampleValue;
use OpenApi\Attributes as OA;

#[OA\Schema(type:"object",title:"contacts data")]
class ResponseContactData
{
    #[OA\Property(title:"success",type:"boolean")]
    public $success = true;

    #[OA\Property(title:"data",type:"object",
    properties:[
        new OA\Property(property:"contacts", title:"contacts",type:"object",
        properties:[
            new OA\Property(property:"id", title:"id",type:"integer"),
            new OA\Property(property:"name", title:"name",type:"string"),
            new OA\Property(property:"phone", title:"phone",type:"string"),
            new OA\Property(property:"message", title:"message",type:"string"),
            new OA\Property(property:"finished", title:"finished",type:"integer"),
            new OA\Property(property:"created_at", title:"created_at",type:"string")
        ]
        )
    ])]
    public $data; 

    #[OA\Property(title:"message",type:"string")]
    public $message = ""; 
}