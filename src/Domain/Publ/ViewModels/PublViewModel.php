<?php
namespace Domain\Publ\ViewModels;
use App\Models\Dump;
use App\Models\Publ;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class PublViewModel
{
    use Makeable;

    public function OnePubl($slug)
    {
        $publs = Cache::rememberForever('publs', function () {
        return  Publ::query()
                ->get_publs()
                ->get();
        });
        $publ = $publs->firstWhere('slug', $slug);
        return $publ;

    }


}


