<?php

namespace App\Datatable;

use App\Models\Entities\City;
use App\Models\Entities\ContactDetail;
use App\Models\Entities\Faq;
use App\Models\Entities\Slider;
use App\Models\Gopanel\Entities\SosialLink;
use Illuminate\Database\Eloquent\Builder;

class ContactDetailDatatable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct(ContactDetail::class, [
            'id'             => 'ID',
            'address'        => 'Address',
            'statusview'     => 'Status',
            'created_at'     => 'Yaradılma tarixi'
        ], [
            [
                'title' => 'Əməliyyatlar',
                'type'  => "functional",
                'view'  => function ($item) {
                    return
                        delete_btn($item->id, ContactDetail::class) .
                        edit_btn(route("gopanel.contactdetails.updateOrSave", $item->id), $item->id, ['class' => ['edit-template']]);
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
