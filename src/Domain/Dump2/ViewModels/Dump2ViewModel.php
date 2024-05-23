<?php
namespace Domain\Dump2\ViewModels;
use App\Models\Dump2;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class Dump2ViewModel
{
    use Makeable;


    public function listDump2s()
    {
        $list_dump2s_all = Cache::rememberForever('list_dump2s_all', function () {

            return Dump2::query()
                ->get_dump2s()
                ->get();
        });
        return $list_dump2s_all;

    }

    public function OneDump2($slug)
    {
        $one_dump2 = $this->listDump2s()->firstWhere('slug', $slug);
        return $one_dump2;
    }

    public function OneDump2ForId($id)
    {
        $one_dump2 = $this->listDump2s()->firstWhere('id', $id);
        return $one_dump2;
    }


}


