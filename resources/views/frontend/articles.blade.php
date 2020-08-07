@extends('layout')

@section('title', 'Articles')

@section('content')
    @include('frontend.moduls.static.header')

    <!--Main Start-->
    <main id="sj-main" class="sj-main sj-haslayout sj-sectionspace">
        {{-- add anything here --}}
        <div id="sj-twocolumns" class="sj-twocolumns">
            <div class="container">
                <div class="row">


                    <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <aside id="sj-sidebarvtwo" class="sj-sidebar">


                            <div class="sj-widget sj-widgetarticles">
                                <div class="sj-widgetheading">
                                    <h3>By Article Type</h3>
                                </div>
                                <div class="sj-widgetcontent">
                                    <div class="sj-selectgroup">
                                        <span class="sj-checkbox">
                                            <input id="sj-viewalltwo" type="checkbox" name="speciality"
                                                value="sj-viewalltwo">
                                            <label for="sj-viewalltwo">View All<em>({{$variable['total']}})</em></label>
                                        </span>

                                        @foreach ($variable['categories'] as $categorie)
                                            <span class="sj-checkbox">
                                                <input id="sj-cat{{$categorie->id}}" type="checkbox" name="speciality" value="sj-cat{{$categorie->id}}">
                                                <label for="sj-cat{{$categorie->id}}">{{$categorie->name}}<em>({{ $categorie->articles_count }})</em></label>
                                            </span>
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                            <div class="sj-widget sj-widgetdate">
                                <div class="sj-widgetheading">
                                    <h3>By Date</h3>
                                </div>
                                <div class="sj-widgetcontent">
                                    <div class="sj-selectgroup">
                                        <span class="sj-checkbox">
                                            <input id="sj-viewallthree" type="checkbox" name="speciality"
                                                value="sj-viewallthree">
                                            <label for="sj-viewallthree">View All<em>(216)</em></label>
                                        </span>
                                        <span class="sj-checkbox">
                                            <input id="sj-tenyear" type="checkbox" name="speciality" value="sj-tenyear">
                                            <label for="sj-tenyear">Past 10 Years<em>(37)</em></label>
                                        </span>
                                        <span class="sj-checkbox">
                                            <input id="sj-fifteenyears" type="checkbox" name="speciality"
                                                value="sj-fifteenyears">
                                            <label for="sj-fifteenyears">Past 15 Years<em>(29)</em></label>
                                        </span>
                                        <span class="sj-checkbox">
                                            <input id="sj-twentyyears" type="checkbox" name="speciality"
                                                value="sj-twentyyears">
                                            <label for="sj-twentyyears">Past 20 Years<em>(27)</em></label>
                                        </span>
                                        <span class="sj-checkbox">
                                            <input id="sj-twentyfiveyears" type="checkbox" name="speciality"
                                                value="sj-twentyfiveyears">
                                            <label for="sj-twentyfiveyears">Past 25 Years<em>(23)</em></label>
                                        </span>
                                    </div>

                                    <div class="clearfix"></div><hr>
                                    <div style="float:left;">
                                        <a class="btn btn-outline-primary btn-sm" href="javascript:void(0)">Apply</a>
                                    </div>
                                    <div style="float:right;">
                                        <a class="btn btn-outline-primary btn-sm " href="javascript:void(0)">Reset</a>
                                    </div>
                                        
                                        
                                    
                                    
                                    
                                       
                                        
                            
                                </div>
                            </div>
                        </aside>
                    </div>

                    <!--News Articles Start-->
                    <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
                        <div id="sj-content" class="sj-content">
                            <span class="sj-showitems">Showing <em>1</em> to <em>20</em> of <em>153</em> Articles</span>
                            <div class="sj-uploadarticle">
                                <figure class="sj-uploadarticleimg">
                                    <img src="frontend/images/upload-articlebg.jpg" alt="image description">
                                    <figcaption>
                                        <div class="sj-uploadcontent">
                                            <span>Do You Want To Upload Your Article?</span>
                                            <h3>Submit Now &amp; Make Your Online Presence</h3>
                                            <a class="sj-btn" href="javascript:void(0);">Submit Now</a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="sj-articles">
                                <form class="sj-formtheme sj-formsortitems">
                                    <fieldset>
                                        <div class="form-group">
                                            <em>Sort By: </em>
                                            <span class="sj-select">
                                                <select>
                                                    <option>Name</option>
                                                    <option>Name 2</option>
                                                    <option>Name 3</option>
                                                    <option>Name 4</option>
                                                </select>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <em>Arrange: </em>
                                            <span class="sj-select">
                                                <select>
                                                    <option>Des</option>
                                                    <option>Asc</option>
                                                </select>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <em>Show: </em>
                                            <span class="sj-select">
                                                <select>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                </select>
                                            </span>
                                        </div>
                                    </fieldset>
                                </form>
                                <div class="row">
                                    @foreach ($variable['articles'] as $article)
                                        <div class="col-md-6">
                                            <article class="sj-post sj-editorchoice">
                                                <a href="{{route('Articles.Read', ['slug' => $article->slug])}}">
                                                    <figure class="sj-postimg">
                                                        <img style="width:200px; height:170px" src="storage/{{$article->image}}" alt="image description">
                                                    </figure>
                                                </a>
                                                <div class="sj-postcontent">
                                                    <div class="sj-head">
                                                        <span><i class="far fa-user"></i>  <a href="javascript:void(0);">{{$article->author->name}}</a></span>
                                                        <h3><a href="{{route('Articles.Read', ['slug' => $article->slug])}}">{{$article->title}}</a></h3>
                                                    </div>
                                                    <div class="sj-description">
                                                        <p>{{$article->meta_description}}...</p>
                                                        <span><i class="fas fa-tag"></i>  <a href="javascript:void(0);">{{$article->category->name}}</a></span>
                                                    </div>
                                                    <a class="sj-btn" href="{{route('Articles.Read', ['slug' => $article->slug])}}">View Full Article</a>
                                                </div>
                                            </article>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--News Articles End-->

                    {{-- @include('frontend.moduls.sidebar') --}}

                </div>
            </div>
        </div>
    </main>
    <!--Main End-->

    @include('frontend.moduls.footer')
@endsection
