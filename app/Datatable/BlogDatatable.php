<?php

namespace App\Datatable;

use App\Models\Entities\Blog;
use App\Models\Entities\Discover;
use Illuminate\Database\Eloquent\Builder;

class BlogDatatable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct(Blog::class, [
            'id'             => 'ID',
            'title'          => 'Ad',
            'subtitle'       => 'Haqqinda',
            'statusview'     => 'Status',
            'created_at'     => 'Yaradılma tarixi'
        ], [
            [
                'title' => 'Əməliyyatlar',
                'type'  => "functional",
                'view'  => function ($item) {
                    return
                        delete_btn($item->id, Blog::class) .
                        edit_btn(route("gopanel.blogs.updateOrSave", $item->id), $item->id, ['class' => ['edit-template']], null, null,true);
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
                ->orWhereRaw('LOWER(`slug`) LIKE ?', ['%' . $searchInput . '%']);
        }
        return $query;
    }


}
