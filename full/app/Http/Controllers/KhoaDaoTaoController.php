<?php

namespace App\Http\Controllers;

use App\Http\Requests\KhoaDaoTaoRequest;
use App\Http\Utils\AppUtils;
use App\Models\KhoaDaoTao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KhoaDaoTaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list_khoaDaoTao = KhoaDaoTao::paginate(AppUtils::ITEMS_PER_PAGE);
        return view('page.admin.khoaDaotao.list',['list_khoaDaoTao' => $list_khoaDaoTao]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KhoaDaoTaoRequest $request)
    {
        //
        try{
            $tenKhoaDaoTao = $request->tenKhoaDaotao;
            Log::debug($tenKhoaDaoTao);
            KhoaDaoTao::create([
                'name' => $tenKhoaDaoTao,
            ]);

            return back()->with('success',__('custom_message.create.success',['attribute' => 'khoá đào tạo']));
        }
        catch(\Exception $e){
            Log::error($e->getMessage() . $e->getTraceAsString());
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
    public function update(KhoaDaoTaoRequest $request, $id)
    {
        //
        try{
            $khoaDaotao = KhoaDaoTao::find($id);
            if(!$khoaDaotao){
                return back()->with('error',__('custom_message.not_exist',['attribute' => 'khoá đào tạo']));
            } else {
                $khoaDaotao->update([
                    'name' => $request->tenKhoaDaotao,
                ]);
                return back()->with('success',__('custom_message.update.success',['attribute' => 'khoá đào tạo']));
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
            $khoa = KhoaDaoTao::find($id);
            if(!$khoa){
                return back()->with('error',__('custom_message.not_exist',['attribute' => 'Khoá đào tạo']));
            }
            else{
            $khoa->delete();
            return back()->with('success',__('custom_message.delete.success',['attribute' => 'Khoá đào tạo']));
            }
        }
        catch(\Exception $e){
            Log::error($e->getMessage(). $e->getTraceAsString());
            return back()->with('error',__('custom_message.failed'));
        }
    }
}
