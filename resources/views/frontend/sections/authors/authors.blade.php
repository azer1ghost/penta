@extends('layout')

@section('title', 'Authors')

@section('style')
 
@endsection

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

                            <ul>
                                @foreach ($variable['authors'] as $author)
                                    <li>{{$author->name}}</li>
                                @endforeach
                            </ul> 

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
