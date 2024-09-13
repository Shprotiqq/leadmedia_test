<?php

namespace app\Services\Company;

use App\DTOs\Company\CompanyDTO;
use App\Models\Company;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class CompanyService
{

    public static function created(CompanyDTO $dto): Model|Builder
    {
        return Company::query()->create([
           'name' => $dto->name,
           'email' => $dto->email,
           'logo_path' => $dto->logo_path,
           'url' => $dto->url
        ]);
    }

}
