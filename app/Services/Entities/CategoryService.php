<?

namespace App\Services\Entities;

use App\Models\Entities\Category;
use App\Services\CommonService;

class CategoryService extends CommonService
{
    public function __construct()
    {
        //
    }

    public function create($data): Category
    {
        $item               = new Category();
        $item->parent_id    = $data['parent_id'] ?? NULL;
        $item->icon         = $data['icon'] ?? NULL;
        $item->save();
        return $item->fresh();
    }

    public function update($item, $data): Category
    {
        if (isset($data['parent_id']) && !empty($data['parent_id']) && !is_null($data['parent_id']))
            $item->parent_id    = $data['parent_id'];
        if (isset($data['icon']) && !empty($data['icon']) && !is_null($data['icon']))
            $item->icon         = $data['icon'] ?? NULL;
        if (isset($data['list_image']) && !empty($data['list_image']) && !is_null($data['list_image']))
            $item->list_image         = $data['list_image'] ?? NULL;
        $item->save();
        return $item->fresh();
    }
}
