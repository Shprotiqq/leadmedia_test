<?php

namespace App\Http\Controllers\Companies;

use App\DTOs\Company\CompanyCreateDTO;
use App\DTOs\Company\CompanyUpdateDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\StoreFromCreateRequest;
use App\Http\Requests\Company\StoreFromUpdateRequest;
use App\Models\Company;
use App\Services\Company\CompanyService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

final class CompanyController extends Controller
{

    /**
     * Возвращает страницу со списком компаний
     *
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $companies = Company::query()->orderBy('id', 'DESC')->paginate(10);

        return view('companies/company_list', compact('companies'));
    }

    /**
     * Форма создания компании
     *
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('companies/company_create');
    }

    /**
     * Создание компании
     *
     * @param StoreFromCreateRequest $request
     * @return RedirectResponse
     */
    public function store(StoreFromCreateRequest $request): RedirectResponse
    {
        $dto = CompanyCreateDTO::fromRequest($request);

        $company = CompanyService::create($dto);

        return redirect()->route('companies.index', compact('company'));
    }


    /**
     * Страница просмотра компании
     *
     * @param Company $company
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function show(Company $company): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('companies/company_show', [
            'company' => $company
        ]);
    }


    /**
     * Форма изменения компании
     *
     * @param Company $company
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function edit(Company $company): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('companies/company_edit', [
            'company' => $company
        ]);
    }


    /**
     * Обновление компании
     *
     * @param StoreFromUpdateRequest $request
     * @param Company $company
     * @return RedirectResponse
     */
    public function update(StoreFromUpdateRequest $request, Company $company): RedirectResponse
    {
        $dto = CompanyUpdateDTO::fromRequest($request, $company);

        CompanyService::update($dto);

        session()->flash('success', 'Изменения сохранены!');

        return redirect()->route('companies.index');
    }


    /**
     * Удаление компании
     *
     * @param Company $company
     * @return RedirectResponse
     */
    public function destroy(Company $company): RedirectResponse
    {
        Company::query()->findOrFail($company->id)->delete();

        return back();
    }
}
