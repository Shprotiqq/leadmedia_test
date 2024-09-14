<?php

namespace App\DTOs\Company;

use App\Http\Requests\company\StoreFromCreateRequest;

final class CompanyCreateDTO
{

    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly ?object $logo_path,
        public readonly ?string $url
    )
    {
    }

    public static function fromRequest(StoreFromCreateRequest $request): CompanyCreateDTO
    {
        $requestData = $request->validated();

        return new self(
          $requestData['name'],
          $requestData['email'],
          $requestData['logo_path'] ?? null,
          $requestData['url'] ?? null
        );
    }

}
