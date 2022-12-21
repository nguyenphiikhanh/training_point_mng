<?php

namespace App\Http\Controllers;

use App\Http\Utils\RoleUtils;
use App\Models\DotXetDuyet;
use App\Models\Khoa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $list_khoa = DB::table('khoas')->get();
        $listUsers = User::select('users.*', 'khoas.ten_khoa as tenKhoa')
        ->leftJoin('khoas','khoas.id','users.id_khoa')
        ->whereIn('users.role',[RoleUtils::ROLE_BCN_KHOA,RoleUtils::ROLE_CVHT,RoleUtils::ROLE_QLSV])
        ->get();
// dd($listUsers);

        return view('page.admin.user.users',[
            'list_khoa' => $list_khoa,
            'listUsers' => $listUsers,
        ]);
    }

    public function password_change_view(){
        return view('page.changePassword');
    }

    public function password_change(Request $request){
        try {
            $user = \auth()->user();
            $old_password = $request->old_password;
            $new_password = $request->new_password;

            if(!Hash::check($old_password,$user->password)){
                return back()->with('error',__('auth.password.old.not_match'));
            } else {
                User::find($user->id)->update([
                    'password' => Hash::make($new_password),
                ]);
                return back()->with('success',__('auth.password.change.success'));
            }
        }
        catch(\Exception $e){
            Log::error($e->getMessage(). $e->getTraceAsString());
            return back()->with('error', __('custom_message.failed'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return back()->with('error', __('custom_message.failed'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
