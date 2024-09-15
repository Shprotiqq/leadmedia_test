<?php

namespace App\Http\Controllers;

use App\Http\Requests\InternalApiUsers\StoreFromCreateRequest;
use App\Http\Requests\InternalApiUsers\StoreFromUpdateRequest;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;


 final class InternalApiUsersController extends Controller
{

    /**
     * Вывод всех сотрудников в формате JSON
     *
     * @return Collection
     */
    public function index(): Collection
    {
        return Employee::all();
    }


    /**
     * Создание нового сотрудника
     *
     * @param StoreFromCreateRequest $request
     * @return JsonResponse
     */
    public function store(StoreFromCreateRequest $request): JsonResponse
    {
        $employee = Employee::query()->create($request->validated());
        return response()->json($employee, 201);
    }


    /**
     * Вывод одного сотрудника в формате JSON
     *
     * @param Employee $employee
     * @return Employee
     */
    public function show(Employee $employee): Employee
    {
        return $employee;
    }


    /**
     * Обновление сотрудника
     *
     * @param StoreFromUpdateRequest $request
     * @param Employee $employee
     * @return JsonResponse
     */
    public function update(StoreFromUpdateRequest $request, Employee $employee): JsonResponse
    {
        $employee->query()->update($request->all());

        return response()->json($employee, 200);
    }


    /**
     * Удаление сотрудника
     *
     * @param Employee $employee
     * @return JsonResponse
     */
    public function destroy(Employee $employee): JsonResponse
    {
        $employee->delete();

        return response()->json(null, 204);
    }
}
