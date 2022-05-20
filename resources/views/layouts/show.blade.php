@extends('layouts.app')
@section('sidebar')
    @parent
    <h2 style="color: white; margin-left:auto">{{ $post->name }}</h2>
@endsection
@section('content')
    <link rel="stylesheet" href="{{ URL::asset('css/flip.css') }}">
    <div class="colonna2">

        <div class="card middle border-0" style="align-items: center;">
            <div class='front' id="front">
                <div class="form-contatto2">
                    <div class="row">
                        <div class="justify-content-center">
                            <img src="{{ asset('storage/BSBK.png') }}" alt="Bangladesh Land Port Authority" height="80px"
                                width="80px">
                        </div>
                        <h6 class="justify-content-center">বাংলাদেশ স্থলবন্দর কর্তৃপক্ষ</h6>
                        <h5 class="justify-content-center" style="line-height: 0.7;">বেনাপোল স্থলবন্দর</h5>
                        <h5 class="justify-content-center" style="line-height: 0.7;">Bangladesh Land Port Authority</h5>
                        <strong class="justify-content-center" style="line-height: 0.7;">Benapole Land Port</strong>
                        
                            <strong class="justify-content-center">{{ $post->category_id }}</strong>
                            <h4 class="justify-content-center">পরিচয় পত্র</h4>
                            <h6 class="justify-content-center">কার্ড নং-..P{{ $post->id }}</h6>
                        
                        <div class="d-flex flex-row-reverse" style="margin-top: -90px; padding-right: 50px;">
                            <img src="{{ asset('storage/' . $post->photo) }}" class="img-responsive" height="160px">
                        </div>
                        <div class="left-form" style="margin-top: -50px;">
                            <br>
                            <strong>নাম:</strong> {{ $post->name }}
                            <br>
                            <strong>পিতার নাম:</strong> {{ $post->father }}
                            <br>
                            <strong>মাতার নাম:</strong> {{ $post->mother }}
                            <br>
                            <strong>ঠিকানা:</strong> গ্রাম:-{{ $post->village }},
                            পোষ্ট:-{{ $post->post }}, ইউনিয়ন:-{{ $post->union }}, <br>
                            থানা:-{{ $post->thana }}, জেলা:-{{ $post->district }}।
                            <br><br>
                        </div>
                        <div class="left-form">
                            <strong style="margin-left: 2%;">স্বাক্ষার/টিপসহি:</strong>
                        </div>
                        <div class="d-flex flex-row-reverse" style="padding-right: 20px;">
                            <strong >পরিচালক (ট্রাফিক)</strong>
                        </div>
                        <div class="d-flex flex-row-reverse">
                            <strong >বেনাপোল স্থালবন্দর।</strong>
                        </div>
                    </div>
                    <a class="btn btn-primary d-print-none" id='btne' href="{{ route('posts.edit', $post->id) }}"><i
                            class="fas fa-edit"></i></a>
                    <button type='button' id='btnpf' class="btn btn-info d-print-none" onclick='front();'><i
                            class="fas fa-print"></i></button>
                           

                </div>
            </div>
            <div class='back' id="back">
                <div class="form-contatto2">
                    <div class="row" style="margin-left: 20px; margin-right: 15px;">
                        <div class="d-flex justify-content-center">
                            <h2>নিয়মাবলী</h2>
                        </div>
                        <br><br>
                        <p class="d-flex align-items-start fs-5 lh-sm text-justify">১ । এ কার্ডটি হস্তান্তর যোগ্য নয়। কর্তব্য পালন কাজে গলায় দৃশ্যমান অবস্থায় ঝুলিয়ে রাখতে হবে।</p>
                            <p class="d-flex align-items-start fs-5 lh-sm text-justify">২ । দায়িত্ব পালনকালে নির্দিষ্ট পােষাক পরিধান করতে হবে।</p>
                            <p class="d-flex align-items-start fs-5 lh-sm text-justify">৩। কার্ডধারী বন্দরের সকল বিধি-বিধান মেনে চলতে বাধ্য থাকবেন।</p>
                        <p  class="d-flex align-items-start fs-5 lh-sm text-justify">৪ । কতৃপক্ষ কর্তৃক নির্ধারিত হারের অতিরিক্ত মজুরী গ্রহণ করা যাবে না।</p>
                            <p class="d-flex align-items-start fs-5 lh-sm text-justify">৫ । যাত্রীর  নিজে  বহনকৃত লাগেজের উপর কোন মজুরী দাবী করা যাবে না।</p>
                        <p class="d-flex align-items-start fs-5 lh-sm text-justify">
                            ৬ । কার্ডটি হারিয়ে গেলে বেনাপােল বন্দর থানায় সাধারণ ডাইরী  করার পর বন্দর কর্তৃপক্ষের নিকট আবেদন করতে হবে এবং ১০০/- (একশত) টাকা জমা দিয়ে নতুন কার্ড সংগ্রহ করা যাবে।</p>
                        <p class="d-flex align-items-start fs-5 lh-sm text-justify">৭ । কোন ব্যক্তি এ কার্ডটি পেলে নিকটস্থ থানা অথবা বেনাপােল স্থল বন্দর দপ্তরে জমা দেবেন।</p>
                        <p class="d-flex align-items-start fs-5 lh-sm text-justify">৮ । এ কার্ডটির সংরক্ষণ/বাতিল করার ক্ষমতা বেনাপোেল স্থল বন্দরের এক্তিয়ারাধীন।</p>
                    </div>
                                        <button type='button' id='btnpb' class="btn btn-info d-print-none" onclick='back();'><i
                            class="fas fa-print"></i></button>
                </div>
            </div>
        </div>
        <div class='r_wrap d-print-none' id="flip">
            <div class='b_round'></div>
            <div class='s_round'>
                <div class='s_arrow'></div>
            </div>
        </div>
    </div>




    <script type="text/javascript">
        function front() {
            $("#back").hide();
            window.print();
            return false;
        };
        function back() {
            window.print();
            return false;
        };
        window.onafterprint = reload;
        function reload() {
            $("#back").show();
        };

        $(document).ready(function() {
            var s_round = '.s_round';
            $(s_round).hover(function() {
                $('.b_round').toggleClass('b_round_hover');
                return false;
            });
            $(s_round).click(function() {
                $('.card').toggleClass('flipped');
                $(this).addClass('s_round_click');
                $('.s_arrow').toggleClass('s_arrow_rotate');
                $('.b_round').toggleClass('b_round_back_hover');
                return false;
            });

            $(s_round).on('transitionend', function() {
                $(this).removeClass('s_round_click');
                $(this).addClass('s_round_back');
                return false;
            });
        });
    </script>

    </html>
@endsection
