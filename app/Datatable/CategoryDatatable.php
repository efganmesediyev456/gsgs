<?php

namespace App\Datatable;

use App\Models\Entities\Category;
use \Illuminate\Database\Eloquent\Builder;

class CategoryDatatable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct(Category::class, [
            'id'            => 'ID',
            'name'          => 'Ad',
            'childe_link'   => 'Alt Kateoqriyalar',
            'created_at'    => 'Qeydiyyat tarixi'
        ], [
            [
                'title' => 'Əməliyyatlar',
                'type'  => "functional",
                'view'  => function ($item) {
                    return "";
                }
            ]
        ]);
    }

    protected function query(): Builder
    {
        return $this->baseQueryScope();
    }
}
