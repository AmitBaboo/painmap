<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;

class PageController extends Controller
{
    public function pageMap()
    {
        return $page = [
            'admin-about' => 2,
            'admin-home' => 1,
            'admin-advice' => 3,
            'admin-faq' => 4,
            'admin-product' => 5,
            'admin-blog' => 6,
            'admin-contact' => 7,
            'admin-painmap' => 9,
            'admin-landing' => 10,
        ];
    }
    public function subcats($page_id)
    {
        return  DB::select('select s.id,s.cat_id,s.name sname,c.name cname,s.value,s.status,c.page_id from sub_categories s join categories c on s.cat_id=c.id where page_id=:pid', ['pid' => $page_id]);
    }

    public function index(Request $request)
    {
        $page_segment = $request->segment(1);
        $pageId = $this->pageMap();
        $pages = $this->getPages($pageId[$page_segment], '', '', '');

        return view('pages.back.admin-about', [
            'pages' => $pages,
            'page_uri' => $page_segment,
            'parent' => 'pages'
        ]);
    }

    public function load_page_content($pageId)
    {
        $pages = $this->getPages($pageId, '', '', '');
        return view('pages.back.components.load_page_content', ['pages' => $pages]);
    }

    function getMainPageId($id)
    {
        return DB::table('page_contents')->select('page_id')->where('id', $id)->first()->page_id;
    }

    public function getPages($pageId = '', $status = '', $level = '', $page_content_id = '')
    {
        if ($pageId == '' && $status == '' && $level == '' && $page_content_id != '') {
            $query = DB::table('pages as p')
                ->join('page_contents as c', 'p.id', '=', 'c.page_id')
                ->leftJoin('sub_categories as s', 's.id', '=', 'c.category')
                ->select('c.id', 'c.body', 'order_no', 'c.title', 'c.sub_title', 'c.body', 'c.file_path', 'c.file_caption', 'c.status', 'c.level', 'c.file_type', 'c.page_id', 's.name', 's.id as subcat_id')
                ->where('c.id', $page_content_id)
                ->orderBy('c.order_no', 'asc')
                ->first();
        } elseif ($pageId != '' && $status != '' && $level != '' && $page_content_id == '') {
            $query = DB::table('pages as p')
                ->join('page_contents as c', 'p.id', '=', 'c.page_id')
                ->leftJoin('sub_categories as s', 's.id', '=', 'c.category')
                ->select('c.id', 'c.body', 'order_no', 'c.title', 'c.sub_title', 'c.body', 'c.file_path', 'c.file_caption', 'c.status', 'c.level', 'c.file_type', 'c.page_id', 's.name', 's.id as subcat_id')
                ->where('c.page_id', $pageId)
                ->where('c.status', $status)
                ->where('c.level', $level)
                ->orderBy('c.order_no', 'asc')
                ->get();
        } elseif ($pageId != '' && $status != '' && $level == '' && $page_content_id == '') {
            $query = DB::table('pages as p')
                ->join('page_contents as c', 'p.id', '=', 'c.page_id')
                ->leftJoin('sub_categories as s', 's.id', '=', 'c.category')
                ->select('c.id', 'c.body', 'order_no', 'c.title', 'c.sub_title', 'c.body', 'c.file_path', 'c.file_caption', 'c.status', 'c.level', 'c.file_type', 'c.page_id', 's.name', 's.id as subcat_id')
                ->where('c.page_id', $pageId)
                ->where('c.status', $status)
                ->orderBy('c.order_no', 'asc')
                ->get();
        } elseif ($pageId != '' && $status == '' && $level != '' && $page_content_id == '') {
            $query = DB::table('pages as p')
                ->join('page_contents as c', 'p.id', '=', 'c.page_id')
                ->leftJoin('sub_categories as s', 's.id', '=', 'c.category')
                ->select('c.id', 'c.body', 'order_no', 'c.title', 'c.sub_title', 'c.body', 'c.file_path', 'c.file_caption', 'c.status', 'c.level', 'c.file_type', 'c.page_id', 's.name', 's.id as subcat_id')
                ->where('c.page_id', $pageId)
                ->where('c.level', $level)
                ->orderBy('c.order_no', 'asc')
                ->get();
        } elseif ($pageId != '' && $status == '' && $level == '' && $page_content_id == '') {
            $query = DB::table('pages as p')
                ->join('page_contents as c', 'p.id', '=', 'c.page_id')
                ->leftJoin('sub_categories as s', 's.id', '=', 'c.category')
                ->select('c.id', 'c.body', 'order_no', 'order_no', 'c.title', 'c.sub_title', 'c.body', 'c.file_path', 'c.file_caption', 'c.status', 'c.level', 'c.file_type', 'c.page_id', 's.name', 's.id as subcat_id')
                ->where('c.page_id', $pageId)
                ->orderBy('c.order_no', 'asc')
                ->get();
        }

        return $query;
    }

