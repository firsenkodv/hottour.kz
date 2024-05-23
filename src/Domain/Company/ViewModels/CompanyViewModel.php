<?php
namespace Domain\Company\ViewModels;
use App\Models\Company;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class CompanyViewModel
{
    use Makeable;

    public function OneCompany($slug)
    {
        $companies = Cache::rememberForever('companies', function () {
        return  Company::query()
                ->get_companies()
                ->get();
        });
        $company = $companies->firstWhere('slug', $slug);
        return $company;

    }


}


