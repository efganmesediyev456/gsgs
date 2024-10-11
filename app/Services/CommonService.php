<?

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;
use Psr\Log\LoggerInterface;

class CommonService
{

    public LoggerInterface $logging;

    public function __construct()
    {
        $this->logging = Log::channel();
    }


    public function save(Model $item, $data): Model
    {
        if (is_null($item))
            throw new InvalidArgumentException('Item cannot be null.');

        foreach ($data as $key => $value) {
            if (!is_array($value))
                $item->$key = $value;
        }

        $item->save();
        return $item->fresh();
    }

    public function share(array $data)
    {
        return view()->share($data);
    }
}
