<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User; // User modelini içe aktardık


class TeacherController extends Controller
{

    public function search(Request $request)
    {
        $term = $request->get('term');

        $teachers = User::where('role', 'teacher')
            ->where(function($query) use ($term) {
                $query->where('name', 'LIKE', '%' . $term . '%')
                    ->orWhere('email', 'LIKE', '%' . $term . '%');
            })
            ->get();

        return response()->json($teachers);
    }
}
