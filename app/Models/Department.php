<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'department';
    protected $fillable = [
        'name'
    ];

    public function getUsers()
    {
        $user_department = UserDepartment::where('department_id', $this->id)->get();
        return User::whereIn('id', $user_department->pluck('user_id'))->get();
    }
}
