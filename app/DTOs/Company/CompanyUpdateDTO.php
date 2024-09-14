<?php

namespace App\DTOs\Company;

use App\Http\Requests\Company\StoreFromUpdateRequest;
use App\Models\Company;

final class CompanyUpdateDTO
{

    public function __construct(
        public readonly Company $company,
        public readonly ?string $name,
        public readonly ?string $email,
        public readonly ?string $logo_path,
        public readonly ?string $url
    )
    {
    }

    public static function fromRequest(StoreFromUpdateRequest $request, Company $company): CompanyUpdateDTO
    {
        $requestData = $request->validated();

        return new self(
            $company,
            $requestData['name'] ?? null,
            $requestData['email'] ?? null,
            $requestData['logo_path'] ?? null,
            $requestData['url'] ?? null
        );
    }

}
