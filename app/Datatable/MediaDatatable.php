<?php

namespace App\Datatable;

use App\Models\Entities\City;
use App\Models\Entities\Feature;
use App\Models\Entities\Slider;
use App\Models\Gopanel\Entities\SosialLink;
use App\Models\Gopanel\Media;
use Illuminate\Database\Eloquent\Builder;

class MediaDatatable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct(Media::class, [
            'id'             => 'ID',
            'fileview'           => 'File',
            'statusview'     => 'Status',
            'created_at'     => 'Qeydiyyat tarixi'
        ], [
            [
                'title' => 'Əməliyyatlar',
                'type'  => "functional",
                'view'  => function ($item) {
                    return
                        delete_btn($item->id, Media::class) .
                        edit_btn(route("gopanel.medias.updateOrSave", ['item'=>$item->id, 'imageable_type'=>request()->imageable_type, 'imageable_id'=>request()->imageable_id]), $item->id, ['class' => ['edit-template']]);
                }
            ]
        ]);
    }

    protected function query(): Builder
    {
        $query = $this->baseQueryScope();
        $query->where('imageable_type', urldecode(request()->imageable_type));
        $query->where('imageable_id',   request()->imageable_id);
        return $query;
    }


}
