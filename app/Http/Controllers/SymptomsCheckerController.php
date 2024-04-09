<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SymptomsCheckerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeData = DB::table('page_contents')->where('page_id', 1)->whereIn('level', [4, 5,7])->get();
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
        return view('pages.front.symptoms-checker', ['title' => 'Pain Map', 'social' => $social, 'latest_advice' => $latest_advice, 'motto' => $motto, 'homedata'=> $homeData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
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
    public function update(Request $request, Partner $partner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.,
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function checkFistQuestionSet($id)
    { 
        $data = DB::table('questions')->where('body_part_id', $id)->where('start', 1)->first();
       if($data){
           echo 1;
       }else{
           echo 0;
       }
    }

    public function deleteQuestionAnswer($id)
    {
        $data = DB::delete('questions')->where('body_part_id', $id);
        if($data){
            echo 1;
        }else{
            echo 0;
        }
    }
}
