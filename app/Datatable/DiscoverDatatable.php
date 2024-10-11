<?php

namespace App\Datatable;

use App\Models\Entities\City;
use App\Models\Entities\Discover;
use App\Models\Entities\Feature;
use App\Models\Gopanel\Entities\SosialLink;
use Illuminate\Database\Eloquent\Builder;

class DiscoverDatatable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct(Discover::class, [
            'id'             => 'ID',
            'title'          => 'Başlıq',
            'title2'         => 'Başlıq2',
            'statusview'     => 'Status',
            'created_at'     => 'Yaradılma tarixi'
        ], [
            [
                'title' => 'Əməliyyatlar',
                'type'  => "functional",
                'view'  => function ($item) {
                    return
                        delete_btn($item->id, Discover::class) .
                        edit_btn(route("gopanel.discovers.updateOrSave", $item->id), $item->id, ['class' => ['edit-template']]);
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
