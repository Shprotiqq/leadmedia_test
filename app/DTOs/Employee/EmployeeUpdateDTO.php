<?php

namespace App\DTOs\Employee;

use App\Http\Requests\Employee\StoreFromUpdateRequest;
use App\Models\Employee;

final class EmployeeUpdateDTO
{

    public function __construct(
        public readonly Employee $employee,
        public readonly ?string $first_name,
        public readonly ?string $last_name,
        public readonly ?string $email,
        public readonly ?string $phone_number,
        public readonly ?string $company_id
    )
    {
    }

    public static function fromRequest(StoreFromUpdateRequest $request, Employee $employee): EmployeeUpdateDTO
    {
        $requestData = $request->validated();

        return new self(
          $employee,
          $requestData['first_name'] ?? null,
          $requestData['last_name'] ?? null,
          $requestData['email'] ?? null,
          $requestData['phone_number'] ?? null,
          $requestData['company_id'] ?? null
        );
    }

}
