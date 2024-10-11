<?php

namespace App\Datatable;

use App\Models\Entities\City;
use App\Models\Entities\Language;
use App\Models\Entities\Slider;
use App\Models\Gopanel\Entities\SosialLink;
use Illuminate\Database\Eloquent\Builder;

class LanguageDatatable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct(Language::class, [
            'id'             => 'ID',
            'title'          => 'Ad',
            'created_at'     => 'Yaradılma tarixi',
            'statusview'     => 'Status',
        ], [
            [
                'title' => 'Əməliyyatlar',
                'type'  => "functional",
                'view'  => function ($item) {
                    return
                        delete_btn($item->id, Language::class) .
                        edit_btn(route("gopanel.languages.updateOrSave", $item->id), $item->id, ['class' => ['edit-template']]);
                }
            ]
        ]);
    }

    protected function query(): Builder
    {
        $query =  $this->baseQueryScope();
        if($this->getSearchInput()){
            $searchInput = strtolower($this->getSearchInput());

            $query->orWhereRaw('LOWER(`title`) LIKE ?', ['%' . $searchInput . '%']);
            $query->orWhereRaw('LOWER(`locale`) LIKE ?', ['%' . $searchInput . '%']);
            $query->orWhereRaw('LOWER(`icon`) LIKE ?', ['%' . $searchInput . '%']);
        }
        return $query;
    }


}
