<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Branch;
use App\Bank;

class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        $branches = Branch::all();
//        foreach($branches as $branch)
//        {
//            echo "<br>".$branch->name;
//        }
        $banks = Bank::all();
        foreach($banks as $bank)
        {
            echo "<br>".$bank->name;
            echo "<ul>";
            $branches = $bank->branches->all();
            foreach($branches as $branch)
            {
                echo "<br><li>".$branch->name."</li>";
            }
            echo "</ul>";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('registerbranch');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $branch = new Branch(['name'=>$request->name,'bank_id'=>$request->bank_id,'address'=>$request->address,'ifsc'=>$request->ifsc]);
        $branch->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Branch::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search()
    {
        return view('search');
    }

    public function searchifsc()
    {
        return view('searchifsc');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request)
    {
        $data = Branch::select("name")
            ->where("name","LIKE","%{$request->input('query')}%")
            ->get();

        return response()->json($data);
    }

    public function autocompleteifsc(Request $request)
    {
//        $data = Branch::select("ifsc")
//            ->where("ifsc::string","LIKE","%{$request->input('query')}%")
//            ->get();

        $data = Branch::select("ifsc")
            ->where("ifsc","LIKE","%{$request->input('query')}%")
            ->get();

//        $data = Branch::select("ifsc")->get();
//        return response()->json($data);
    }

}
