<?php

namespace App\Http\Controllers\Admin\Roles;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Role $role)
    {
        return $role;
    }
}
