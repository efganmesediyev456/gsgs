<?php

namespace App\Datatable;

use App\Models\Entities\City;
use App\Models\Entities\Menu;
use App\Models\Entities\Slider;
use App\Models\Gopanel\Entities\SosialLink;
use Illuminate\Database\Eloquent\Builder;

class MenuDatatable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct(Menu::class, [
            'id'                  => 'ID',
            'title'               => 'Ad',
            'slug'                => 'Sluq',
            'statusview'          => 'Status',
            'header_top_view'     => 'Saytın üst hissəsində göstər',
            'header_view'         => 'Menyu hissəsində göstər',
            'footer_view'         => 'Saytın sonunda göstər',
//            'childe_link'         => 'Alt Menyular',
            'created_at'          => 'Yaradılma tarixi'
        ], [
            [
                'title' => 'Əməliyyatlar',
                'type'  => "functional",
                'view'  => function ($item) {
                    return
//                        delete_btn($item->id, Menu::class) .
                        edit_btn(route("gopanel.menus.updateOrSave", $item->id), $item->id, ['class' => ['edit-template']]);
                }
            ]
        ]);
    }
    protected function query(): Builder
    {
        $query = $this->baseQueryScope();
        if(request()->parent_id){
            $query->where('parent_id', request()->parent_id);
        }else{
            $query->where('parent_id', null);
        }


        $query =  $this->baseQueryScope();
        if($this->getSearchInput()){
            $searchInput = strtolower($this->getSearchInput());

            $query->where(function ($qq) use ($searchInput) {
                $qq->whereHas('translations', function($q) use ($searchInput) {
                    $q->whereRaw('LOWER(value) LIKE ?', ['%' . $searchInput . '%']);
                })
                    ->orWhereRaw('LOWER(`slug`) LIKE ?', ['%' . $searchInput . '%']);
            });

        }

        return $query;

    }
}
