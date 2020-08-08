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

@section('scripts')
    <script>
        $("#LoginForm").submit(function(e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var form = $("#LoginForm");
            var url = '{{ route('Author.check') }}';
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                beforeSend: function(){
                    $("#login_loader").show()
                },
                success: function(data) {
                    $("#login_loader").hide() 
                    //login_submit_btn

                    // if(){

                    // }else{

                    // }


                    console.log(data); // show response from the php script.
                },
                error: function(){

                }
            });
        });
    </script>
@endsection

@section('content')
    @include('frontend.moduls.static.header')
    
    <!--Main Start-->
    <main id="sj-main" class="sj-main sj-haslayout sj-sectionspace">


        <div id="sj-twocolumns" class="sj-twocolumns">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                        <aside id="sj-sidebarvtwo" class="sj-sidebar">
                            <div class="sj-widget sj-widgetlogin">
                                <div class="sj-widgetheading">
                                    <h3>Login</h3>
                                </div>
                                <div class="sj-widgetcontent">
                                    <form id="LoginForm" class="sj-formtheme">
                                        @csrf
                                        <fieldset>
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control" placeholder="E-mail">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control" placeholder="Password">
                                            </div>
                                            <div class="form-group sj-forgotpass">
                                                <div class="sj-checkbox">
                                                    <input name="remember_me" type="checkbox" id="remember_me">
                                                    <label for="remember_me">keep me logged in</label>
                                                </div>
                                                <a class="sj-forgorpass" href="javascript:void(0);">Forgot Password?</a>
                                            </div>
                                            <div class="sj-btnarea">
                                                <button class="fa-2x sj-btn sj-btnactive" id="login_submit_btn" type="submit">Login
                                                    <i style="display: none" id="login_loader" class="fas fa-spinner fa-spin"></i>
                                                </button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                        <div id="sj-content" class="sj-content">
                            <div class="sj-registerarea">
                                <div class="registernow">
                                    <div class="sj-borderheading">
                                        <h3>Register Now</h3>
                                    </div>
                                    <div class="sj-registerformholder">
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                                <form action="#" method="POST" class="sj-formtheme sj-formregister">
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <input type="email" name="youremail" class="form-control" placeholder="First Name*">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="email" name="youremail" class="form-control" placeholder="Sur Name*">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="email" name="youremail" class="form-control"
                                                                placeholder="Email*">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="password" name="password" class="form-control"
                                                                placeholder="Password*">
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="sj-checkbox">
                                                                <input type="checkbox" id="register">
                                                                <label for="register">By registering, you accept our <a
                                                                        href="javascript:void(0);">Terms &amp;
                                                                        Conditions</a></label>
                                                            </div>
                                                        </div>
                                                        <div class="sj-btnarea">
                                                            <a class="sj-btn sj-btnactive"
                                                                href="javascript:void(0);">Register</a>
                                                        </div>
                                                    </fieldset>
                                                </form>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                                <div class="sj-howtoregister">
                                                    <h3>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit.
                                                    </h3>
                                                    <div class="sj-description">
                                                        <p>Quis nostrud exercitation ullamcoaris nisiuate aliquip ex ea
                                                            commodo consequat aute irure dolor atem reprehenderit in esse.
                                                        </p>
                                                    </div>
                                                    <ul class="sj-liststyle">
                                                        <li><span>Proident sunt in culpa qui officia</span></li>
                                                        <li><span>Deserunt mollit anim idestorum</span></li>
                                                        <li><span>Sedutana perspiciatis</span></li>
                                                        <li><span>Aunde omnis iste natus voluptatem</span></li>
                                                        <li><span>Cullamcoaris nisiutia aliquip</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </main>
    <!--Main End-->

    @include('frontend.moduls.footer')
@endsection