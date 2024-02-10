<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ContactRequest;
use App\Repositories\Admin\Contact\ContactRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController
{
    private ContactRepositoryInterface $contactRepository;

    public function __construct(ContactRepositoryInterface $contactsRepository)
    {
        $this->contactRepository = $contactsRepository;
    }

    public function index(): View
    {
        $result = $this->contactRepository->getData();
        return view('admin.contact.index')->with(['result' => $result]);
    }

    public function update(ContactRequest $request): RedirectResponse
    {
        return $this->contactRepository->update($request->validated());
    }
}
