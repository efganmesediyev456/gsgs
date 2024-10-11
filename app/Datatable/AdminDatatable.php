<?php

namespace App\Datatable;

use App\Models\Entities\City;
use App\Models\Entities\Feature;
use App\Models\Entities\Slider;
use App\Models\Gopanel\Admin;
use App\Models\Gopanel\Entities\SosialLink;
use Illuminate\Database\Eloquent\Builder;

class AdminDatatable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct(Admin::class, [
            'id'             => 'ID',
            'name'          => 'Ad',
            'surname'       => 'Soyad',
            'created_at'     => 'Yaradılma tarixi'
            ], [
            [
                'title' => 'Əməliyyatlar',
                'type'  => "functional",
                'view'  => function ($item) {
                    return
                        delete_btn($item->id, Admin::class) .
                        edit_btn(route("gopanel.admins.updateOrSave", $item->id), $item->id, ['class' => ['edit-template']]);
                }
            ]
        ]);
    }

    protected function query(): Builder
    {
        $query =  $this->baseQueryScope();
        if($this->getSearchInput()){
            $searchInput = strtolower($this->getSearchInput());
            $query->orWhereRaw('LOWER(`name`) LIKE ?', ['%' . $searchInput . '%']);
            $query->orWhereRaw('LOWER(`surname`) LIKE ?', ['%' . $searchInput . '%']);
            $query->orWhereRaw('LOWER(`email`) LIKE ?', ['%' . $searchInput . '%']);
            $query->orWhereRaw('LOWER(`image`) LIKE ?', ['%' . $searchInput . '%']);
        }
        return $query;
    }
}
