<?php

namespace App\Http\Controllers;

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
    public function show(User $user)
    {
        try
        {
            if(Auth::user()->role == 'admin' || Auth::user()->id == $user->id)
            {
                return view('users.show', compact('user'));
            }
            else
            {
                return redirect()->back()->withErrors('You do not have access');
            }
        }
        catch (\Exception $ex)
        {
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }
    public function create()
    {
        return view('users.create');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('users');
    }
}
