<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class UserController extends Controller
{
    public function save(Request $req)
    {
        $user = new User($req->input());
        // if ($user->active) {
        //     $user->active = 1;
        // } else {
        //     $user->active = 0;
        // }
        $user->role = 'EMPLOYEE';
        $user->saveOrFail();
        return redirect()->route('employees');
    }

    public function update(Request $req, User $user)
    {
        $user->fill($req->input());
        User::where('id', $req->input("id"))
            ->update([
                'name' => $req->input("name"),
                'position_id' => $req->input("position_id"),
                'active' => $req->input("active"),
            ]);
        return redirect()->route('employees');
    }

    public function delete(Request $req)
    {
        User::destroy($req->input("id"));
        return redirect()->route('employees');
    }

    public function toPdf()
    {
        $employees = User::with("position")->where("role", "EMPLOYEE")->get()->toArray();
        // share data to view
        view()->share('employees', $employees);
        $pdf = PDF::loadView('welcome', $employees);
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }
}
