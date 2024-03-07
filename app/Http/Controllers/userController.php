<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', null);
        $filter_department_id = $request->input('department_id', null);

        $users = User::whereNull('deleted_at');
        if (!is_null($search)) {
            $users->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        }
        $users = $users->get();
        if (!is_null($filter_department_id)) {
            $users = $users->filter(function ($user) use ($filter_department_id) {
                return $user->getDepartment()->id == $filter_department_id;
            });
        }

        foreach ($users as &$user) {
            $user->department = $user->getDepartment();
        }

        return $this->respondWithSuccess('', array_values($users->toArray()));
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'email' => 'required|unique:users|email|max:255',
            'name' => 'required',
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'phone_num' => 'nullable',
            'department_id' => 'required|exists:department,id',
        ]);

        if ($validation->fails()) {
            return $this->respondwithError('Error while trying to create user', $validation->messages()->toArray());
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'first_name' => $request->input('first_name') ?? null,
            'last_name' => $request->input('last_name')  ?? null,
            'phone_num' => $request->input('phone_num')  ?? null
        ]);

        if ($user && $request->input('department_id')) {
            if (Department::where('id', $request->input('department_id'))->first()){
                $user->attachDepartment($request->input('department_id'));
            }
        }

        if ($user) {
            $user->department = $user->getDepartment();
        }

        return $this->respondWithSuccess('Successfully create new user', $user->toArray());
    }

    public function show(User $user)
    {
        if (!$user) {
            return $this->respondWithError('User not found');
        }

        $results = [...$user->toArray()];
        if ($department = $user->getDepartment()) {
            $results = array_merge($results, ['department' => $department->toArray()]);
        }

        return $this->respondWithSuccess('Successfully get user by id', $results);
    }

    public function update(Request $request, User $user)
    {
        $validation = Validator::make($request->all(),[
            'name' => 'required',
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'phone_num' => 'nullable',
            'department_id' => 'nullable|exists:department,id',
        ]);

        $department_id = $request->input('department_id', null);

        if ($validation->fails()) {
            return $this->respondwithError('Error while trying to update user', $validation->messages()->toArray());
        }

        // check if has changes from old data
        $has_changes = false;
        $attributes = ['name', 'first_name', 'last_name', 'phone_num'];
        foreach ($attributes as $attribute) {
            if ($user->$attribute != $request->$attribute) {
                $has_changes = true;
                break;
            }
        }

        if ($has_changes) {
            $user->update($request->only($attributes));
        }

        if ($department_id) {
            $user_department = $user->user_department;
            $user_department->department_id = $department_id;
            $user_department->save();
        }

        return $this->respondWithSuccess('Successfully update user', $user->toArray());
    }

    public function destroy(User $user)
    {
        $user->delete();
        return $this->respondWithSuccess('Successfully delete user');
    }
}
