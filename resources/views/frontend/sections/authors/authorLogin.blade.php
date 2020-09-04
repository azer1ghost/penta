@extends('layout')

@section('title', lang('login','title'))
@section('description', setting('site.description'))
@section('style')
    <style>
        #LoginFormDiv {
            display: none;
        }
        #RegisterFormDiv {
            display: none;
        }
        #ResetFormDiv{
            display: none;
        }
        #SetNewPass{
            display: none;
        }
        #check-email{
            display: none;
        }
        .message{
            color: #ff0000;
        }
        .bttn{
            min-width: 100%;
            height: 35px;
            padding-right: 25px;
            padding-left: 25px;
            border-radius: 5px;
            text-transform: capitalize;
            font: 500 14px/35px 'Quicksand', Arial, Helvetica, sans-serif;
        }

    </style>
@endsection

@section('scripts')
    <script>

        switch(window.location.pathname.split("/").pop()) {
            case "login":
                    $("#LoginFormDiv").show()
                break;
            case "register":
                    $("#RegisterFormDiv").show()
                break;
            case "reset":
                    $("#ResetFormDiv").show()
                break;
            case "set-password":
                    $("#SetNewPass").show()
                break;

            default:
        }


        $("#ResetForm").submit(function(e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            let loader = '<i class="fas fa-spinner fa-spin"></i>';
            let submitBTN = '#ResetForm-btn';
            let messageDIV = '#reset-information-message';
            let regURL = "{{route('Author.register')}}";
            let regBtn = "{{lang('login','register')}}";
            let registerLink = ' <a href=' + regURL + '>' + regBtn + '</a>'

            var form = $(this);
            var url = '{{ route('Author.recover') }}';
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.

                beforeSend: function(){
                    $(messageDIV).html("")
                    $(submitBTN).removeClass('btn-danger').addClass("btn-primary").append(loader)
                },

                success: function(data) {
                    if (data['status']){

                        $(submitBTN).removeClass('btn-danger').addClass("btn-success").html("E-posta iletildi")
                        $("#ResetFormDiv").hide()
                        $("#check-email").show()

                        $('#email-message').html('<u style="color:blue">' + data['email'] + '</u> adresine bir eposta gonderdik, lutfen posta kutunuzu kontrol edin')

                    } else {

                        if (data['message'] == 1) $(messageDIV).html("{{lang('login','email.required')}}");

                        else if (data['message'] == 2) $(messageDIV).html("{{lang('login','email.incorrrect')}}");

                        else if (data['message'] == 3) $(messageDIV).html("{{lang('login','email.exists')}}"+registerLink);

                        else if (data['message'] == 4) $(messageDIV).html("Email gonderilirken bir sorun olustu lutfen yeniden deneyin");

                        $(submitBTN).removeClass('btn-primary').addClass("btn-danger").html("{{lang('login','retry')}} ")

                    }

                },

                error: function(){

                }
            });
        });

        $("#LoginForm").submit(function(e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            let form = $(this);
            let url = '{{ route('Author.check') }}';
            let loader = '<i class="fas fa-spinner fa-spin"></i>';
            let submitBTN = '#LoginForm-btn';
            let messageDIV = '#login-information-message';
            let regURL = "{{route('Author.register')}}";
            let regBtn = "{{lang('login','register')}}";
            let registerLink = ' <a href=' + regURL + '>' + regBtn + '</a>'

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                beforeSend: function(){

                    $(messageDIV).html("")
                    $(submitBTN).removeClass('btn-danger').addClass("btn-primary").append(loader)

                },
                success: function(data) {

                    if (data['status']){

                        $(submitBTN).removeClass('btn-danger').addClass("btn-success").html("{{lang('login','redirection')}}")
                        window.location.replace(data['url']);

                    } else {

                             if (data['message'] == 1) $(messageDIV).html("{{lang('login','email.required')}}");

                        else if (data['message'] == 2) $(messageDIV).html("{{lang('login','email.incorrrect')}}");

                        else if (data['message'] == 3) $(messageDIV).html("{{lang('login','email.exists')}}"+registerLink);

                        else if (data['message'] == 4) $(messageDIV).html("{{lang('login','failed')}}");

                        $(submitBTN).removeClass('btn-primary').addClass("btn-danger").html("{{lang('login','retry')}} ")

                    }

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

                    <!-- login form -->
                    <section id="LoginFormDiv" class="mx-auto col-12 col-sm-12 col-md-12 col-lg-4">
                            <aside id="sj-sidebarvtwo" class="sj-sidebar">
                                <div class="sj-widget sj-widgetlogin">
                                    <div class="sj-borderheading">
                                        <h3>@lang('login.title')</h3>
                                    </div>
                                    <div class="sj-widgetcontent">
                                        <form id="LoginForm" class="sj-formtheme">
                                            @csrf
                                            <input type="hidden" name="locale" value="{{ $currentLanguage->locale }}">
                                            <fieldset>

                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-control" placeholder="{{lang('login','email')}}">
                                                </div>

                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-control" placeholder="{{lang('login','password')}}">
                                                </div>

                                                <div class="form-group sj-forgotpass">
                                                    <div class="sj-checkbox">
                                                        <input name="remember_me" type="checkbox" id="remember_me">
                                                        <label for="remember_me">{{lang('login','keepLogged')}}</label>
                                                    </div>
                                                </div>

                                                <div style="padding: 20px" class="message" id="login-information-message"></div>

                                                <button class="fa-2x bttn btn-primary" id="LoginForm-btn" type="submit">{{lang('login','button')}} </button>

                                                <a class="sj-forgorpass" style="padding-top: 20px" href="{{route('Author.reset')}}">{{lang('login','forgot')}}</a>

                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </aside>
                    </section>

                    <!-- Reset Pass -->
                    <section id="ResetFormDiv" class="mx-auto col-12 col-sm-12 col-md-12 col-lg-4">
                        <aside id="sj-sidebarvtwo" class="sj-sidebar">
                            <div class="sj-widget sj-widgetlogin">
                                <div class="sj-borderheading">
                                    <h3>{{lang('reset','header')}}</h3>
                                </div>
                                <p>Lütfen onarmak istediğiniz hesabın e-posta adresini giriniz</p>
                                <div class="sj-widgetcontent">
                                    <form id="ResetForm" class="sj-formtheme">
                                        @csrf
                                        <input type="hidden" name="locale" value="{{ $currentLanguage->locale }}">
                                        <fieldset>
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control" placeholder="E-mail">
                                            </div>
                                            <div style="padding: 20px" class="message" id="reset-information-message"></div>
                                            <button class="fa-2x bttn btn-primary" id="ResetForm-btn" type="submit">{{lang('reset','recover')}} </button>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </aside>
                    </section>

                    <!-- Message after reset -->
                    <section id="check-email" class="mx-auto col-12 col-sm-12 col-md-12 col-lg-4">
                        <aside id="sj-sidebarvtwo" class="sj-sidebar">
                            <div class="sj-widget sj-widgetlogin">
                                <div class="sj-borderheading">
                                    <h3>Lutfen E-postani kontrol et</h3>
                                </div>
                                <div class="sj-widgetcontent" id="email-message">

                                </div>
                            </div>
                        </aside>
                    </section>

                    <!-- Set New Pass -->
                    <section id="SetNewPass" class="mx-auto col-12 col-sm-12 col-md-12 col-lg-9">
                        <aside id="sj-sidebarvtwo" class="sj-sidebar">
                            <div class="sj-widget sj-widgetlogin">
                                <div class="sj-borderheading">
                                    <h3>Şifre Değiştirme Sayfası</h3>
                                </div>

                                <div class="sj-registerformholder">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                            <form id="SetNewPassForm" class="sj-formtheme">
                                                @csrf
                                                <input type="hidden" name="locale" value="{{ $currentLanguage->locale }}">

                                                <input type="hidden" name="token" value="">

                                                <fieldset>
                                                    <div class="form-group">
                                                        <label for="sec-question">Güvenlik sorusu</label>
                                                        <select  name="password" class="form-control" id="sec-question">
                                                            <option value="">Ata adi</option>
                                                            <option value="">Ana adi</option>
                                                            <option value="">Ferdi</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="answer"  class="form-control" placeholder="Cevabınız">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" name="password" class="form-control" placeholder="Şifre">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" name="password_copy" class="form-control" placeholder="Şifrenin Tekrarı">
                                                    </div>

                                                    <div style="padding: 20px" class="message" id="setpass-information-message"></div>
                                                    <button class="fa-2x bttn btn-primary" id="ResetPass-btn" type="submit">Değiştir </button>
                                                </fieldset>
                                            </form>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                            <div class="sj-howtoregister">
                                                <h3>
                                                    <u style="color: #0ca5e1;text-transform: none">lorem.aa@gmail.com</u>
                                                </h3>
                                                <div class="sj-description">
                                                    <p>
                                                        Lütfen profili oluştutuken
                                                        adamış olduğunuz güvenlik
                                                        sorusunu seçib cevaplayın
                                                    </p>
                                                </div>
                                                <ul class="sj-liststyle">
                                                    <li><span>Şifreniz en az 6 karakter uzunluğunda olmalı</span></li>
                                                    <li><span>Şifreniz en az bir sayı içermeli</span></li>
                                                    <li><span>Şifreniz en az bir büyük harf içermeli</span></li>
                                                    <li><span>Aunde omnis iste natus voluptatem</span></li>
                                                    <li><span>Cullamcoaris nisiutia aliquip</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </section>


                    <!-- register form -->
                    <section id="RegisterFormDiv" class="mx-auto col-12 col-sm-12 col-md-12 col-lg-8">
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
                    </section>

                </div>
            </div>
        </div>

    </main>
    <!--Main End-->

    @include('frontend.moduls.footer')
@endsection
