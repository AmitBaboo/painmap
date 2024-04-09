<?php

namespace App\Http\Controllers\back;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


use App\Models\Partner;
use Illuminate\Http\Request;

class SymptomsCheckerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $body_part = DB::table('body_parts')->get();
        $products = DB::table('page_contents')->select('id', 'title')->where('page_id', 5)->get();
        $firstName = Auth::user()->first_name;


        return view('pages.back.symptoms-checker', [
            'body_parts' => $body_part,
            'page_uri' => 'symptons_checker',
            'products' => $products,
            'firstName' => $firstName,
            'parent' => 'features'
        ]);
    }

    public function load_question_answers(Request $request, $bodypartid)
    {
        $request->session()->put('body_part_id', $bodypartid);
        $unique_questions = DB::select("SELECT * from questions  where body_part_id = ? order by start asc", [$bodypartid]);
        $question_ans = DB::select("SELECT q.id,q.question,a.id as answerid,a.next_question_id,a.answer FROM questions q join question_answers a on q.id=a.question_id where q.body_part_id=? order by q.start asc", [$bodypartid]);

        return view('pages.back.components.question_answers', ['questions' => $unique_questions, 'question_ans' => $question_ans]);
    }

    public function getQuestions($questionid = '')
    {
        if ($questionid != '') {
            $question = DB::table('questions')->where('id', $questionid)->get();
        } else {
            $question = DB::table('questions')->get();
        }
        return $question;
    }

    // view for setting question answers
    public function load_question_follow_up($bodypartid, $questionid)
    {
        $questions = $this->getQuestions();
        // $questions = $this->getQuestions($questionid);
        $question_selected = $this->getQuestions($questionid)[0]->question; //$questions[0]->question;
        // $unique_questions = DB::select("SELECT * from questions  where body_part_id = ? order by start asc", [$bodypartid]);
        $unique_questions = DB::select("SELECT q.id,q.question,q.start,q.body_part_id,b.name from questions  q join body_parts b on b.id=q.body_part_id  order by start asc");
        $question = DB::select("SELECT q.id,q.question,a.id as answerid,a.next_question_id,a.answer FROM questions q  join question_answers a on q.id=a.question_id order by q.start asc");
        // $question = DB::select("SELECT q.id,q.question,a.id as answerid,a.next_question_id,a.answer FROM questions q join question_answers a on q.id=a.question_id where q.body_part_id=? order by q.start asc", [$bodypartid]);
        return view('pages.back.components.question_follow_up', ['all_questions' => $questions, 'questions' => $question, 'question' => $question_selected, 'selected_question' => $questionid, 'unique_questions' => $unique_questions, 'selected_quesion_id' => $questionid]);
    }

    public function load_question_update($questionid)
    {
        $question = DB::table("questions")->where("id", [$questionid])->first();
        $q_ans = DB::table("question_answers")->where("question_id", [$questionid])->get();
        $products = DB::table('page_contents')->select('id', 'title')->where('page_id', 5)->get();
        return view('pages.back.components.question_update', ['question' => $question, 'qans' => $q_ans, 'products' => $products]);
    }

    public function set_question_answer(Request $request)
    {
        // $request->Session()->put('prev_question', $request->select_question - 1);
        foreach ($_POST as $k => $p) {
            if ($k == '_token' || $k == 'select_question') {
            } else {

                $ans = explode('_', $p);
                $question = $ans[0];
                $ans = $ans[1];
                $select_question = $_POST['select_question'];

                $question_ansers = [
                    'next_question_id' => $question,
                    'prev' => $select_question - 1
                ];
                DB::table('question_answers')->where('id', $ans)->update($question_ansers);
            }
        }

        return response()->json(['msg' => 'Question Answer Created', 'status' => 200]);
    }

    public function set_init_question(Request $request)
    {
        if (isset($request->body_part_id)) {
            $bodypartid = $request->body_part_id;
            $request->session()->put('body_part_id', $bodypartid);
        } else {
            $bodypartid = $request->session()->get('body_part_id');
        }

        $data = [
            'question' => $request->question,
            'body_part_id' => $bodypartid,
        ];
        $id = DB::table('questions')->insertGetId($data);

        if (isset($request->body_part_id)) {
            $start = 1;
        } else {
            $start = $id;
        }

        DB::table('questions')->where('id', $id)->update(['start' => $start]);

        $question_data = [];
        foreach ($request->answer as $key => $anser) {
            $question_ansers = [
                'question_id' => $id,
                'answer' => $anser,
                //'next_question_id' => $id,
                'video_path' => str_replace("watch?v=", "embed/", $request->url), //$request->url, https://youtu.be/0EWZOEf2K_A
                //'video_path' => str_replace("youtube", "youtube.com/embed", $request->url),//$request->url, https://youtu.be/0EWZOEf2K_A
                'prev' => $id
            ];
            $question_data[] = $question_ansers;
        }
        DB::table('question_answers')->insert($question_data);

        return response()->json(['msg' => 'Question Created', 'status' => 200]);
    }

    public function set_question(Request $request)
    {
        $data = [
            'question' => $request->question,
            'body_part_id' => $request->body_part_id,
        ];
        $id = DB::table('questions')->insertGetId($data);
        DB::table('questions')->where('id', $id)->update(['start' => $id]);
        return response()->json(['msg' => 'Question Created', 'status' => 200]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_final_question(Request $request)
    {
        try {
            $data = [
                'question' => $request->question,
                'body_part_id' => $request->bodyPartId,
                'start' => 0
            ];

            $items = '';

            if ($request->product != '') {
                $items = implode(',', $request->product);
            }

            $id = DB::table('questions')->insertGetId($data);

            $answers_data = [
                'video_path' => str_replace("watch?v=", "embed/", $request->videoPath), //$request->videoPath,
                //'video_path' => str_replace("youtube", "youtube.com/embed", $request->url),//$request->url, https://youtu.be/0EWZOEf2K_A
                'question_id' => $id,
                'items' => $items,
                'redflag' => $request->redflag,
                'video_desc' => $request->video_desc,
                'answer' => '0',
            ];
            DB::table('question_answers')->insert($answers_data);

            return response()->json(['msg' => 'Question Created', 'status' => 200]);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage(), 'status' => 404]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update_question(Request $request)
    {
        try {
            if (isset($request->qans)) {
                $data = [
                    'answer' => $request->qans,
                    'video_path' => str_replace("watch?v=", "embed/", $request->url), //$request->url,
                    'video_desc' => $request->video_desc,
                ];
                if ($request->qans ==  '0') {
                    if ($request->items != '') {
                        $data['items'] = implode(',', $request->items);
                    } else {
                        $data['items'] = '';
                    }
                }
                DB::table('question_answers')->where('id', $request->qid)->update($data);
                return response()->json(['msg' => 'Question Updated 2', 'status' => 200]);
            } else {
                if ($request->makeInitQuestion == 0) {
                    $data = [
                        'question' => $request->question,
                        'start' => $request->qid,
                    ];
                } elseif ($request->makeInitQuestion == 1) {
                    $data = [
                        'question' => $request->question,
                        'start' => 1,
                    ];
                } else {
                    $data = [
                        'question' => $request->question,
                    ];
                }


                DB::table('questions')->where('id', $request->qid)->update($data);
                return response()->json(['msg' => 'Question Updated 1', 'status' => 200]);
            }

            return response()->json(['msg' => 'no update done', 'status' => 404]);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage(), 'status' => 404]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $exist = DB::table('question_answers')->where('next_question_id', $id)->get();

            if (count($exist) > 0) {
                return response()->json(['msg' => 'Has dependant Question', 'status' => 404]);
                exit;
            }
            if (DB::table('questions')->where('id', $id)->delete()) {
                DB::table('question_answers')->where('question_id', $id)->delete();
            }

            return response()->json(['msg' => 'Question Deleted', 'status' => 200]);
        } catch (\Exception $e) {
            return response()->json(['msg' => $e->getMessage(), 'status' => 404]);
        }
    }

    public function deleteQuestionAnswer($id)
    {
        $data = DB::table('question_answers')->where('id', $id)->delete();
        if ($data) {
            echo 200;
        } else {
            echo 0;
        }
    }

    public function addQuestionAnswer(Request $request)
    {
        if ($request->answer != '') {
            $data = [
                'question_id' => $request->id,
                'answer' => $request->answer,
                'video_path' => str_replace("watch?v=", "embed/", $request->url),
                //'video_path' => str_replace("youtube", "youtube.com/embed", $request->url),//$request->url, https://youtu.be/0EWZOEf2K_A
            ];
            $data = DB::table('question_answers')->insert($data);
        } else {
            $data = [
                'video_path' => str_replace("watch?v=", "embed/", $request->url),
                //'video_path' => str_replace("youtube", "youtube.com/embed", $request->url),//$request->url, https://youtu.be/0EWZOEf2K_A
            ];
            $data = DB::table('question_answers')->where('question_id', $request->id)->update($data);
        }


        if ($data) {
            echo 200;
        } else {
            echo 0;
        }
    }
}