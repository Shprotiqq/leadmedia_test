<?php

namespace App\Services\Company;

use App\DTOs\Company\CompanyCreateDTO;
use App\DTOs\Company\CompanyUpdateDTO;
use App\Models\Company;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CompanyService
{
    public static function create(CompanyCreateDTO $dto): Model|Builder
    {
        if(isset($dto->logo_path)) {
            $dto->logo_path->store();

            return Company::query()->create([
                'name' => $dto->name,
                'email' => $dto->email,
                'logo_path' => $dto->logo_path->hashName(),
                'url' => $dto->url
            ]);
        } else {
            return Company::query()->create([
                'name' => $dto->name,
                'email' => $dto->email,
                'logo_path' => $dto->logo_path,
                'url' => $dto->url
            ]);
        }
    }

    public static function update(CompanyUpdateDTO $dto): int
    {
        return $dto->company->update([
            'name' => $dto->name ?? $dto->company->name,
            'email' => $dto->email ?? $dto->company->email,
            'logo_path' => $dto->logo_path ?? $dto->company->logo_path,
            'url' => $dto->url ?? $dto->company->url,
        ]);
    }
}
