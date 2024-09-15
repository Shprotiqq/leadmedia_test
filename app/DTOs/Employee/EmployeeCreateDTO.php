<?php

namespace App\DTOs\Employee;

use App\Http\Requests\Employee\StoreFromCreateRequest;

class EmployeeCreateDTO
{

    public function __construct(
        public readonly string $first_name,
        public readonly string $last_name,
        public readonly ?string $email,
        public readonly ?string $phone_number,
        public readonly ?string $company_id
    )
    {
    }

    public static function fromRequest(StoreFromCreateRequest $request): EmployeeCreateDTO
    {
        $requestData = $request->validated();

        return new self(
            $requestData['first_name'],
            $requestData['last_name'],
            $requestData['email'] ?? null,
            $requestData['phone_number'] ?? null,
            $requestData['company_id'] ?? null
        );
    }


}
