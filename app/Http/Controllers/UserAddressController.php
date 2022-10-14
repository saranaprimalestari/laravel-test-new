<?php

namespace App\Http\Controllers;

use App\Models\User_address;
use App\Http\Requests\StoreUser_addressRequest;
use App\Http\Requests\UpdateUser_addressRequest;

class UserAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreUser_addressRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser_addressRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User_address  $user_address
     * @return \Illuminate\Http\Response
     */
    public function show(User_address $user_address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User_address  $user_address
     * @return \Illuminate\Http\Response
     */
    public function edit(User_address $user_address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUser_addressRequest  $request
     * @param  \App\Models\User_address  $user_address
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser_addressRequest $request, User_address $user_address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_address  $user_address
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_address $user_address)
    {
        //
    }
}
