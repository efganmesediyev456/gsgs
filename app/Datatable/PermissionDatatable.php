<?php

namespace App\Datatable;

use App\Models\Entities\Contact;
use App\Models\Gopanel\Admin;
use \Illuminate\Database\Eloquent\Builder;
use Spatie\Permission\Models\Permission;

class PermissionDatatable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct(Permission::class, [
            'id'                       => 'ID',
            'description'              => 'Ad',
            'name'                     => 'key',
            'created_at'               => 'Yaradılma tarixi'
        ], [
            [
                'title'                => 'Əməliyyatlar',
                'type'                 => "functional",
                'view'                 => function ($item) {

                    return
                        delete_btn($item->id, Permission::class) .
                        edit_btn(route("gopanel.permission.get.form", $item), $item->id, ['class' => ['edit-permission']]);
                }
            ]
        ]);
    }

    protected function query(): Builder
    {
        return $this->baseQueryScope();
    }
}