    public function page_editable_content($pageId)
    {
        $pages = $this->getPages('', '', '', $pageId);
        $levels = [
            // about
            ['id' => 1, 'name' => 'level 1', 'page_id' => 2],
            ['id' => 2, 'name' => 'level 2', 'page_id' => 2],
            ['id' => 3, 'name' => 'level 3', 'page_id' => 2],
            // home
            ['id' => 1, 'name' => 'level 1', 'page_id' => 1],
            ['id' => 2, 'name' => 'level 2', 'page_id' => 1],
            ['id' => 3, 'name' => 'level 3', 'page_id' => 1],
            ['id' => 4, 'name' => 'footer', 'page_id' => 1],
            ['id' => 5, 'name' => 'social media', 'page_id' => 1],
            ['id' => 6, 'name' => 'level 6', 'page_id' => 1],
            ['id' => 7, 'name' => 'Disclaimer', 'page_id' => 1],
            ['id' => 8, 'name' => 'privacy', 'page_id' => 1],
            ['id' => 9, 'name' => 'Cookie', 'page_id' => 1],

            // contact
            ['id' => 1, 'name' => 'level 1', 'page_id' => 7],
            ['id' => 2, 'name' => 'level 2', 'page_id' => 7],
            ['id' => 3, 'name' => 'level 3', 'page_id' => 7],
            // article
            ['id' => 1, 'name' => 'level 1', 'page_id' => 6],
            ['id' => 2, 'name' => 'level 2', 'page_id' => 6],
            ['id' => 3, 'name' => 'level 3', 'page_id' => 6],
            // advice
            ['id' => 1, 'name' => 'level 1', 'page_id' => 3],
            ['id' => 2, 'name' => 'level 2', 'page_id' => 3],
            ['id' => 3, 'name' => 'level 3', 'page_id' => 3],
            // fags
            ['id' => 1, 'name' => 'level 1', 'page_id' => 4],
            ['id' => 2, 'name' => 'level 2', 'page_id' => 4],
            ['id' => 3, 'name' => 'level 3', 'page_id' => 4],
            // products
            ['id' => 1, 'name' => 'level 1', 'page_id' => 5],
            ['id' => 2, 'name' => 'level 2', 'page_id' => 5],
            ['id' => 3, 'name' => 'level 3', 'page_id' => 5],
            // painmap
            ['id' => 1, 'name' => 'level 1', 'page_id' => 9],
            ['id' => 2, 'name' => 'level 2', 'page_id' => 9],
            // landing page
            ['id' => 1, 'name' => 'level 1', 'page_id' => 10],
        ];
        $mainPageId = $this->getMainPageId($pageId);
        return view('pages.back.components.page_editable_content', ['pages' => $pages, 'levels' => $levels, 'subcats' => $this->subcats($mainPageId)]);
    }

    public function page_add_content($pageId)
    {
        $pages = $this->getPages($pageId, '', '', '');
        return view('pages.back.components.page_add_content', ['pages' => $pages, 'subcats' => $this->subcats($pageId)]);
    }



