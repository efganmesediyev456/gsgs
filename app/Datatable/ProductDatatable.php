<?php

namespace App\Datatable;

use App\Models\Entities\City;
use App\Models\Entities\Partner;
use App\Models\Entities\Product;
use App\Models\Gopanel\Entities\SosialLink;
use Illuminate\Database\Eloquent\Builder;

class ProductDatatable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct(Product::class, [
            'id'             => 'ID',
            'title'          => 'Başlıq',
            'imageview'      => 'Şəkil',
            'gallery'        => 'Şəkillər',
            'statusview'     => 'Status',
            'discountview'     => 'Endirimli qiymətlər bölümü',
            'created_at'     => 'Yaradılma tarixi'
        ], [
            [
                'title' => 'Əməliyyatlar',
                'type'  => "functional",
                'view'  => function ($item) {
                    return
                        delete_btn($item->id, Product::class) .
                        edit_btn(route("gopanel.productslist.updateOrSave", $item->id), $item->id, ['class' => ['edit-template']], null, null,true);
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
                ->orWhereRaw('LOWER(`slug`) LIKE ?', ['%' . $searchInput . '%'])
                ->orWhereRaw('LOWER(`price`) LIKE ?', ['%' . $searchInput . '%'])
                ->orWhereRaw('LOWER(`discount_price`) LIKE ?', ['%' . $searchInput . '%'])
                ->orWhereRaw('LOWER(`sku`) LIKE ?', ['%' . $searchInput . '%']);
        }
        return $query;
    }


}
