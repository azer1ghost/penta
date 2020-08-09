@extends('layout')

@section('title', $page->title)
@section('description', $page->meta_description)
@section('keyword', $page->meta_keywords)

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
                            
                                <div class="sj-articledescription sj-sectioninnerspace">
                                    <h4>{{ $page->title }}</h4>
                                    <div class="sj-description">
                                        {!! $page->body !!}
                                    </div>
                                </div>
                                
                                <figure class="sj-articledetailimg">
                                    <img src="{{ asset('storage')."/".$page->image }}" alt="image description">
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
