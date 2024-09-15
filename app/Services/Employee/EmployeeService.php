<?php

namespace App\Services\Employee;

use App\DTOs\Employee\EmployeeCreateDTO;
use App\DTOs\Employee\EmployeeUpdateDTO;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

final class EmployeeService
{

    public static function create(EmployeeCreateDTO $dto): Model|Builder
    {
        return Employee::query()->create([
            'first_name' => $dto->first_name,
            'last_name' => $dto->last_name,
            'email' => $dto->email,
            'phone_number' => $dto->phone_number,
            'company_id' => $dto->company_id
        ]);
    }

    public static function update(EmployeeUpdateDTO $dto): void
    {
        $dto->employee->update([
           'first_name' => $dto->first_name,
           'last_name' => $dto->last_name,
           'email' => $dto->email,
           'phone_number' => $dto->phone_number,
           'company_id' => $dto->company_id
        ]);
    }

}
