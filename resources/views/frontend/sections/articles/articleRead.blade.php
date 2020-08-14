@extends('layout')

@section('title', $article->title)
@section('description', $article->meta_description)
@section('keyword', $article->meta_keywords)

@section('content')
    @include('frontend.moduls.static.header')

    <!--Main Start-->
    <main id="sj-main" class="sj-main sj-haslayout sj-sectionspace">
        {{-- add anything here --}}
        <div id="sj-twocolumns" class="sj-twocolumns">
            <div class="container">
                <div class="row">

                    <div class="col-12 col-sm-12 col-md-8 col-lg-9">
                        <div id="sj-content" class="sj-content">
                            <div class="sj-articledetail">
{{--                                <ul class="sj-downloadprint">--}}
{{--                                    <li><a href="javascript:void(0);"><i class="fa fa-print"></i><span>Print Now</span></a></li>--}}
{{--                                    <li><a href="javascript:void(0);"><i class="fa fa-envelope"></i><span>Email Us</span></a></li>--}}
{{--                                    <li><a href="javascript:void(0);"><i class="fa fa-download"></i><span>Download</span></a></li>--}}
{{--                                </ul>--}}

                                <div class="sj-articledescription sj-sectioninnerspace">
                                    <span class="sj-username"><a href="javascript:void(0);">{{$article->author->name}}</a></span>
                                    <h4>{{ $article->title }}</h4>
                                    <div class="sj-description">
                                        {!! $article->body !!}
                                    </div>
                                </div>

                                <figure class="sj-articledetailimg">
                                    <img src="{{ asset('storage')."/".$article->image }}" alt="image description">
                                </figure>

                            </div>
                        </div>
                    </div>

                    @include('frontend.moduls.sidebar')

                </div>
            </div>
        </div>
    </main>
    <!--Main End-->

    @include('frontend.moduls.footer')
@endsection
