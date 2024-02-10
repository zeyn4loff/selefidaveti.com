<?php

namespace App\Repositories\Admin\Contact;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;

class ContactRepository implements ContactRepositoryInterface
{

    public function getData(): Contact
    {
        return Contact::findOrFail(config('constants.FIRST_ID'));
    }

    public function update($data): RedirectResponse
    {
        $contact = Contact::findOrFail(config('constants.FIRST_ID'));
        $contact->update($data);
        return redirect()->route('admin.contact.index')->with('success', '👍 Düzəliş edildi.');
    }
}
