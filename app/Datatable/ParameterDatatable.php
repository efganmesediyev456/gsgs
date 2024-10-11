<?php

namespace App\Datatable;

use App\Models\Entities\Brend;
use App\Models\Entities\Parameter;
use Illuminate\Database\Eloquent\Builder;

class ParameterDatatable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct(Parameter::class, [
            'id'             => 'ID',
            'title'          => 'Ad',
            'statusview'     => 'Status',
            'childrendview'  => 'Dəyərlər',
            'created_at'     => 'Yaradılma tarixi'
        ], [
            [
                'title' => 'Əməliyyatlar',
                'type'  => "functional",
                'view'  => function ($item) {
                    return
                        delete_btn($item->id, Parameter::class) .
                        edit_btn(route("gopanel.parameters.updateOrSave", $item->id), $item->id, ['class' => ['edit-template']]);
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
        if(request()->parent_id){
            $query->where('parent_id',request()->parent_id);
        }else{
            $query->whereNull('parent_id');
        }
        return $query;
    }


}
