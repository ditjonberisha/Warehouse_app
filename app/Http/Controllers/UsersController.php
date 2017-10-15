<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\UserRepository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except('show');

        $this->repo = new UserRepository();
    }
    public function index()
    {
        $users = $this->repo->getUsers();
        return view('users.index', compact('users'));
    }
    public function show($id)
    {
        try
        {
            $user = User::findOrFail($id);
            if(Auth::user()->role == 'admin' || Auth::user()->id == $id)
            {
                return view('users.show', compact('user'));
            }
        }
        catch (\Exception $ex)
        {
            return redirect('users')->withErrors($ex->getMessage());
        }
    }
    public function create()
    {
        return view('users.create');
    }
    public function edit()
    {

    }
    public function update()
    {

    }
    public function destroy($id)
    {
        try
        {
            $user = User::destroy($id);
            return view('users', compact('user'));
        }
        catch (\Exception $ex)
        {
            return redirect('users')->withErrors($ex->getMessage());
        }
    }
}
