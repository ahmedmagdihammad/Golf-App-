<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Distributer;

class DistributerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distributers = Distributer::all();
        return view('pages/users/distributers', compact('distributers'));
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
        $distributer = new Distributer();
        $distributer->name = $request->name;
        $distributer->phone = $request->phone;
        $distributer->address = $request->address;
        $distributer->national_id = $request->national_id;
        $distributer->created_by = $request->created_by;
        if ($request->hasFile('picture')) {
            $distributer->picture = $this->uploadimage($request->picture);
        }
        
        $distributer->save();
        return back();
    }

    public function uploadimage($file)
    {
        $imagename = time().'.'.$file->getClientOriginalExtension();
        $destinationPath = public_path('images');
        $file->move($destinationPath, $imagename); 
        $returenurl = 'images/'.$imagename; 

        return $returenurl;  
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
        $distributer = Distributer::find($id);
        $distributer->name = $request->upname;
        $distributer->phone = $request->upphone;
        $distributer->address = $request->upaddress;
        $distributer->national_id = $request->upnational_id;
        $distributer->created_by = $request->upcreated_by;
        if ($request->hasFile('uppicture')) {
        $distributer->picture = $this->uploadimage($request->uppicture);
        }
        
        $distributer->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Distributer::find($id)->delete();
        return back();
    }
}
