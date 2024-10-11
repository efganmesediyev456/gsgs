<?php

namespace App\Datatable;

use App\Models\ContactApply;
use App\Models\Entities\City;
use App\Models\Entities\Feature;
use App\Models\Entities\Slider;
use App\Models\Gopanel\Entities\SosialLink;
use App\Models\Gopanel\SiteApply;
use Illuminate\Database\Eloquent\Builder;

class ContactFormDatatable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct(ContactApply::class, [
            'id'             => 'ID',
            'name'           => 'Ad',
            'phone'          => 'Nömrə',
            'email'          => 'Email',
            'subject'        => 'Mövzu',
            'message'        => 'Göndərilən mesaj',
            'created_at'     => 'Göndərilən tarix'
        ], [
            [
                'title' => 'Əməliyyatlar',
                'type'  => "functional",
                'view'  => function ($item) {
                    return
                        delete_btn($item->id, ContactApply::class);
                }
            ]
        ]);
    }

    protected function query(): Builder
    {
        $query =  $this->baseQueryScope();
        if($this->getSearchInput()){
            $searchInput = strtolower($this->getSearchInput());
            $query->whereRaw('LOWER(email) LIKE ?', ['%' . $searchInput . '%']);
            $query->orWhereRaw('LOWER(name) LIKE ?', ['%' . $searchInput . '%']);
            $query->orWhereRaw('LOWER(message) LIKE ?', ['%' . $searchInput . '%']);
            $query->orWhereRaw('LOWER(subject) LIKE ?', ['%' . $searchInput . '%']);
            $query->orWhereRaw('LOWER(created_at) LIKE ?', ['%' . $searchInput . '%']);
        }
        return $query;
    }


}
