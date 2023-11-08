<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\UserAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                    ddBug($request);
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

    public function viewEdit(Request $request, string $page, int $id)
    {
        if(!empty($page)){
            switch ($page){
                case 'user-management':
                    $data = DB::table('user_admin')->where('id', '=', $id)->first();
                    return view("admin.pages.profile-static")->with('data', (array) $data);
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
        $id= auth('admin')->user()->id;
        $data = DB::table('user_admin')->where('id', '=', $id);
        return view("admin.pages.profile-static")->with('data', $data);
    }

    public function editProfile(Request $request)
    {
        $credentials = $request->validate([
            'item[username]' => ['min:6'],
            'item[postal_code]' => ['integer'],
            'item[about_me]' => ['max:255'],
        ]);

        $item = $request['item'];
        if(empty($item['id'])){
            return abort(404);
        }
        try {
            $user = UserAdmin::find($item['id']);
            $user->update($item);

            return  redirect()->route('admin.page', ['user-management']);
//            redirect(route('admin.page', ['user-management']));
        } catch (\Exception $e){
           echo $e->getMessage();
        }
    }
}
