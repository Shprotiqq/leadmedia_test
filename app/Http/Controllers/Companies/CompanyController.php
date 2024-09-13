<?php

namespace App\Http\Controllers\Companies;

use App\DTOs\Company\CompanyDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\StoreFromRequest;
use App\Services\Company\CompanyService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('companies/company_list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('companies/company_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFromRequest $request): RedirectResponse
    {
        $dto = CompanyDTO::fromRequest($request);

        $company = CompanyService::created($dto);

        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
