<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use Exception;

class CategorieController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $categorie = new Categorie;
            $data = $categorie->getCategories();
            return view('createcategorie', ['data' => $data]);

        } catch (Exception $e) {
            session(['errorMessage' => $e->getMessage()]);
            return redirect()->route('controlpanel')->with('controlpanel', 'error');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $categorie = new Categorie;
            $input     = $request->all();
            $categorie->category = $input['newcategorie'];
            $categorie->save();
            return redirect()->route('createCategorie')->with('createstatus', 'success');

        } catch (Exception $e) {
            session(['errorMessage' => $e->getMessage()]);
            return redirect()->route('createCategorie')->with('createstatus', 'error');
        }
    }
}
