<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Property;
use Illuminate\Support\Facades\Session;
use Redirect,Response,DB;
use Carbon\Carbon;


class PropertyController extends Controller
{    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(PropertysDataTable $dataTable)
    // {
    //     return $dataTable->render('Property.Property.index');
    // }

    public function index(Request $request)
    {
        if (request()->ajax()) {
            return datatables()->of(Property::all())
            ->addColumn('action','admin.layouts.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
      
        return view('admin.property.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Property.Property.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Property = new Property();

        $Property->NameBn      = $request->NameBn;
        $Property->NameEn      = $request->NameEn;
        $Property->Code        = $request->Code;
        $Property->Established = $request->Established;
        $Property->Title       = $request->Title;
        $Property->Phone       = $request->Phone;
        $Property->Email       = $request->Email;
        $Property->Website     = $request->Website;
        $Property->Address     = $request->Address;
        $Property->Facebook    = $request->Facebook;
        $Property->Youtube     = $request->Youtube;
        $Property->Twitter     = $request->Twitter;
        $Property->Logo        = $request->Logo;
        $Property->Fevicon     = $request->Fevicon;
        $Property->Location    = $request->Location;
        $Property->Status      = $request->Status;

        try {
            $Property->save();

            return back();
        } catch (Exception $e) {
            $e->getMessage();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Property = Property::find($id);

        return response()->json($Property);
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
    public function update(Request $request)
    {
        $Property = new Property();

        $Property = Property::find($request->ID);

        $Property->NameBn      = $request->NameBnEdit;
        $Property->NameEn      = $request->NameEnEdit;
        $Property->Code        = $request->CodeEdit;
        $Property->Established = $request->EstablishedEdit;
        $Property->Title       = $request->TitleEdit;
        $Property->Phone       = $request->PhoneEdit;
        $Property->Email       = $request->EmailEdit;
        $Property->Website     = $request->WebsiteEdit;
        $Property->Address     = $request->AddressEdit;
        $Property->Facebook    = $request->FacebookEdit;
        $Property->Youtube     = $request->YoutubeEdit;
        $Property->Twitter     = $request->TwitterEdit;
        $Property->Logo        = $request->LogoEdit;
        $Property->Fevicon     = $request->FeviconEdit;
        $Property->Location    = $request->LocationEdit;
        $Property->Status      = $request->StatusEdit;

        try {
            $Property->update();
        } catch (Exception $e) {
            $e->getMessage();
        }

        return back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($PropertyID)
    {
        $Result = Property::where('id',$PropertyID)->delete();
        return Response::json($Result);
    }

    /**
     * Soft delete all rows
     *
    **/
    public function destroyAll()
    {
        Property::whereNull('deleted_at')->delete();
    }

    /**
     * Trash List
     *
     */
    public function trash()
    {
        if (request()->ajax()) {
            return datatables()->of(Property::onlyTrashed())
            ->addColumn('action','admin.layouts.action_trash')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
      
        return view('admin.property.trash');
    }    

    /**
     * Restore soft deleted row
     *
    **/
    public function restore($PropertyID)
    {
        Property::onlyTrashed()->find($PropertyID)->restore();
    }

    /**
     * Restore all soft deleted row
     *
    **/
    public function restoreAll()
    {
        Property::onlyTrashed()->restore();
    }

    /**
     * parmanently delete soft deleted row
     *
    **/
    public function clear($PropertyID)
    {
        Property::onlyTrashed()->find($PropertyID)->forceDelete();
    }

    /**
     * parmanently delete all soft deleted row
     *
    **/
    public function empty()
    {
        Property::onlyTrashed()->forceDelete();
    }
}
