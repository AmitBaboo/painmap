@extends('layouts.front')
@section('content')
    <style>
        html {
            scroll-behavior: smooth;
        }

    </style>


    <!-- Content Start -->
    <section class="window-full hidden-sm hidden-xs"
        style="position: relative; background: #E3F1FA; margin-top:52px; xpadding-top: 100px; overflow-x:hidden;color:black; display:flex; justify-content: center; align-items:center">
        <div class="" style="position: absolute;">
            <div class="text-center row "
                style="margin-bottom: 3vh;font-size: 4rem;font-weight:bolder; padding-left:15rem;padding-right:15rem">
                {{ $data[0]->title }}
                <br>
                {{ $data[0]->sub_title }}
            </div>

            <div class="row"
                style="margin-bottom: 1vh; padding-left:5vh;padding-right:5vh;position: relative; display:flex; justify-content:center; align-items:center">
                <div class="col-sm-6 "
                    style="border-right: solid black .2vh; xheight: 20vh;font-size: 1.5rem !important; line-height:3rem !important;text-align:left;word-break:keep-all !important; color:black !important; padding-right: 3em">
                    {!! $data[0]->body !!}
                </div>
                <div class="col-sm-6" style="padding-left: 3em;">
                    <div class="emergency-imagex embed-responsive embed-responsive-16by9" style="width: 100% !important;">
                        @foreach ($data as $item)
                            @if (isset($item->level) && $item->level == 1)
                                @if ($item->file_caption != '')
                                    <iframe xstyle="width:100% !important; height:700px" src="{{ $item->file_caption }}"
                                        class="embed-responsive-item"></iframe>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="text-center row"
                    style="margin-bottom: 0.1vh; display:inline-block; display:flex; justify-content:center; ">
                    <a href="/disclaimer" class="btn btn-success"
                        style="border-radius: 5em; height:2em; width: 20rem;font-size: 24px; background:#55B48C">
                        Start Here
                    </a>
                </div>
            </div>

        </div>
    </section><!-- Content End -->

    {{-- mobile --}}
    <section class="window-full hidden-lg hidden-md" style="background: #E3F1FA; margin-top:-5em; color:black;">
        <div class="" style="background: #E3F1FA;">
            <div class="text-center row"
                style="margin-bottom: 1vh;font-size: 2.5rem;font-weight:bolder; padding:1em;margin-top:3em">
                {{ $data[0]->title }}
                <br>
                {{ $data[0]->sub_title }}
            </div>

            {{-- poster="videos/poster.png" --}}
            <div class="col-sm-12" style="margin-bottom: 1em">
                <div class="emergency-imagex embed-responsive embed-responsive-16by9" style="width: 100% !important;">
                    @foreach ($data as $item)
                        @if (isset($item->level) && $item->level == 1)
                            @if ($item->file_caption != '')
                                <iframe style="width:100% !important;" src="{{ $item->file_caption }}"
                                    class="embed-responsive-item"></iframe>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="text-center row"
                style="margin-bottom: 5vh; display:inline-block; display:flex; justify-content:center; ">
                <a href="/disclaimer" class="btn btn-success"
                    style="border-radius: 5em; height:2em; width: 20rem;font-size: 24px; background:#55B48C">
                    Start Here
                </a>
            </div>

            <div class="col-sm-12"
                style=" font-size: 1.5rem !important; line-height:3rem !important;text-align:left;word-break:keep-all !important; color:black !important; margin-top:-2em">
                {!! $data[0]->body !!}
            </div>

        </div>
    </section><!-- Content End -->
    {{-- end mobile --}}

    <script src="{{ asset('assets/front/js/jquery-3.1.1.min.js') }}"></script>
    <script>
        var elements = document.getElementsByClassName('window-full');
        var windowheight = window.innerHeight + "px";

        fullheight(elements);

        function fullheight(elements) {
            for (let el in elements) {
                if (elements.hasOwnProperty(el)) {
                    elements[el].style.height = windowheight;
                }
            }
        }

        window.onresize = function(event) {
            fullheight(elements);
        }
    </script>

@endsection
