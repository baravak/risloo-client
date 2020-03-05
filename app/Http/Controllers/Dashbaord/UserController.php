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

    public function create(Request $request)
    {
        return view('dashboard.users.create', $this->data);
    }

    public function store(Request $request)
    {
        return User::apiStore($request->except('_method'))->response()->json([
            'redirect' => route('dashboard.users.create')
        ]);
    }

    public function edit(Request $request, $user)
    {
        $this->data['user'] = User::apiShow($user);
        return view('dashboard.users.create', $this->data);
    }
}
