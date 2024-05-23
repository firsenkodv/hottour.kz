<?php
namespace Domain\Dump\ViewModels;
use App\Models\Dump;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class DumpViewModel
{
    use Makeable;

    public function listDumps()
    {
        $list_dumps_all = Cache::rememberForever('list_dumps_all', function () {

            return Dump::query()
                ->get_dumps()
                ->get();
        });
        return $list_dumps_all;

    }

    public function OneDump($slug)
    {
       $one_dump = $this->listDumps()->firstWhere('slug', $slug);
        return $one_dump;
    }

    public function OneDumpForId($id)
    {
        $one_dump = $this->listDumps()->firstWhere('id', $id);
        return $one_dump;
    }



}


