<?php

namespace App\Datatable;

use App\Models\Entities\City;
use App\Models\Entities\Language;
use App\Models\Gopanel\Entities\SosialLink;
use App\Models\Gopanel\LangTranslation;
use Illuminate\Database\Eloquent\Builder;

class LangTranslationDatatable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct(LangTranslation::class, [
            'id'             => 'ID',
            'key'            => 'Açar',
            'value'          => 'Dəyər',
            'locale'         => 'Dil(key)',
            'created_at'     => 'Yaradılma tarixi'
        ], [
            [
                'title' => 'Əməliyyatlar',
                'type'  => "functional",
                'view'  => function ($item) {
                    return
//                        delete_btn($item->id, LangTranslation::class) .
                        edit_btn(route("gopanel.langtranslations.updateOrSave", $item->id), $item->id, ['class' => ['edit-template']]);
                }
            ]
        ]);
    }

    protected function query(): Builder
    {
        $query = $this->baseQueryScope();
        $query = $query->whereLocale(app()->getLocale());

        if($this->getSearchInput()){
            $searchInput = strtolower($this->getSearchInput());

            $query->where(function ($qq) use ($searchInput) {
                $qq->orWhereRaw('LOWER(`key`) LIKE ?', ['%' . $searchInput . '%']);
                $qq->orWhereRaw('LOWER(`value`) LIKE ?', ['%' . $searchInput . '%']);
                $qq->orWhereRaw('LOWER(`filename`) LIKE ?', ['%' . $searchInput . '%']);
            });

        }

        return $query;

    }


}
