<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\GovernorateManager;
use App\Governorate;
class Govern_managController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $governorates = Governorate::all();
        $govern_managers = GovernorateManager::all();
        return view('pages/users/govern_managers', compact('govern_managers','governorates'));
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
        $govern_manage = new GovernorateManager();
        $govern_manage->name = $request->name;
        $govern_manage->phone = $request->phone;
        $govern_manage->address = $request->address;
        $govern_manage->national_id = $request->national_id;
        $govern_manage->created_by = $request->created_by;
        if ($request->hasFile('picture')) {
        $govern_manage->picture = $this->uploadimage($request->picture);
        }
        
        $govern_manage->save();
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
        $govern_manage = GovernorateManager::find($id);
        $govern_manage->name = $request->upname;
        $govern_manage->phone = $request->upphone;
        $govern_manage->address = $request->upaddress;
        $govern_manage->national_id = $request->upnational_id;
        $govern_manage->created_by = $request->upcreated_by;
        if ($request->hasFile('uppicture')) {
        $govern_manage->uppicture = $this->uploadimage($request->uppicture);
        }
        $govern_manage->save();
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
        GovernorateManager::find($id)->delete();
        return back();
    }
}
