<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categories()
    {
        return view('pages.back.setups.categories', [
            'categories' => Category::all(),
            'page_uri' => 'categories',
            'parent' => 'setups'
        ]);
    }

    public function sub_categories()
    {
        $subcats = DB::table('categories as c')
            ->join('sub_categories as s', 's.cat_id', '=', 'c.id')
            ->select('s.id', 's.cat_id', 's.name as sname', 'c.name as cname', 's.value', 's.status')
            ->paginate(10);
        return view('pages.back.setups.sub_cats', [
            'categories' => Category::all(),
            'sub_cats' => $subcats,
            'page_uri' => 'sub_categories',
            'parent' => 'setups'
        ]);
    }

    public function add_sub_category(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);

            if ($validator->fails()) {
                return Response()->json([
                    "success" => false,
                    "info" => 'Record Err'
                ]);
            }

            $data = [];
            foreach ($_POST['name'] as $k => $value) {
                $data[] = [
                    'name' => $value,
                    'value' => $_POST['value'][$k],
                    'cat_id' => $_POST['catid'][$k],
                ];
            }
            SubCategory::insert($data);

            return Response()->json([
                "success" => true,
                "info" => 'Record saved successfully'
            ]);
        } catch (\Exception $e) {
            return Response()->json([
                "success" => false,
                "info" => $e->getMessage()
            ]);
        }
    }

    public function edit_sub_category(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);

            if ($validator->fails()) {
                return Response()->json([
                    "success" => false,
                    "info" => 'Record Err'
                ]);
            }


            $data = [
                'name' => $request->name,
                'value' => $request->value,
                'cat_id' => $request->catid,
            ];
            SubCategory::where('id', $request->id)->update($data);

            return Response()->json([
                "success" => true,
                "info" => 'Record saved successfully'
            ]);
        } catch (\Exception $e) {
            return Response()->json([
                "success" => false,
                "info" => $e->getMessage()
            ]);
        }
    }
    //

    public function add_category(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);

            if ($validator->fails()) {
                return Response()->json([
                    "success" => false,
                    "info" => 'Record Err'
                ]);
            }
            $data = [];
            foreach ($_POST['name'] as $value) {
                $data[] = ['name' => $value];
            }
            $res = DB::table('categories')->insert($data);

            return Response()->json([
                "success" => true,
                "info" => 'Record saved successfully'
            ]);
        } catch (\Exception $e) {
            return Response()->json([
                "success" => false,
                "info" => $e->getMessage()
            ]);
        }
    }

    public function edit_category(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);

            if ($validator->fails()) {
                return Response()->json([
                    "success" => false,
                    "info" => 'Record Err'
                ]);
            }
            $data = [
                'name' => $request->name,
            ];
            DB::table('categories')->where('id', $request->catid)->update($data);

            return Response()->json([
                "success" => true,
                "info" => 'Record saved successfully'
            ]);
        } catch (\Exception $e) {
            return Response()->json([
                "success" => false,
                "info" => $e->getMessage()
            ]);
        }
    }

    public function delete_category($id, $status)
    {
        $newStatus = $status == 1 ? 0 : 1;
        if (Category::where('id', $id)->update(['status' => $newStatus])) {
            echo 1;
        }
    }

    public function delete_sub_category($id, $status)
    {
        $newStatus = $status == 1 ? 0 : 1;
        if (SubCategory::where('id', $id)->update(['status' => $newStatus])) {
            echo 1;
        }
    }
}
