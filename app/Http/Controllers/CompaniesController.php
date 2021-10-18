<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;

class CompaniesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application welcome page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $companies = Company::all();

        return view('companies.index', ['companies' => $companies]);
    }

    /**
     * Favorite a particular company
     *
     * @param  Company $company
     * @return Response
     */
    public function favorite(Company $company)
    {
        Auth::user()->favorites()->attach($company->id);

        return back();
    }

    /**
     * Unfavorite a particular company
     *
     * @param  Company $company
     * @return Response
     */
    public function unFavorite(Company $company)
    {
        Auth::user()->favorites()->detach($company->id);

        return back();
    }
}
