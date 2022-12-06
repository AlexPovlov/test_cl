<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Traits\RespondsWithHttpStatus;
use App\Http\Requests\Api\ContactUpdateRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;

use OpenApi\Attributes as OA;

class ContactController extends Controller
{
    use RespondsWithHttpStatus;
    
    #[OA\Get(path: '/contacts',tags:['Contacts'], security:[['sanctum'=>[]]],description:"Получение всех заявок")]
    #[OA\Response(response: '200', description: 'The data', content: new OA\JsonContent(ref:"#/components/schemas/ResponseContactData"))]
    public function index()
    {
        $contacts = Contact::all();
        return $this->success(['contacts' => ContactResource::collection($contacts)]);
    }

    #[OA\Get(path: '/contacts/finished',tags:['Contacts'], security:[['sanctum'=>[]]],description:"Получение всех законченных или не законченных заявок")]
    #[OA\Parameter(parameter:'finished',name:"finished",description:"Get параметр для сортировки заявок",required:true,in:"query",example:1)]
    #[OA\Response(response: '200', description: 'The data', content: new OA\JsonContent(ref:"#/components/schemas/ResponseContactData"))]
    public function get_finished(Request $request)
    {

        $validated = validator($request->all(), ['finished'=>['required','boolean']])
            ->validated();
        $contacts = Contact::finished($validated['finished'])->get();
        return $this->success(['contacts' => ContactResource::collection($contacts)]);
    }

    
    #[OA\Get(path: '/contacts/get-deleted',tags:['Contacts'], security:[['sanctum'=>[]]],description:"Получение всех удаленых заявок")]
    #[OA\Response(response: '200', description: 'The data', content: new OA\JsonContent(ref:"#/components/schemas/ResponseContactData"))]
    public function get_deleted()
    {
        $contacts = Contact::withTrashed()->whereNotNull('deleted_at')->get();
        return $this->success(['contacts' => ContactResource::collection($contacts)]);
    }

   
    #[OA\Get(path: '/contacts/get/{phone}',tags:['Contacts'], security:[['sanctum'=>[]]],description:"Получение всех заявок по номеру")]
    #[OA\Parameter(parameter:'phone',name:"phone",description:"Url параметр для сортировки заявок по номеру",required:true,in:"path",example:7900)]
    #[OA\Response(response: '200', description: 'The data', content: new OA\JsonContent(ref:"#/components/schemas/ResponseContactData"))]
    public function get_by_number($phone)
    {
        $contacts = Contact::bynumber($phone)->get();
        
        return $this->success(['contacts' => ContactResource::collection($contacts)]);
    }

    #[OA\Get(path: '/contacts/{id}',tags:['Contacts'], security:[['sanctum'=>[]]],description:"Получение одной заявки")]
    #[OA\Parameter(parameter:'id',name:"id",description:"Url параметр для получения заявки по id",required:true,in:"path",example:1)]
    #[OA\Response(response: '200', description: 'The data', content: new OA\JsonContent(ref:"#/components/schemas/ResponseContactData"))]
    public function show(Contact $contact)
    {
        return $this->success(['contact' => new ContactResource($contact)]);
    }

    #[OA\Put(path: '/contacts/{id}',tags:['Contacts'], security:[['sanctum'=>[]]],description:"Редактирование заявки")]
    #[OA\Parameter(parameter:'id',name:"id",description:"Url параметр id заявки",required:true,in:"path",example:1)]
    #[OA\RequestBody(content: new OA\JsonContent(ref:"#/components/schemas/RequestUpdateContact"))]
    #[OA\Response(response: '200', description: 'The data', content: new OA\JsonContent(ref:"#/components/schemas/ResponseContactData"))]
    public function update(ContactUpdateRequest $request, Contact $contact)
    {
        $validate = $request->validated();
        $contact->update($validate);
        return $this->success(['contact' => new ContactResource($contact)]);
    }

    
    #[OA\Put(path: '/contacts/{id}/finished',tags:['Contacts'], security:[['sanctum'=>[]]],description:"Пометка заявки что она закончена")]
    #[OA\Parameter(parameter:'id',name:"id",description:"Url параметр id заявки",required:true,in:"path",example:1)]
    #[OA\Response(response: '200', description: 'The data', content: new OA\JsonContent(ref:"#/components/schemas/ResponseContactData"))]
    public function set_finished(Contact $contact)
    {
        $contact->update(['finished'=>true]);
        return $this->success(['contact' => new ContactResource($contact)]);
    }

   
    #[OA\Delete(path: '/contacts/{id}',tags:['Contacts'], security:[['sanctum'=>[]]],description:"Пометка заявки что она удалена")]
    #[OA\Parameter(parameter:'id',name:"id",description:"Url параметр id заявки",required:true,in:"path",example:1)]
    #[OA\Response(response: '200', description: 'The data', content: new OA\JsonContent(ref:"#/components/schemas/ResponseContactData"))]
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return $this->success();
    }

    #[OA\Put(path: '/contacts/{id}/restore',tags:['Contacts'], security:[['sanctum'=>[]]],description:"Восстановление заявки")]
    #[OA\Parameter(parameter:'id',name:"id",description:"Url параметр id заявки",required:true,in:"path",example:1)]
    #[OA\Response(response: '200', description: 'The data', content: new OA\JsonContent(ref:"#/components/schemas/ResponseContactData"))]
    public function restore($id)
    {
        $contact = Contact::withTrashed()->where('id', $id)->first();

        if(!$contact->trashed())
            return $this->failure('the contact has not been deleted');

        $contact->restore();
        return $this->success(['contact' => new ContactResource($contact)]);
    }
}
