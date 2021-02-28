<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServicesRequest;

use App\Http\Requests\UpdateServicesRequest;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Config;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;


class ServicesController extends Controller
{
    public function index()
    {
        $services = Services::select()->paginate(PAGINATION_COUNT);

        return view('admin.mainservice.index', compact('services'));
    }

    public function create()
    {
        return view('admin.mainservice.create');
    }

    public function store ( ServicesRequest $request)
    {

        try {


            if (!$request->has('statu'))
                $request->request->add(['statu' => 0]);
            else
                $request->request->add(['statu' => 1]);

            $filePath = "";

            if ($request->has('image')) {
                $filePath =uploadImage ('services', $request->image);
            }


            Services::create([
                    'title' => $request->get('title'),
                    'title_desc' => $request->get('title_desc'),
                    'model' => $request->get('model'),

                   'description' => $request->get('description'),
                    'statu' => $request->get('statu'),

                    'image' => $filePath,

                ]);


               return redirect()->route('admin.mainservice')->with(['success' => 'تم حفظ الخدمه  بنجاح']);


              } catch (\Exception $ex) {

        return redirect()->route('admin.mainservice')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
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
        $services = Services::select()->find($id);

        if (!$services) {
            return redirect()->route('admin.mainservice')->with(['error' => 'هذه الخدمه غير موجوده']);
        }

        return view('admin.mainservice.edit', compact('services'));
    }

    public function update($id, UpdateServicesRequest $request)
    {

        try {
            $services = Services::find($id);
            if (!$services) {
                return redirect()->route('admin.mainservice.edit', $id)->with(['error' => 'هذه الخدمه غير موجوده']);
            }

            DB::beginTransaction();
//
//            if (!$request->has('statu'))
//                $request->request->add(['statu' => 1]);


            if ($request->has('image')) {
                $filePath =uploadImage('services', $request->image);
                Services::where('id', $id)
                    ->update([
                        'image' => $filePath,
                    ]);

            }
            if (!$request->has('statu'))
                $request->request->add(['statu' => 0]);
            else
                $request->request->add(['statu' => 1]);

            $data = $request->except('_token', 'id','image');

            Services::where('id', $id) ->update( $data  );

            DB::commit();

            return redirect()->route('admin.mainservice')->with(['success' => 'تم تحديث الخدمه بنجاح']);

        } catch (\Exception $ex) {
            Return($ex);
            return redirect()->route('admin.mainservice')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }

    public function destroy($id)
    {

        try {
            $services = Services::find($id);
            if (!$services) {
                return redirect()->route('admin.mainservice', $id)->with(['error' =>'هذه الخدمه غير موجوده']);
            }
            $services->delete();

            return redirect()->route('admin.mainservice')->with(['success' => 'تم حذف الخدمه بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.mainservice')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }

    public function changeStatus($id)
    {
        try {
            $services = Services::find($id);

            if (!$services)
                return redirect()->route('admin.mainservice')->with(['error' => 'هذا الخدمه غير موجود ']);

            $status =  $services ->statu  == 0 ? 1 : 0;

            $services -> update(['statu' =>$status ]);

            return redirect()->route('admin.mainservice')->with(['success' => ' تم تغيير الحالة بنجاح ']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.mainservice')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
