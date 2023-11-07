<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use http\Env\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UserAdmin;

class PageController extends Controller
{
    /**
     * Display all the static pages when authenticated
     *
     * @param string $page
     * @return \Illuminate\View\View
     */
    public function index(string $page)
    {
        if (view()->exists("admin.pages.{$page}")) {
            $data = [];
            switch ($page){
                case 'user-management':
                    $data = DB::table('user_admin')
                        ->select('id', 'email', 'remember_token')
                        ->orderBy('id')
                        ->paginate(10);
            }
            return view("admin.pages.{$page}")->with('data', $data);
        }

        return abort(404);
    }

    public function edit(Request $request, string $page, int $id)
    {
        if(!empty($page)){
            switch ($page){
                case 'user-management':
                    $request->validate([
                        'email' => 'required',
                        'password' => 'required'
                    ]);
                    $dataUpdate= [
                        'email'=> $request->email,
                        'password' => bcrypt($request->password)
                    ];
                    $data = DB::table('user_admin')->where('id', '=', $id)->update($dataUpdate);
            }
        }

        return abort(404);
    }

    public function delete(string $page, int $id)
    {
        var_dump($page);
        var_dump($id);
        die(1);
    }

    public function profile()
    {
        $data = [];
        $data['email']= auth('admin')->user()->email;
        return view("admin.pages.profile-static")->with('data', $data);
    }

    public function signin()
    {
        return view("admin.pages.sign-in-static");
    }

    public function signup()
    {
        return view("admin.pages.sign-up-static");
    }
}
