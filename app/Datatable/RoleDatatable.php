<?php

namespace App\Datatable;

use Illuminate\Database\Eloquent\Builder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleDatatable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct(Role::class, [
            'id'                       => 'ID',
            'name'              => 'Ad',
            'created_at'               => 'Yaradılma tarixi'
        ], [
            [
                'title'                => 'Əməliyyatlar',
                'type'                 => "functional",
                'view'                 => function ($item) {

                    return
                        delete_btn($item->id, Role::class) .
                        edit_btn(route("gopanel.role.save", $item), $item->id, ['class' => ['edit-role']]);
                }
            ]
        ]);
    }

    protected function query(): Builder
    {
        return $this->baseQueryScope();
    }
}
