<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\User;

class HomeController extends Controller
{
    /**
     * Display a listing of the myform.
     *
     * @return \Illuminate\Http\Response
     */

    public function myform()
    {
        return view('myform');
    }

    /**
     * Display a listing of the myformPost.
     * @return \Illuminate\Http\Response
     */

    public function store(StoreUserRequest $request)
    {
        $request['password'] = bcrypt($request->password);
        User::create($request->all());
        return response()->json(['success' => true]);
    }
}
