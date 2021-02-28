<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LocalRequest;
use App\Http\Requests\PartnersRequest;


use App\Http\Requests\UpdateLocalRequest;
use App\Models\Banks;
use App\Models\Partners;
use App\Models\PartnersLocal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Config;


class PartnersLocalController extends Controller
{
    public function index()
    {
        $local =PartnersLocal::select()->paginate(PAGINATION_COUNT);

        return view('admin.localparnters.index', compact('local'));
    }

    public function create()
    {
        $banks =Banks::all() ;
        return view('admin.localparnters.create',compact('banks'));
    }

    public function store (LocalRequest $request)
    {

        try {


//            if (!$request->has('statu'))
//                $request->request->add(['statu' => 0]);
//            else
//                $request->request->add(['statu' => 1]);

            $filePath = "";
            $filePath1="";

            if ($request->has('logo')) {
                $filePath1 =uploadImage1 ('Localpartners','logos', $request->logo);
            }
            if ($request->has('image')) {
                $filePath =uploadImage1 ('Localpartners','image', $request->image);
            }



            PartnersLocal::create([
                    'title' => $request->get('title'),

                    'model' => $request->get('model'),


                   'description' => $request->get('description'),
                    'logo' =>$filePath1,

                    'image' => $filePath,
                'bank_id' => $request->get('bank_id'),

                ]);


               return redirect()->route('admin.localparnters')->with(['success' => 'تم حفظ الوكيل  بنجاح']);


              } catch (\Exception $ex) {

        return redirect()->route('admin.localparnters')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }


//        try {
//
//            Language::create($request->except(['_token']));
//            return redirect()->route('admin.languages')->with(['success' => 'تم حفظ الاسلايد  بنجاح']);
//        } catch (\Exception $ex) {
//            return redirect()->route('admin.languages')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
//        }
    }

    public function edit($id)
    {
        $Partners = PartnersLocal::select()->find($id);
        if (!$Partners) {
            return redirect()->route('admin.localparnters')->with(['error' => 'هذه الوكيل غير موجوده']);
        }

        return view('admin.localparnters.edit', compact('Partners'));
    }

    public function update($id, UpdateLocalRequest $request)
    {

        try {
            $local = PartnersLocal::find($id);
            if (!$local) {
                return redirect()->route('admin.localparnters.edit', $id)->with(['error' => 'هذه الخدمه غير موجوده']);
            }


//            if (!$request->has('logo'))
//                $request->request->add(['statu' => 1]);

            DB::beginTransaction();

            if ($request->has('logo')) {
                $filePath1 =uploadImage1 ('Localpartners','logos', $request->logo);
                PartnersLocal::where('id', $id)
                    ->update([
                        'logo' => $filePath1,
                    ]);

            }
            if ($request->has('image')) {
                $filePath =uploadImage1 ('Localpartners','image', $request->image);
                PartnersLocal::where('id', $id)
                    ->update([
                        'image' => $filePath,
                    ]);

            }

            $data = $request->except('_token', 'id', 'logo','image');
            PartnersLocal::where('id', $id)
                ->update(
                    $data
                );

//            $Partners->update($request->except('_token', 'logos', 'image'));
            DB::commit();
            return redirect()->route('admin.localparnters')->with(['success' => 'تم تحديث الخدمه بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.localparnters')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }

    public function destroy($id)
    {

        try {
            $local = PartnersLocal::find($id);
            if (!$local) {
                return redirect()->route('admin.localparnters', $id)->with(['error' =>'هذه الخدمه غير موجوده']);
            }
            $local->delete();

            return redirect()->route('admin.localparnters')->with(['success' => 'تم حذف الخدمه بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.localparnters')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }

    public function changeStatus($id)
    {
        try {
            $local = Partners::find($id);

            if (!$local)
                return redirect()->route('admin.localparnters')->with(['error' => 'هذا الخدمه غير موجود ']);

            $status =  $local ->statu  == 0 ? 1 : 0;

            $local -> update(['statu' =>$status ]);

            return redirect()->route('admin.localparnters')->with(['success' => ' تم تغيير الحالة بنجاح ']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.localparnters')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
