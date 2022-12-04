<?php

namespace App\Http\Controllers;

use App\Http\Utils\AppUtils;
use App\Models\DotXetDuyet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $times = DotXetDuyet::orderBy('id','desc');
        if($request->details){
            $times->where('name','like',"%$request->details%");
        }
        $times = $times->paginate(AppUtils::ITEMS_PER_PAGE);
        return view('page.admin.times.list',['times' => $times]);
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
        try{
            $time_content = $request->time_content;
            $end_time = $request->end_time;
            //convert end_time
            $end_time = str_replace('/','-',$end_time);
            //
            DotXetDuyet::create([
                'name' => $time_content,
                'deadline' => date('Y-m-d H:i',strtotime($end_time)),
            ]);

            return back()->with('success','Mở xét duyệt thành công!');
        }
        catch(\Exception $e){
            Log::error($e->getMessage(). $e->getTraceAsString());
            return back()->with('error',__('custom_message.failed'));
        }
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
        try{
            $time = DotXetDuyet::find($id);
            if(!$time){
                return back()->with('error',__('custom_message.not_exist',['attribute' => 'Đợt xét duyệt này']));
            }
            else{
            $time_content = $request->time_content;
            $end_time = $request->end_time;
            //convert end_time
            $end_time = str_replace('/','-',$end_time);
            //
            $time->update([
                'name' => $time_content,
                'deadline' => date('Y-m-d H:i',strtotime($end_time)),
            ]);

            return back()->with('success',__('custom_message.update.success',['attribute' => 'đợt xét duyệt']));
            }

        }
        catch(\Exception $e){
            Log::error($e->getMessage(). $e->getTraceAsString());
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
    }
}
