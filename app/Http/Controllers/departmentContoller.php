<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class departmentContoller extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', null);

        $departments = Department::when($search, function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        })->get();

        return $this->respondWithSuccess('Successfully return departments', array_values($departments->toArray()));
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'name' => 'required|max:155|unique:department',
            'description' => 'nullable|max:255',
        ]);

        if ($validation->fails()) {
            return $this->respondwithError('Error while trying to create department', $validation->messages()->toArray());
        }

        $department = Department::create([
            'name' => $request->input('name'),
            'description' => $request->input('description') ?? null
        ]);

        if ($department) {
            return $this->respondWithSuccess('Successfully created department', $department->toArray());
        } else {
            return $this->respondWithError('Error while trying to create department');
        }
    }

    public function update(Request $request, Department $department)
    {
        $validation = Validator::make($request->all(),[
            'name' => 'required|max:155|unique:department',
            'description' => 'nullable|max:255',
        ]);

        if ($validation->fails()) {
            return $this->respondwithError('Error while trying to create department', $validation->messages()->toArray());
        }

        $department->update($request->only('name', 'description'));
        return $this->respondWithSuccess('Successfully updated department', $department->toArray());
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return $this->respondWithSuccess('Successfully delete department');
    }
}
