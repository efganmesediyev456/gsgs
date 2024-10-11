<?php

namespace App\Datatable;

use App\Models\Entities\City;
use App\Models\Entities\Feature;
use App\Models\Entities\Slider;
use App\Models\Gopanel\Entities\SosialLink;
use App\Models\Gopanel\SiteApply;
use Illuminate\Database\Eloquent\Builder;

class SiteApplyDatatable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct(SiteApply::class, [
            'id'             => 'ID',
            'email'          => 'Email',
            'created_at'     => 'Qeydiyyat tarixi'
        ], [
            [
                'title' => 'Əməliyyatlar',
                'type'  => "functional",
                'view'  => function ($item) {
                    return
                        delete_btn($item->id, SiteApply::class);
                }
            ]
        ]);
    }

    protected function query(): Builder
    {
        $query =  $this->baseQueryScope();
        if($this->getSearchInput()){
            $searchInput = strtolower($this->getSearchInput());
            $query->whereRaw('LOWER(email) LIKE ?', ['%' . $searchInput . '%']);
        }
        return $query;
    }


}
