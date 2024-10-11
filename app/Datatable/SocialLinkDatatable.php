<?php

namespace App\Datatable;

use App\Models\Entities\City;
use App\Models\Entities\Feature;
use App\Models\Entities\SocialLink;
use App\Models\Gopanel\Entities\SosialLink;
use Illuminate\Database\Eloquent\Builder;

class SocialLinkDatatable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct(SocialLink::class, [
            'id'             => 'ID',
            'title'          => 'Ad',
            'statusview'     => 'Status',
            'created_at'     => 'Qeydiyyat tarixi'
        ], [
            [
                'title' => 'Əməliyyatlar',
                'type'  => "functional",
                'view'  => function ($item) {
                    return
                        delete_btn($item->id, SocialLink::class) .
                        edit_btn(route("gopanel.sociallinks.updateOrSave", $item->id), $item->id, ['class' => ['edit-template']]);
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
