<?php
namespace App\Http\Controllers\Dashbaord;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public $views =[
        'dashboard.users.me' => 'dashboard.users.show'
    ];
    public function index(Request $request)
    {
        $this->data['users'] = User::apiIndex($request->all(['order', 'sort', 'status', 'type', 'gender']));
        return $this->view($request, 'dashboard.users.index');
    }

    public function create(Request $request)
    {
        return $this->view($request, 'dashboard.users.create');
    }

    public function store(Request $request)
    {
        return User::apiStore($request->except('_method'))->response()->json([
            'redirect' => route('dashboard.users.create')
        ]);
    }

    public function edit(Request $request, $user)
    {
        $this->data['user'] = User::apiShow($user)->check('edit');
        return $this->view($request, 'dashboard.users.create');
    }
    public function update(Request $request, $user)
    {
        return User::apiUpdate($user, $request->except('_method'))->response()->json(['redirect' => route('dashboard.users.edit', ['id'=>$user])]);
    }

    public function show(Request $request, $user)
    {
        $this->data['user'] = User::apiShow($user);
        return $this->view($request);
    }

    public function me(Request $request)
    {
        $this->data['user'] = User::me();
        return $this->view($request);
    }
}
