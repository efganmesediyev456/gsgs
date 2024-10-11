<?php

namespace App\Datatable;

use App\Models\Entities\BlogOffer;
use App\Models\Entities\City;
use App\Models\Entities\Feature;
use App\Models\Entities\Slider;
use App\Models\Gopanel\Entities\SosialLink;
use Illuminate\Database\Eloquent\Builder;

class BlogOfferDatatable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct(BlogOffer::class, [
            'id'             => 'ID',
            'title'          => 'Ad',
            'statusview'     => 'Status',
            'created_at'     => 'Yaradılma tarixi'
        ], [
            [
                'title' => 'Əməliyyatlar',
                'type'  => "functional",
                'view'  => function ($item) {
                    return
                        delete_btn($item->id, BlogOffer::class) .
                        edit_btn(route("gopanel.blogoffers.updateOrSave", $item->id), $item->id, ['class' => ['edit-template']]);
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
