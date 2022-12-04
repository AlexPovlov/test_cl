<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\RespondsWithHttpStatus;
use App\Http\Requests\Api\ContactUpdateRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    use RespondsWithHttpStatus;

    /**
     * Получение всех записей
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $contacts = Contact::all();
        return $this->success(['contacts' => ContactResource::collection($contacts)]);
    }

    /**
     * Получение обработаных и не обработаных заявок
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_finished(Request $request)
    {

        $validated = validator($request->all(), ['finished'=>['required','boolean']])
            ->validated();
        $contacts = Contact::finished($validated['finished'])->get();
        return $this->success(['contacts' => ContactResource::collection($contacts)]);
    }

    /**
     * Получение всех удаленных заявок
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_deleted()
    {
        $contacts = Contact::withTrashed()->whereNotNull('deleted_at')->get();
        return $this->success(['contacts' => ContactResource::collection($contacts)]);
    }

    /**
     * Получение заявок по номеру
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_by_number($phone)
    {
        $contacts = Contact::bynumber($phone)->get();
        
        return $this->success(['contacts' => ContactResource::collection($contacts)]);
    }

    /**
     * Получение одной заявки
     * @param Contact $contact
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Contact $contact)
    {
        return $this->success(['contact' => new ContactResource($contact)]);
    }

    /**
     * Редактирование заявки
     * @param ContactUpdateRequest $request
     * @param Contact $contact
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ContactUpdateRequest $request, Contact $contact)
    {
        $validate = $request->validated();
        $contact->update($validate);
        return $this->success(['contact' => new ContactResource($contact)]);
    }

    /**
     * Пометка записи обработанной
     * @param Contact $contact
     * @return \Illuminate\Http\JsonResponse
     */
    public function set_finished(Contact $contact)
    {
        $contact->update(['finished'=>true]);
        return $this->success(['contact' => new ContactResource($contact)]);
    }

    /**
     * Пометка записи удалённой
     * @param Contact $contact
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return $this->success();
    }

    /**
     * Восстановление заявки
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore($id)
    {
        $contact = Contact::withTrashed()->where('id', $id)->first();

        if(!$contact->trashed())
            return $this->failure('the contact has not been deleted');

        $contact->restore();
        return $this->success(['contact' => new ContactResource($contact)]);
    }
}
