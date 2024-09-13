<?php

namespace App\DTOs\Company;

use App\Http\Requests\company\StoreFromRequest;

class CompanyDTO
{

    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $logo_path,
        public readonly string $url
    )
    {
    }

    public static function fromRequest(StoreFromRequest $request): CompanyDTO
    {
        $requestData = $request->validated();

        return new self(
          $requestData['name'],
          $requestData['email'],
          $requestData['logo_path'],
          $requestData['url']
        );
    }

}
