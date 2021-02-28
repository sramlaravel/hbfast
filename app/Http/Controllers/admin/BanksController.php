<?php

namespace App\Http\Controllers\Admin;

use App\country;
use App\Http\Controllers\Controller;
use App\Http\Requests\BanksRequest;
use App\Models\Banks;
use App\Models\Comenews;



use  Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BanksController extends Controller
{


    public function index()
    {
        $Banks = Banks::selection()->paginate(PAGINATION_COUNT);

        return view('admin.Banks.index', compact('Banks'));
    }

    public function create()
    {



        return view('admin.Banks.create' );
    }



    public function store(BanksRequest $request)
    {

        try {

//            if (!$request->has('active'))
//                $request->request->add(['active' => 0]);
//            else
//                $request->request->add(['active' => 1]);


            $filePath = "";
            if ($request->has('image')) {
                $filePath = uploadImage('Banks', $request->image);
            }

            Banks::create([
                'name' => $request->get('name'),

                'image' =>$filePath,

            ]);



            return redirect()->route('admin.banks')->with(['success' => 'تم الحفظ بنجاح']);

        } catch (\Exception $ex) {
return  $ex;
            return redirect()->route('admin.banks')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }

    public function edit($id)
    {
        try {

            $Banks = Banks::select()->find($id);
            if (!$Banks){   return redirect()->route('admin.banks')->with(['error' => 'هذا الخبر  غير موجود او ربما يكون محذوفا ']);}

            return view('admin.banks.edit', compact('Banks' ));

        } catch (\Exception $exception) {
            return redirect()->route('admin.banks')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function update($id, BanksRequest $request)
    {

        try {

            $Banks = Banks::find($id);
            if (!$Banks)
                return redirect()->route('admin.banks')->with(['error' => 'هذا  البنك غير موجود او ربما يكون محذوفا ']);


       DB::beginTransaction();



            $filePath ="";
            if ($request->has('image') ) {
                $filePath = uploadImage( 'Banks' ,$request->image);
            }

                Banks::where('id', $id)
                    ->update([
                        'image' => $filePath,
                    ]);


//
//            if (!$request->has('active'))
//                $request->request->add(['active' => 0]);
//            else
//                $request->request->add(['active' => 1]);

             $data = $request->except('_token', 'id' ,'image' );

//            if ($request->has('password') && !is_null($request->  password)) {
//
//                $data['password'] = $request->password;
//            }

            Banks::where('id', $id)
                ->update(
                    $data
                );

            DB::commit();
            return redirect()->route('admin.banks')->with(['success' => 'تم التحديث بنجاح']);
        } catch (\Exception $exception) {
            return $exception;
            DB::rollback();
            return redirect()->route('admin.banks')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }
    public function destroy($id)
    {

        try {
            $Banks = Banks::find($id);
            if (!$Banks) {
                return redirect()->route('admin.banks', $id)->with(['error' =>'هذه  الخبر  غير موجوده']);
            }
            $Banks->delete();

            return redirect()->route('admin.banks')->with(['success' => 'تم حذف الخبر  بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.banks')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }
    public function changeStatus()
    {

    }


}
