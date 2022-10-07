<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\UserController;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/positions', function () {
    return view('positions');
});

Route::post('/positions', [PositionController::class, 'save'])->name('positions');

Route::get('/employees', [function () {
    return view("employees", ["employees" => User::with("position")->where("role", "EMPLOYEE")->get()]);
}])->name('employees');

Route::get('/employees/pdf', [UserController::class, 'toPdf']);

Route::post('/employees', [UserController::class, 'save'])->name('employees');

Route::put('/employees', [UserController::class, 'update'])->name('employees');

Route::delete('/employees', [UserController::class, 'delete'])->name('employees');

Route::get('/employees/edit/{id}', function ($id) {
    return view('employee_edit', ['employee' => User::find($id), "positions" => Position::all()]);
})->name('employees_edit');

Route::get('/employees/new', function () {
    return view('employee_form', ["positions" => Position::all()]);
});

Route::get('/reports', function () {
    return view('reports', [
        'employees' => User::with("position")->where("role", "EMPLOYEE")->where("active", 1)->get(),
        'sum_perceptions' => DB::select(DB::raw("SELECT sum(p.salary + p.bonus + p.pantry + p.isr + p.assurance) AS su FROM users u JOIN positions p ON u.position_id = p.id WHERE u.active = 1 AND u.role = 'EMPLOYEE'"))[0]->su,
        'sum_deductions' => DB::select(DB::raw("SELECT sum(p.salary + p.bonus + p.pantry - p.isr - p.assurance) AS su FROM users u JOIN positions p ON u.position_id = p.id WHERE u.active = 1 AND u.role = 'EMPLOYEE'"))[0]->su
    ]);
});

Route::get('/payrrolls', function () {

    return view('payrrolls', [
        'employees' => User::with("position")->where("role", "EMPLOYEE")->where("active", 1)->get(),
        'sum_perceptions' => DB::select(DB::raw("SELECT sum(p.salary + p.bonus + p.pantry) AS su FROM users u JOIN positions p ON u.position_id = p.id WHERE u.active = 1 AND u.role = 'EMPLOYEE'"))[0]->su,
        'sum_deductions' => DB::select(DB::raw("SELECT sum(p.isr + p.assurance) AS su FROM users u JOIN positions p ON u.position_id = p.id WHERE u.active = 1 AND u.role = 'EMPLOYEE'"))[0]->su
    ]);
});

Route::post('/login', [AuthController::class, 'login']);
