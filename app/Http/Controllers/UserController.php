<?php

namespace App\Http\Controllers;

use App\Models\UserFamily;
use Illuminate\Http\Request;

class UserController extends Controller
{

//    private $users = [
//         1 => [ 
//             'id'=> 1,
//             'name' => 'Guillem',
//             'age' => 43,
//             'has_money' => true,
//             'has_friends' => true
    
//         ],
//         2 => [
//             'id' => 2,
//             'name' => 'Carol',
//             'age' => 42,
//             'has_money' => false
//         ],
//         3 => [
//             'id' => 3,
//             'name' => 'Arlet',
//             'age' => 11,
//             'has_money' => false,
//             'has_friends' => true
//         ],
//         4 => [
//             'id' => 4,
//             'name' => 'Nil',
//             'age' => 7,
//             'has_money' => false,
//             'has_friends' => true
//         ]
//     ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('users.index', ['users' => $this->users]);
        return view('users.index', ['users' => UserFamily::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create');
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
        // dd($request->name()); 
        $user = new UserFamily;

        $user->name         = $request->input('user');
        $user->age          = $request->input('age');
        $user->has_money    = false;
        $user->has_friends  = true;
        // $user->has_money    = $request->input('has_money');
        // $user->has_friends  = $request->input('has_friends');
        $user->email        = $request->input('email');
        $user->password     = $request->input('password');
        // $user->updated_at     = \getdate;
        // $user->created_at     = $request->input('password');

        $user->save();

        return redirect()->route('users.show', ['user' => $user->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('users.show', ['user'=>UserFamily::findOrFail($id)]);
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
