<?php
namespace App\Http\Controllers\back;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 
    public function xxx($page,$pageId)
    {
        $body_part = DB::table('body_parts')->get();
        return view('pages.back.components.page_editable_content', ['body_parts' => $body_part]);
    }
}
