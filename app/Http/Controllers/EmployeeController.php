<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    /**
     * Show the employee registration form.
     */
    public function register(): View
    {
        return view('auth.employee-register');
    }

    /**
     * Store a newly created employee.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:store_manager,storekeeper,sales_officer,auditor,it_officer'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'email_verified_at' => now(),
        ]);

        return Redirect::route('login')->with('status', 'Account created successfully! You can now login.');
    }

    /**
     * Show all employees (for employee dashboard).
     */
    public function index()
    {
        // Show all users except admin
        $employees = User::where('role', '!=', 'admin')->get();
        $totalEmployees = $employees->count();
        $activeEmployees = $employees->count();

        return view('employees.index', compact('employees', 'totalEmployees', 'activeEmployees'));
    }
}
