<?php

namespace App\Datatable;

use App\Models\Entities\City;
use App\Models\Entities\Partner;
use App\Models\Entities\Slider;
use App\Models\Gopanel\Entities\SosialLink;
use Illuminate\Database\Eloquent\Builder;

class PartnerDatatable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct(Partner::class, [
            'id'             => 'ID',
            'imageview'      => 'Şəkil',
            'statusview'     => 'Status',
            'created_at'     => 'Yaradılma tarixi'
        ], [
            [
                'title' => 'Əməliyyatlar',
                'type'  => "functional",
                'view'  => function ($item) {
                    return
                        delete_btn($item->id, Partner::class) .
                        edit_btn(route("gopanel.partners.updateOrSave", $item->id), $item->id, ['class' => ['edit-template']]);
                }
            ]
        ]);
    }

    protected function query(): Builder
    {
        $query =  $this->baseQueryScope();
        if($this->getSearchInput()){
            $searchInput = strtolower($this->getSearchInput());
            $query->whereRaw('LOWER(image) LIKE ?', ['%' . $searchInput . '%']);
        }
        return $query;
    }


}
