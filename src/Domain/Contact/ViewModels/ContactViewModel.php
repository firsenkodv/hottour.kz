<?php

namespace Domain\Contact\ViewModels;


use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class ContactViewModel
{
    use Makeable;

    public function listContacts():Collection|array|null
    {


        $list_contacts = Cache::rememberForever('list_contacts', function () {

            return Contact::query()
                ->get_contacts()
                ->get();
        });


        return $list_contacts;


    }



}
