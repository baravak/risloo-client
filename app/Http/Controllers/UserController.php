<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::apiIndex();
        return view('dashboard.users.index', $this->data);
    }
}
