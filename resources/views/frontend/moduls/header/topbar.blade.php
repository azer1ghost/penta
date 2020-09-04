<div class="sj-topbar">
    <ul class="sj-socialicons sj-socialiconssimple">
        <li class="sj-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook-f"></i></a></li>
        <li class="sj-twitter"><a href="javascript:void(0);"><i class="fab fa-twitter"></i></a></li>
        <li class="sj-linkedin"><a href="javascript:void(0);"><i class="fab fa-linkedin-in"></i></a></li>
        <li class="sj-googleplus"><a href="javascript:void(0);"><i class="fab fa-google-plus-g"></i></a></li>
    </ul>
    <div class="sj-languagelogin">

        @if (Route::has('Author.login'))
            <div class="sj-loginarea">
                <ul class="sj-loging">
                    @auth
                    <div style="display: block" class="sj-userloginarea">
                        <a href="javascript:void(0);">
                            <i class="fa fa-angle-down"></i>
                            <img src="{{ asset('storage')."/".Auth::user()->avatar}}" alt="image description">
                            <div class="sj-loginusername">
                                <h3>@lang('header.hi'), {{Auth::user()->name}}</h3>
                                <span>{{Auth::user()->role->display_name}}</span>
                            </div>
                        </a>
                        <nav class="sj-usernav">
                            <ul>
                                <li><a href="#"><i class="lnr lnr-sync"></i><span>Articles Under Review</span></a></li>
                                <li><a href="#"><i class="lnr lnr-sync"></i><span>Aticle List</span></a></li>
                                <li><a href="#"><i class="lnr lnr-lock"></i><span>Account Settings</span></a></li>
                                <li><a href="{{route('Author.logout')}}"><i class="lnr lnr-exit"></i><span>{{lang('topbar','logout')}}</span></a></li>
                            </ul>
                        </nav>
                    </div>
                    @else
                        <li><a href="{{route('Author.login')}}">{{lang('topbar','login')}}</a></li>

                        @if (Route::has('Author.login'))
                            <li><a href="{{route('Author.register')}}">{{lang('topbar','register')}}</a></li>
                        @endif
                    @endauth
                </ul>
            </div>
        @endif

        @auth
            @else
            <div class="sj-languages">

                <a id="sj-languages-button" href="javascript:void(0);">
                    <img src="{{asset('storage')."/".$currentLanguage->flag}}" alt="image description">
                    <span style="text-transform: uppercase">{{ $currentLanguage->locale }}</span>
                    <i class="fa fa-angle-down"></i>
                </a>

                <ul>
                    @foreach ($altLocalizedUrls as $lng)
                        <li>
                            <a hreflang="{{ $lng['locale'] }}" href="{{ $lng['url'] }}">
                                <img src="{{ asset('storage')."/".$lng['flag']}}" alt="image description">
                                <span>{{ $lng['locale'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endauth


    </div>
</div>
