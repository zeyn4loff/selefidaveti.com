<?php

namespace App\Repositories\Admin\Contact;

interface ContactRepositoryInterface
{
    public function getData();

    public function update($data);

}
