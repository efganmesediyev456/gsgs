<?php

namespace App\Datatable;

use App\Models\Entities\City;
use App\Models\Entities\Slider;
use App\Models\Gopanel\Entities\SosialLink;
use Illuminate\Database\Eloquent\Builder;

class SliderDatatable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct(Slider::class, [
            'id'             => 'ID',
            'title'          => 'Ad',
            'created_at'     => 'Yaradılma tarixi',
            'statusview'     => 'Status',
            'staticview'     => 'Sağ küncdə göstər',
        ], [
            [
                'title' => 'Əməliyyatlar',
                'type'  => "functional",
                'view'  => function ($item) {
                    return
                        delete_btn($item->id, Slider::class) .
                        edit_btn(route("gopanel.sliders.updateOrSave", $item->id), $item->id, ['class' => ['edit-template']]);
                }
            ]
        ]);
    }

    protected function query(): Builder
    {
        $query =  $this->baseQueryScope();
        if($this->getSearchInput()){
            $searchInput = strtolower($this->getSearchInput());

            $query->whereHas('translations', function($q) use ($searchInput) {

                $q->whereRaw('LOWER(value) LIKE ?', ['%' . $searchInput . '%']);
            })
                ->orWhereRaw('LOWER(`url`) LIKE ?', ['%' . $searchInput . '%']);
        }
        return $query;
    }


}
