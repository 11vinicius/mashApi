<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\User;
use App\Http\Requests\UserRequest;



class UserController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new User(); 
        $this->middleware('auth:api', ['except' => ['create']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = $this->user->all();

        return response()->json(['user'=>$user]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(UserRequest $request)
    {

        $this->user->name = $request->name;
        $this->user->email = $request->email;
        $this->user->password = Hash::make($request->password);
        $this->user->save();
        return response()->json(['user'=>  $this->user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
