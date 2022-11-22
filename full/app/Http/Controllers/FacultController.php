<?php

namespace App\Http\Controllers;

use App\Http\Requests\FacultyRequest;
use App\Http\Utils\AppUtils;
use App\Models\Khoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FacultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $faculties = Khoa::orderBy('id','desc')->paginate(AppUtils::ITEMS_PER_PAGE);
        return view('page.admin.khoa.list',['faculties' => $faculties]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacultyRequest $request)
    {
        //
        try{
            $faculty_name = $request->faculty_name;
            Khoa::create([
                'ten_khoa' => $faculty_name,
            ]);

            return back()->with('success',__('custom_message.create.success',['attribute' => 'Khoa/Ngành học']));
        }
        catch(\Exception $e){
            Log::error($e->getMessage() . $e->getTraceAsString());
            return back()->with('error',__('custom_message.failed'));
        }
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
    public function update(FacultyRequest $request, $id)
    {
        //
        try{
            $faculty = Khoa::find($id);
            if(!$faculty){
                return back()->with('error',__('custom_message.not_exist',['attribute' => 'Khoa/Ngành học']));
            } else {
                $faculty->update([
                    'ten_khoa' => $request->faculty_name,
                ]);
                return back()->with('success',__('custom_message.update.success',['attribute' => 'Khoa/Ngành học']));
            }
        }
        catch(\Exception $e){
            Log::error($e->getMessage() . $e->getTraceAsString());
            return back()->with('error',__('custom_message.failed'));
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
            $faculty = Khoa::find($id);
            if(!$faculty){
                return back()->with('error',__('custom_message.not_exist',['attribute' => 'Khoa/Ngành học']));
            } else {
                $faculty->delete();
                return back()->with('success',__('custom_message.delete.success',['attribute' => 'Khoa/Ngành học']));
            }
        }
        catch(\Exception $e){
            Log::error($e->getMessage() . $e->getTraceAsString());
            return back()->with('error',__('custom_message.failed'));
        }
    }
}
