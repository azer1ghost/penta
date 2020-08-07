@extends('layout')

@section('title', setting('site.title'))
@section('description', setting('site.description'))
@section('style')
    <style>
        .item {
            margin: 0 !important;
            padding: 5px;
        }
        .sj-tabcontent {
            width: 100% !important;
        }
        .sj-smallpost {
            width: 33% !important;
        }
    </style>
@endsection


@section('content')
    @include('frontend.moduls.static.header')
    @include('frontend.moduls.homebanner')
    <!--Main Start-->
    <main id="sj-main" class="sj-main sj-haslayout sj-sectionspace">
        {{-- add anything here --}}
        <div id="sj-twocolumns" class="sj-twocolumns">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-8 col-lg-9">
                        <div id="sj-content" class="sj-content">

                            <!--Previous Posts Start-->
                            <section class="sj-haslayout sj-sectioninnerspace">
                                <div class="sj-borderheading">
                                    <h3>Previous Issues</h3>
                                    <a class="sj-btnview" href="javascript:void(0);">View All</a>
                                </div>
                                <div class="sj-previousissues">
                                    <div class="sj-tabcontent tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" >
                                            <div id="sj-issuesslider-2018" class="sj-issuesslider owl-carousel">

                                                <div class="item">
                                                    <article class="sj-post sj-editorchoice sj-smallpost">
                                                        <figure class="sj-postimg">
                                                            <img src="frontend/images/editorchoice/img-04.jpg"
                                                                alt="image description">
                                                        </figure>
                                                        <div class="sj-postcontent">
                                                            <div class="sj-head">
                                                                <span class="sj-username"><a
                                                                        href="javascript:void(0);">Coleman Hoff</a></span>
                                                                <h3><a href="javascript:void(0);">Toward Better-Quality
                                                                        Compounded Drugs</a></h3>
                                                            </div>
                                                        </div>
                                                    </article>
                                                    <article class="sj-post sj-editorchoice sj-smallpost">
                                                        <figure class="sj-postimg">
                                                            <img src="frontend/images/editorchoice/img-04.jpg"
                                                                alt="image description">
                                                        </figure>
                                                        <div class="sj-postcontent">
                                                            <div class="sj-head">
                                                                <span class="sj-username"><a
                                                                        href="javascript:void(0);">Coleman Hoff</a></span>
                                                                <h3><a href="javascript:void(0);">Toward Better-Quality
                                                                        Compounded Drugs</a></h3>
                                                            </div>
                                                        </div>
                                                    </article>
                                                    <article class="sj-post sj-editorchoice sj-smallpost">
                                                        <figure class="sj-postimg">
                                                            <img src="frontend/images/editorchoice/img-04.jpg"
                                                                alt="image description">
                                                        </figure>
                                                        <div class="sj-postcontent">
                                                            <div class="sj-head">
                                                                <span class="sj-username"><a
                                                                        href="javascript:void(0);">Coleman Hoff</a></span>
                                                                <h3><a href="javascript:void(0);">Toward Better-Quality
                                                                        Compounded Drugs</a></h3>
                                                            </div>
                                                        </div>
                                                    </article>
                                                    <article class="sj-post sj-editorchoice sj-smallpost">
                                                        <figure class="sj-postimg">
                                                            <img src="frontend/images/editorchoice/img-05.jpg"
                                                                alt="image description">
                                                        </figure>
                                                        <div class="sj-postcontent">
                                                            <div class="sj-head">
                                                                <span class="sj-username"><a
                                                                        href="javascript:void(0);">Kimberly
                                                                        Delapena</a></span>
                                                                <h3><a href="javascript:void(0);">Swallowing a Spy</a></h3>
                                                            </div>
                                                        </div>
                                                    </article>
                                                    <article class="sj-post sj-editorchoice sj-smallpost">
                                                        <figure class="sj-postimg">
                                                            <img src="frontend/images/editorchoice/img-06.jpg"
                                                                alt="image description">
                                                        </figure>
                                                        <div class="sj-postcontent">
                                                            <div class="sj-head">
                                                                <span class="sj-username"><a
                                                                        href="javascript:void(0);">Milan Poat</a></span>
                                                                <h3><a href="javascript:void(0);">Emergency Legal Authority
                                                                        &amp; the Crisis</a></h3>
                                                            </div>
                                                        </div>
                                                    </article>
                                                    <article class="sj-post sj-editorchoice sj-smallpost">
                                                        <figure class="sj-postimg">
                                                            <img src="frontend/images/editorchoice/img-07.jpg"
                                                                alt="image description">
                                                        </figure>
                                                        <div class="sj-postcontent">
                                                            <div class="sj-head">
                                                                <span class="sj-username"><a
                                                                        href="javascript:void(0);">Camilla
                                                                        Hofstetter</a></span>
                                                                <h3><a href="javascript:void(0);">Talaromyces marneffei
                                                                        Infection</a></h3>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                                <div class="item">
                                                    <article class="sj-post sj-editorchoice sj-smallpost">
                                                        <figure class="sj-postimg">
                                                            <img src="frontend/images/editorchoice/img-04.jpg"
                                                                alt="image description">
                                                        </figure>
                                                        <div class="sj-postcontent">
                                                            <div class="sj-head">
                                                                <span class="sj-username"><a
                                                                        href="javascript:void(0);">Coleman Hoff</a></span>
                                                                <h3><a href="javascript:void(0);">Toward Better-Quality
                                                                        Compounded Drugs</a></h3>
                                                            </div>
                                                        </div>
                                                    </article>
                                                    <article class="sj-post sj-editorchoice sj-smallpost">
                                                        <figure class="sj-postimg">
                                                            <img src="frontend/images/editorchoice/img-05.jpg"
                                                                alt="image description">
                                                        </figure>
                                                        <div class="sj-postcontent">
                                                            <div class="sj-head">
                                                                <span class="sj-username"><a
                                                                        href="javascript:void(0);">Kimberly
                                                                        Delapena</a></span>
                                                                <h3><a href="javascript:void(0);">Swallowing a Spy</a></h3>
                                                            </div>
                                                        </div>
                                                    </article>
                                                    <article class="sj-post sj-editorchoice sj-smallpost">
                                                        <figure class="sj-postimg">
                                                            <img src="frontend/images/editorchoice/img-06.jpg"
                                                                alt="image description">
                                                        </figure>
                                                        <div class="sj-postcontent">
                                                            <div class="sj-head">
                                                                <span class="sj-username"><a
                                                                        href="javascript:void(0);">Milan Poat</a></span>
                                                                <h3><a href="javascript:void(0);">Emergency Legal Authority
                                                                        &amp; the Crisis</a></h3>
                                                            </div>
                                                        </div>
                                                    </article>
                                                    <article class="sj-post sj-editorchoice sj-smallpost">
                                                        <figure class="sj-postimg">
                                                            <img src="frontend/images/editorchoice/img-07.jpg"
                                                                alt="image description">
                                                        </figure>
                                                        <div class="sj-postcontent">
                                                            <div class="sj-head">
                                                                <span class="sj-username"><a
                                                                        href="javascript:void(0);">Camilla
                                                                        Hofstetter</a></span>
                                                                <h3><a href="javascript:void(0);">Talaromyces marneffei
                                                                        Infection</a></h3>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                                <div class="item">
                                                    <article class="sj-post sj-editorchoice sj-smallpost">
                                                        <figure class="sj-postimg">
                                                            <img src="frontend/images/editorchoice/img-04.jpg"
                                                                alt="image description">
                                                        </figure>
                                                        <div class="sj-postcontent">
                                                            <div class="sj-head">
                                                                <span class="sj-username"><a
                                                                        href="javascript:void(0);">Coleman Hoff</a></span>
                                                                <h3><a href="javascript:void(0);">Toward Better-Quality
                                                                        Compounded Drugs</a></h3>
                                                            </div>
                                                        </div>
                                                    </article>
                                                    <article class="sj-post sj-editorchoice sj-smallpost">
                                                        <figure class="sj-postimg">
                                                            <img src="frontend/images/editorchoice/img-05.jpg"
                                                                alt="image description">
                                                        </figure>
                                                        <div class="sj-postcontent">
                                                            <div class="sj-head">
                                                                <span class="sj-username"><a
                                                                        href="javascript:void(0);">Kimberly
                                                                        Delapena</a></span>
                                                                <h3><a href="javascript:void(0);">Swallowing a Spy</a></h3>
                                                            </div>
                                                        </div>
                                                    </article>
                                                    <article class="sj-post sj-editorchoice sj-smallpost">
                                                        <figure class="sj-postimg">
                                                            <img src="frontend/images/editorchoice/img-06.jpg"
                                                                alt="image description">
                                                        </figure>
                                                        <div class="sj-postcontent">
                                                            <div class="sj-head">
                                                                <span class="sj-username"><a
                                                                        href="javascript:void(0);">Milan Poat</a></span>
                                                                <h3><a href="javascript:void(0);">Emergency Legal Authority
                                                                        &amp; the Crisis</a></h3>
                                                            </div>
                                                        </div>
                                                    </article>
                                                    <article class="sj-post sj-editorchoice sj-smallpost">
                                                        <figure class="sj-postimg">
                                                            <img src="frontend/images/editorchoice/img-07.jpg"
                                                                alt="image description">
                                                        </figure>
                                                        <div class="sj-postcontent">
                                                            <div class="sj-head">
                                                                <span class="sj-username"><a
                                                                        href="javascript:void(0);">Camilla
                                                                        Hofstetter</a></span>
                                                                <h3><a href="javascript:void(0);">Talaromyces marneffei
                                                                        Infection</a></h3>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!--Previous Posts End-->


                            <!--News Articles Start-->
                            <section class="sj-haslayout sj-sectioninnerspace">
                                <div class="sj-borderheading">
                                    <h3>What's Hot In News</h3>
                                    <a class="sj-btnview" href="javascript:void(0);">View All</a>
                                </div>
                                <div class="sj-newsposts">
                                    <div id="sj-newsarticlesslider"
                                        class="sj-newsarticlesslider sj-newsarticles owl-carousel">
                                        <div class="item">
                                            <div class="sj-newsarticle">
                                                <figure class="sj-newsimg">
                                                    <img src="frontend/images/news/img-01.jpg" alt="image description">
                                                </figure>
                                                <div class="sj-newscontent">
                                                    <div class="sj-newshead">
                                                        <time datetime="2018-12-12" class="sj-posttimedate">Tuesday, Apr 21,
                                                            2017</time>
                                                        <h3><a href="javascript:void(0);">Moving Toward Better-Quality
                                                                Compounded Drugs</a></h3>
                                                    </div>
                                                    <div class="sj-description">
                                                        <p>Consectetur adipisicing elit sed incididunt labore... <a
                                                                href="javascript:void(0);">Read More</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="sj-newsarticle">
                                                <figure class="sj-newsimg">
                                                    <img src="frontend/images/news/img-02.jpg" alt="image description">
                                                </figure>
                                                <div class="sj-newscontent">
                                                    <div class="sj-newshead">
                                                        <time datetime="2018-12-12" class="sj-posttimedate">Tuesday, Apr 21,
                                                            2017</time>
                                                        <h3><a href="javascript:void(0);">Moving Toward Better-Quality
                                                                Compounded Drugs</a></h3>
                                                    </div>
                                                    <div class="sj-description">
                                                        <p>Consectetur adipisicing elit sed incididunt labore... <a
                                                                href="javascript:void(0);">Read More</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="sj-newsarticle">
                                                <figure class="sj-newsimg">
                                                    <img src="frontend/images/news/img-03.jpg" alt="image description">
                                                </figure>
                                                <div class="sj-newscontent">
                                                    <div class="sj-newshead">
                                                        <time datetime="2018-12-12" class="sj-posttimedate">Tuesday, Apr 21,
                                                            2017</time>
                                                        <h3><a href="javascript:void(0);">Moving Toward Better-Quality
                                                                Compounded Drugs</a></h3>
                                                    </div>
                                                    <div class="sj-description">
                                                        <p>Consectetur adipisicing elit sed incididunt labore... <a
                                                                href="javascript:void(0);">Read More</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="sj-newsarticle">
                                                <figure class="sj-newsimg">
                                                    <img src="frontend/images/news/img-01.jpg" alt="image description">
                                                </figure>
                                                <div class="sj-newscontent">
                                                    <div class="sj-newshead">
                                                        <time datetime="2018-12-12" class="sj-posttimedate">Tuesday, Apr 21,
                                                            2017</time>
                                                        <h3><a href="javascript:void(0);">Moving Toward Better-Quality
                                                                Compounded Drugs</a></h3>
                                                    </div>
                                                    <div class="sj-description">
                                                        <p>Consectetur adipisicing elit sed incididunt labore... <a
                                                                href="javascript:void(0);">Read More</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="sj-newsarticle">
                                                <figure class="sj-newsimg">
                                                    <img src="frontend/images/news/img-02.jpg" alt="image description">
                                                </figure>
                                                <div class="sj-newscontent">
                                                    <div class="sj-newshead">
                                                        <time datetime="2018-12-12" class="sj-posttimedate">Tuesday, Apr 21,
                                                            2017</time>
                                                        <h3><a href="javascript:void(0);">Moving Toward Better-Quality
                                                                Compounded Drugs</a></h3>
                                                    </div>
                                                    <div class="sj-description">
                                                        <p>Consectetur adipisicing elit sed incididunt labore... <a
                                                                href="javascript:void(0);">Read More</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!--News Articles End-->
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
