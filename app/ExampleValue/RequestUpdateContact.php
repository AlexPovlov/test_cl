<?php
namespace App\ExampleValue;
use OpenApi\Attributes as OA;

#[OA\Schema(type:"object",title:"contacts data")]
class RequestUpdateContact
{
    #[OA\Property(title:"name",type:"string",minLength:3,maxLength:255,default:"Александр")]
    public $name;

    #[OA\Property(title:"phone",type:"string",default:"79009898989")]
    public $phone; 

    #[OA\Property(title:"message",type:"string",minLength:3,maxLength:255,default:"Отредактированое сообщение")]
    public $message; 
}