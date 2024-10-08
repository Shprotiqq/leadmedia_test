<?php

namespace App\Http\Controllers\Employees;

use App\DTOs\Employee\EmployeeCreateDTO;
use App\DTOs\Employee\EmployeeUpdateDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\StoreFromCreateRequest;
use App\Http\Requests\Employee\StoreFromUpdateRequest;
use App\Models\Company;
use App\Models\Employee;
use App\Services\Employee\EmployeeService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

final class EmployeeController extends Controller
{

    /**
     * Возвращает страницу со списком сотрудников
     *
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {

        $employees = Employee::query()
            ->with('company')
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('employees/employee_list', compact('employees'));
    }


    /**
     * Форма создания сотрудника
     *
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $companies = Company::all();

        return view('employees/employee_create', compact('companies'));
    }


    /**
     * Создание сотрудника
     *
     * @param StoreFromCreateRequest $request
     * @return RedirectResponse
     */
    public function store(StoreFromCreateRequest $request): RedirectResponse
    {
        $dto = EmployeeCreateDTO::fromRequest($request);

        $employee = EmployeeService::create($dto);

        session()->flash('success', 'Сотрудник создан!');

        return redirect()->route('employees.index', compact('employee'));
    }


    /**
     * Страница просмотра сотрудника
     *
     * @param Employee $employee
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function show(Employee $employee): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('employees/employee_show', [
            'employee' => $employee
        ]);
    }

    /**
     * Форма изменения сотрудника
     *
     * @param Employee $employee
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function edit(Employee $employee): Application|Factory|View|\Illuminate\Contracts\Foundation\Application
    {
        $companies = Company::all();

        return view('employees/employee_edit', [
            'employee' => $employee,
            'companies' => $companies
        ]);
    }


    /**
     * Обновление сотрудника
     *
     * @param StoreFromUpdateRequest $request
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function update(StoreFromUpdateRequest $request, Employee $employee): RedirectResponse
    {
        $dto = EmployeeUpdateDTO::fromRequest($request, $employee);

        EmployeeService::update($dto);

        session()->flash('success', 'Изменения сохранены!');

        return redirect()->route('employees.index');
    }


    /**
     * Удаление сотрудника
     *
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function destroy(Employee $employee): RedirectResponse
    {
        Employee::query()->findOrFail($employee->id)->delete();

        return back();
    }
}
