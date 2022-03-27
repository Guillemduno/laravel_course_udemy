<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

   private $users = [
        1 => [ 
            'id'=> 1,
            'name' => 'Guillem',
            'age' => 43,
            'has_money' => true,
            'has_friends' => true
    
        ],
        2 => [
            'id' => 2,
            'name' => 'Carol',
            'age' => 42,
            'has_money' => false
        ],
        3 => [
            'id' => 3,
            'name' => 'Arlet',
            'age' => 11,
            'has_money' => false,
            'has_friends' => true
        ],
        4 => [
            'id' => 4,
            'name' => 'Nil',
            'age' => 7,
            'has_money' => false,
            'has_friends' => true
        ]
    ];
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
