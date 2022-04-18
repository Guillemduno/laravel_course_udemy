<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Models\UserFamily;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
    public function store(StoreUser $request)
    {
        $validated = $request->validated();
        $user = new UserFamily();

        $user->name         = $validated['name'];
        $user->age          = $validated['age'];
        $user->email        = $validated['email'];
        $user->password     = $validated['password'];
        $user->has_money    = $validated['has_money'];
        $user->has_friends  = $validated['has_friends'];

        $user->remember_token = Str::random(10);
        $user->email_verified_at = now();

        $user->save();

        $request->session()->flash('status', 'The user was created');

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
        return view('users.edit', ['user' => UserFamily::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUser $request, $id)
    {
        //
        $user = UserFamily::findOrFail($id);
        $validated = $request->validated();
        $user->fill($validated);

        // $user->remember_token = Str::random(10);
        // $user->email_verified_at = now();
        $user->save();

        $request->session()->flash('status', 'The user was updated');

        return redirect()->route('users.show', ['user' => $user->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = UserFamily::findOrFail($id);
        $user->delete();
        session()->flash("status", "The user $user->name was deleted!");
        return redirect()->route('users.index');
    }
}
