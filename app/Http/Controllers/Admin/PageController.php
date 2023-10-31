<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
            return view("admin.pages.{$page}");
        }

        return abort(404);
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
