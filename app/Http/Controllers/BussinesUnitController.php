<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\BussinesUnit;
use App\Http\Requests\BussinesUnitRequest;

class BussinesUnitController extends Controller
{
    private $businesUnit;
   
    public function __construct()
    {
        $this->bussinesUnit = new BussinesUnit();
        $this->middleware('auth:api', ['except' => []]);
    }

    public function index()
    {
        $bussinesunit = $this->bussinesUnit->all();
        return response()->json(['businesUnit'=>$bussinesunit]);
    }
   
    public function create(BussinesUnitRequest $request)
    {
        $this->bussinesUnit->name = $request->name;
        $this->bussinesUnit->street = $request->street;
        $this->bussinesUnit->number = $request->number;
        $this->bussinesUnit->state = $request->state;
        $this->bussinesUnit->city = $request->city;
        $this->bussinesUnit->neighborhood = $request->neighborhood;
        $this->bussinesUnit->user_id = auth()->user()->id;
        $this->bussinesUnit->zipcode = $request->zipcode;
        $this->bussinesUnit->save();
        return response()->json(['bussinesUnit'=>$this->bussinesUnit]);
    }

   function findByUserId()
    {
        $id = auth()->user()->id;
        $bussinesUnit = $this->bussinesUnit->where('user_id','=',$id)->get();

        return response()->json(['bussinesUnit'=>$bussinesUnit]);
    }
    
    function findById(string $id)
    {
        $bussinesUnit = $this->bussinesUnit->find($id);
        return response()->json(['bussinesUnit'=>  $bussinesUnit]);
    }


    public function update(BussinesUnitRequest $request, string $id)
    {
        $bussinesUnit = $this->bussinesUnit->find($id);
         $bussinesUnit->name = $request->name;
         $bussinesUnit->street = $request->street;
         $bussinesUnit->number = $request->number;
         $bussinesUnit->state = $request->state;
         $bussinesUnit->city = $request->city;
         $bussinesUnit->neighborhood = $request->neighborhood;
         $bussinesUnit->user_id = auth()->user()->id;
         $bussinesUnit->zipcode = $request->zipcode;
         $bussinesUnit->save();
        return response()->json(['bussinesUnit'=>$bussinesUnit]);
    }
  
}
