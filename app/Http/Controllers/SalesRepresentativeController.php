<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalesRepresentative;
use App\SalesManager;
class SalesRepresentativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salesrepresentatives = SalesRepresentative::paginate(5);

        $salesmanagers = SalesManager::pluck('name','id')->all();
        return view('pages.salesrepresentatives.index',compact('salesrepresentatives','salesmanagers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['created_by'] = Auth()->user()->id;
        if($file = $request->file('picture'))
        {
            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $input['picture'] = time() . $file->getClientOriginalName();
        }
        SalesRepresentative::create($input);

        session()->flash('successfully_created','تم اضافة مندوب بيع جديد');
        return back();
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
}
