<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipament;
use App\Http\Requests\EquipamentRequest;


class EquipmentController extends Controller
{
    private $equipament;


    public function __construct()
    {
        $this->middleware('auth:sanctum');

        $this->equipament = new Equipament();

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipaments = $this->equipament->all();
        return response()->json(['equipments'=> $equipaments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(EquipamentRequest $request)
    {
        $this->equipament->name = $request->name;
        $this->equipament->model = $request->model;
        $this->equipament->photo = $request->has('photo')? $request->file('photo')->store('public/Equipament'):null;
        $this->equipament->year_of_manufacture = $request->year_of_manufacture;
        $this->equipament->serial_number = $request->serial_number;
        $this->equipament->bussines_unit_id = $request->bussines_unit_id;
        $this->equipament->save();

        return response()->json(['equipament'=>$this->equipament]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
