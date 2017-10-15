<?php
namespace App\Repository;
use App\Models\User;
use Illuminate\Http\Request;

class UserRepository
{
    public function getUsers()
    {
        $users = User::all();
        return $users;
    }
}
?>