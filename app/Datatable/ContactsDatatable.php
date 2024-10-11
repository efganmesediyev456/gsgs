<?php

namespace App\Datatable;

use App\Models\Entities\Contact;
use \Illuminate\Database\Eloquent\Builder;

class ContactsDatatable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct(Contact::class, [
            'id'                       => 'ID',
            'phone'                    => 'Telefon Nömrəsi',
            'working_hours'            => 'İş saatları',
            'email'                    => 'Email',
            'created_at'               => 'Qeydiyyat tarixi'
        ], [
            [
                'title'                => 'Əməliyyatlar',
                'type'                 => "functional",
                'view'                 => function ($item) {
                     return
                        edit_btn(route("gopanel.contacts.get.form", $item), $item->uuid, ['class' => ['edit-contact']]);
                }
            ]
        ]);
    }

    protected function query(): Builder
    {
        return $this->baseQueryScope();
    }
}
