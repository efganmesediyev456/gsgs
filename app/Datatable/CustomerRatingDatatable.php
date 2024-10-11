<?php

namespace App\Datatable;

use App\Models\Entities\City;
use App\Models\Entities\CustomerRating;
use App\Models\Entities\Faq;
use App\Models\Entities\Slider;
use App\Models\Gopanel\Entities\SosialLink;
use Illuminate\Database\Eloquent\Builder;

class CustomerRatingDatatable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct(CustomerRating::class, [
            'id'             => 'ID',
            'name'           => 'Ad',
            'position'       => 'Vəzifə',
            'message'        => 'Fikir',
            'statusview'     => 'Status',
            'created_at'     => 'Yaradılma tarixi'
        ], [
            [
                'title' => 'Əməliyyatlar',
                'type'  => "functional",
                'view'  => function ($item) {
                    return
                        delete_btn($item->id, CustomerRating::class) .
                        edit_btn(route("gopanel.customerratings.updateOrSave", $item->id), $item->id, ['class' => ['edit-template']]);
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
            });
        }
        return $query;
    }


}
