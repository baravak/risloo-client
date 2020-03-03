<?php
namespace App\Http\Controllers\Dashbaord;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $this->data['users'] = User::apiIndex($request->all(['order', 'sort', 'status', 'type', 'gender']));
        return view('dashboard.users.index', $this->data);
    }
}