    public function add_page_content(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'page_id' => 'required',
                //'level' => 'required',
                // 'su_title' => 'required',
                // 'title' => 'required',
                // 'body' => 'required',
            ]);

            if ($validator->fails()) {
                return Response()->json([
                    "success" => false,
                    "info" => 'Record Err'
                ]);
            }


            $image_path = '';
            if ($request->hasFile('file')) {
                $request->validate([
                    'file' => 'required|mimes:jpg,jpeg,PNG,png|max:204800',
                ]);
                $fileName = time() . '.' . $request->file->extension();
                $file_path = '/assets/front/images/front/page_images';
                $request->file->move(public_path($file_path), $fileName);
                $image_path = $file_path . '/' . $fileName;
            }

            $data = [
                'title' => trim($request->title),
                'sub_title' => trim($request->sub_title),
                'file_caption' => str_replace("watch?v=", "embed/", $request->file_caption), //$request->file_caption,
                'body' => trim($request->body),
                'page_id' => $request->page_id,
                'level' => $request->level,
                'file_path' => $image_path,
                'status' => $request->status,
                'category' => $request->category,
            ];
            DB::table('page_contents')->insert($data);

            return Response()->json([
                "success" => true,
                "page_id" => $request->page_id,
                "info" => 'Record saved successfully'
            ]);
        } catch (\Exception $e) {
            return Response()->json([
                "success" => false,
                "info" => $e->getMessage()
            ]);
        }
    }

    public function edit_page_content(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                //'title' => 'required',
                'page_id' => 'required',
                //'level' => 'required',
                // 'su_title' => 'required',
                // 'title' => 'required',
                // 'body' => 'required',
            ]);

            if ($validator->fails()) {
                return Response()->json([
                    "success" => false,
                    "info" => 'Record Err'
                ]);
            }



            if ($request->hasFile('file')) {
                $request->validate([
                    'file' => 'required|mimes:jpg,jpeg,png,PNG|max:204800000',
                ]);
                $fileName = time() . '.' . $request->file->extension();
                $file_path = '/assets/front/images/front/page_images';
                $request->file->move(public_path($file_path), $fileName);
                $image_path = $file_path . '/' . $fileName;

                $data = [
                    'title' => trim($request->title),
                    'sub_title' => trim($request->sub_title),
                    'file_caption' => str_replace("watch?v=", "embed/", $request->file_caption), //$request->file_caption,
                    'body' => trim($request->body),
                    'page_id' => $request->page_id,
                    'level' => $request->level,
                    'file_path' => $image_path,
                    'status' => $request->status,
                    'category' => $request->category,
                    'order_no' => $request->order,
                ];
            }


            $data_no_image = [
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'file_caption' => str_replace("watch?v=", "embed/", $request->file_caption), //$request->file_caption,
                'body' => $request->body,
                'page_id' => $request->page_id,
                'level' => $request->level,
                'status' => $request->status,
                'category' => $request->category,
                'order_no' => $request->order,
            ];

            if ($request->hasFile('file')) {
                DB::table('page_contents')->where('id', $request->id)->update($data);
                // remove old image
                // if (file_exists(public_path() . $request->old_file_path)) {
                //     unlink(public_path() . $request->old_file_path);
                // }
            } else {
                DB::table('page_contents')->where('id', $request->id)->update($data_no_image);
            }

            return Response()->json([
                "success" => true,
                "page_id" => $request->page_id,
                "info" => 'Record saved successfully'
            ]);
        } catch (\Exception $e) {
            return Response()->json([
                "success" => false,
                "info" => $e->getMessage()
            ]);
        }
    }

    public function delete_page_content($id)
    {
        $page_id = DB::table('page_contents')->where('id', $id)->first()->page_id;
        if (DB::table('page_contents')->where('id', $id)->delete()) {
            return Response()->json([
                "success" => true,
                "page_id" => $page_id,
                "info" => 'record deleted'
            ]);
        } else {
            return Response()->json([
                "success" => false,
                "page_id" => $page_id,
                "info" => 'record not deleted'
            ]);
        }
    }
}