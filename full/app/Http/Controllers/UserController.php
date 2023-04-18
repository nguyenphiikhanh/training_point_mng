<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Utils\AppUtils;
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
    public function index(Request $request)
    {

        $list_khoa = DB::table('khoas')->get();
        $id_khoa = $request->get('khoa_filter');
        $listUsers = User::select('users.*', 'khoas.ten_khoa as tenKhoa')
        ->leftJoin('khoas','khoas.id','users.id_khoa')
        ->whereIn('users.role',[RoleUtils::ROLE_BCN_KHOA,RoleUtils::ROLE_CVHT,RoleUtils::ROLE_QLSV]);

        if($id_khoa){
            $listUsers->where('users.id_khoa',$id_khoa);
        }

        $listUsers = $listUsers->paginate(AppUtils::ITEMS_PER_PAGE);

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
    public function store(UserRequest $request)
    {
        //
        try{
            $first_name = $request->first_name;
            $last_name = $request->last_name;
            $username = $request->username;
            $password = $request->password;
            $role = $request->role;
            $id_khoa = $request->id_khoa;
            User::create([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'username' => $username,
                'password' => Hash::make($password),
                'role' => $role,
                'id_khoa' => $id_khoa,
            ]);

            return back()->with('success',__('custom_message.create.success',['attribute' => 'người dùng']));
        }
        catch(\Exception $e){
            Log::error($e->getMessage(). $e->getTraceAsString());
            return back()->with('error', __('custom_message.failed'));
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        //
        try{
            $user = User::find($id);
            if(!$user){
                return back()->with('error', __('custom_message.not_exist',['attribute' => 'Người dùng']));
            }
            else{
                $first_name = $request->first_name;
                $last_name = $request->last_name;
                $username = $request->username;
                $role = $request->role;
                $id_khoa = $request->id_khoa;

                $user->update([
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'username' => $username,
                    'role' => $role,
                    'id_khoa' => $id_khoa,
                ]);
                return back()->with('success',__('custom_message.update.success',['attribute' => 'người dùng']));
            }


        }
        catch(\Exception $e){
            Log::error($e->getMessage(). $e->getTraceAsString());
            return back()->with('error', __('custom_message.failed'));
        }
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
        try{
            $user = User::find($id);
            if(!$user){
                return back()->with('error', __('custom_message.not_exist',['attribute' => 'Người dùng']));
            }
            else{
                $user->delete();
                return back()->with('success',__('custom_message.delete.success',['attribute' => 'người dùng']));
            }
        }
        catch(\Exception $e){
            Log::error($e->getMessage(). $e->getTraceAsString());
            return back()->with('error', __('custom_message.failed'));
        }
    }
}
