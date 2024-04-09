<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function pageMap()
    {
        return  [
            'about' => 2,
            'home' => 1,
            '' => 1,
            'advice' => 3,
            'faq' => 4,
            'product' => 5,
            'article' => 6,
            'contact' => 7,
            'painmap' => 9,
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = $request->segment(1);
        $pageIds = $this->pageMap();


        if ($request->segment(1) == '') {
            $page = 'home';
            $pageId = 1;
        } else {
            $pageId = $pageIds[$request->segment(1)];
        }

        $sort = 'asc';
        $paginate = 100;
        if (in_array($request->segment(1), ['product', 'article', 'advice'])) {
            $sort = 'desc';
            $paginate = 20;
        }
        $pages = DB::table('pages as p')
            ->join('page_contents as c', 'c.page_id', '=', 'p.id')
            ->where('c.page_id', $pageId)
            ->where('c.status', 1)
            ->orderBy('c.order_no', $sort)
            ->paginate($paginate);

        $mostViewed = DB::table('pages as p')
            ->join('page_contents as c', 'c.page_id', '=', 'p.id')
            ->where('c.page_id', $pageIds[$request->segment(1)])
            ->where('c.status', 1)
            ->take(5)
            ->orderBy('views', 'desc')
            ->get();

        // footer infomation

        $homeData = DB::table('page_contents')->where('page_id', 1)->whereIn('level', [4, 5])->get();
        $latest_advice = DB::table('page_contents')->where('page_id', 3)->take(2)->orderBy('id', 'desc')->get();
        $motto['title'] = $homeData[0]->level == 4 ? $homeData[0]->title : '';
        $motto['body'] = $homeData[0]->level == 4 ? $homeData[0]->body : '';

        foreach ($homeData as $so) {
            if ($so->social_id == -2) {
                $social['fb'] = $so->file_caption;
            } elseif ($so->social_id == -3) {
                $social['insta'] = $so->file_caption;
            } elseif ($so->social_id == -1) {
                $social['twitter'] = $so->file_caption;
            }
        }


        return view('pages.front.' . $page, ['pages' => $pages, 'mostViewed' => $mostViewed, 'social' => $social, 'latest_advice' => $latest_advice, 'motto' => $motto]);
    }

    public function disclaimer()
    {
        $homeData = DB::table('page_contents')->where('page_id', 1)->whereIn('level', [4, 5, 7])->get();
        $latest_advice = DB::table('page_contents')->where('page_id', 3)->take(2)->orderBy('id', 'desc')->get();
        $motto['title'] = $homeData[0]->level == 4 ? $homeData[0]->title : '';
        $motto['body'] = $homeData[0]->level == 4 ? $homeData[0]->body : '';

        foreach ($homeData as $so) {
            if ($so->social_id == -2) {
                $social['fb'] = $so->file_caption;
            } elseif ($so->social_id == -3) {
                $social['insta'] = $so->file_caption;
            } elseif ($so->social_id == -1) {
                $social['twitter'] = $so->file_caption;
            }
        }

        $pages = DB::table('pages as p')
            ->join('page_contents as c', 'c.page_id', '=', 'p.id')
            ->where('c.page_id', 8)
            ->where('c.status', 1)
            ->get();

        return view('pages.front.disclaimer', ['pages' => $homeData, 'mostViewed' => '', 'social' => $social, 'latest_advice' => $latest_advice, 'motto' => $motto]);
    }

    public function landing_page()
    {

        $data = DB::table('pages as p')
            ->join('page_contents as c', 'c.page_id', '=', 'p.id')
            ->where('c.page_id', 10)
            ->where('c.status', 1)
            ->get();

        return view('pages.front.landing-page', ['data' => $data]);
    }


    // load article questions
    public function article_details($id)
    {
        DB::select("update page_contents set views = ifnull(views,0) + 1 where id= :id", ['id' => $id]);
        $page = DB::table('pages as p')
            ->join('page_contents as c', 'c.page_id', '=', 'p.id')
            ->where('c.id', $id)
            ->where('c.status', 1)
            ->orderBy('level', 'asc')
            ->first();
        $page_id = DB::table('page_contents')->select('page_id')->where('id', $id)->first()->page_id;
        $pages = DB::table('pages as p')
            ->join('page_contents as c', 'c.page_id', '=', 'p.id')
            ->where('c.page_id', $page_id)
            ->where('c.status', 1)
            ->take(5)
            ->orderBy('views', 'desc')
            ->get();

        $homeData = DB::table('page_contents')->where('page_id', 1)->whereIn('level', [4, 5])->get();
        $latest_advice = DB::table('page_contents')->where('page_id', 3)->take(2)->orderBy('id', 'desc')->get();
        $motto['title'] = $homeData[0]->level == 4 ? $homeData[0]->title : '';
        $motto['body'] = $homeData[0]->level == 4 ? $homeData[0]->body : '';

        foreach ($homeData as $so) {
            if ($so->social_id == -2) {
                $social['fb'] = $so->file_caption;
            } elseif ($so->social_id == -3) {
                $social['insta'] = $so->file_caption;
            } elseif ($so->social_id == -1) {
                $social['twitter'] = $so->file_caption;
            }
        }

        return view('pages.front.article-detail', ['page' => $page, 'pages' => $pages, 'social' => $social, 'latest_advice' => $latest_advice, 'motto' => $motto]);
    }

    public function load_question($id)
    {

        $question = DB::table('questions')
            ->Join('question_answers', 'questions.id', '=', 'question_answers.question_id')
            ->where('question_answers.question_id', $id)
            ->get();
        //print_r($question); exit;

        $products = [];
        if (count($question) < 1) {
            $question = [];
        } else {
            if ($question[0]->answer == '0') {
                $items = $question[0]->items;
                $products = DB::table('page_contents')
                    ->whereIn('id', explode(',', $items))
                    ->get();
            }
        }

        if (count($question) == 0) {
            return view('pages.front.components.load_question', ['notfound' => 0, 'question' => [], 'prev_id' => $id]);
        }
        //print_r($question); exit;

        return view('pages.front.components.load_question', ['question' => $question, 'products' => $products, 'prev_id' => session('prev_id')]);
    }

    public function load_init_question($id)
    {
        $question = DB::table('questions')
            ->Join('question_answers', 'questions.id', '=', 'question_answers.question_id')
            ->where('questions.body_part_id', $id)
            ->where('questions.start', 1)
            ->get();

        if (count($question) == 0) {
            return view('pages.front.components.load_question', ['notfound' => 0, 'question' => [], 'prev_id' => $id]);
        }

        return view('pages.front.components.load_question', ['question' => $question, 'prev_id' => $id]);
    }

    public function policy($type)
    {
        $homeData = DB::table('page_contents')->where('page_id', 1)->whereIn('level', [4, 5])->get();
        $latest_advice = DB::table('page_contents')->where('page_id', 3)->take(2)->orderBy('id', 'desc')->get();
        $motto['title'] = $homeData[0]->level == 4 ? $homeData[0]->title : '';
        $motto['body'] = $homeData[0]->level == 4 ? $homeData[0]->body : '';

        foreach ($homeData as $so) {
            if ($so->social_id == -2) {
                $social['fb'] = $so->file_caption;
            } elseif ($so->social_id == -3) {
                $social['insta'] = $so->file_caption;
            } elseif ($so->social_id == -1) {
                $social['twitter'] = $so->file_caption;
            }
        }


        $policy = DB::table('page_contents')->where('level', $type)->where('page_id', 1)->where('status', 1)->first();
        //dd($policy->body);
        return view('pages.front.policy', ['policy' => $policy, 'social' => $social, 'latest_advice' => $latest_advice, 'motto' => $motto]);
    }
}