<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\MainStoreRequest;
use App\Models\Contact;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Выводим blade шаблон с обратной формой
     *
     * @return View
     */
    public function __invoke(): View
    {
        return view('contact');
    }

    /**
     * Сохранение данных с формы
     *
     * @param MainStoreRequest $request
     * @return RedirectResponse
     */
    public function store(MainStoreRequest $request): RedirectResponse
    {
        $validate = $request->validated();
        Contact::firstOrCreate($validate);
        return redirect()->back();
    }
}
