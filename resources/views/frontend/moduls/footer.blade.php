<!--Footer Start-->

<footer id="sj-footer" class="sj-footer sj-haslayout">
    <div class="container">
        <div class="row">
            <a class="sj-btnscrolltotop" href="javascript:void(0);"><i class="fa fa-angle-up"></i></a>
            <div class="sj-footercolumns">
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 float-left">
                    <div class="sj-fcol sj-footeraboutus">
                        <strong class="sj-logo">
                            <a href="index-2.html"><img src="{{ asset('storage/')."/".setting('site.logo') }}" alt="image description"></a>
                        </strong>
                        <div class="sj-description">
                            <p> {{ substr(setting('site.description'), 0, 90) }} <a href="javascript:void(0);">Read More</a></p>
                        </div>
                        <ul class="sj-socialicons sj-socialiconssimple">
                            <li class="sj-facebook"><a href="javascript:void(0);"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="sj-twitter"><a href="javascript:void(0);"><i class="fab fa-twitter"></i></a></li>
                            <li class="sj-linkedin"><a href="javascript:void(0);"><i class="fab fa-linkedin-in"></i></a></li>
                            <li class="sj-googleplus"><a href="javascript:void(0);"><i class="fab fa-google-plus-g"></i></a></li>
                            <li class="sj-rss"><a href="javascript:void(0);"><i class="fa fa-rss"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 float-left">
                    <div class="sj-fcol sj-widget sj-widgetusefullinks">
                        <div class="sj-widgetheading">
                            <h3>By Specialty</h3>
                        </div>
                        <div class="sj-widgetcontent">
                            <ul>
                                <li><a href="javascript:void(0);">Contact Us</a></li>
                                <li><a href="javascript:void(0);">Careers @ Amentojourn</a></li>
                                <li><a href="javascript:void(0);">Get Help and Support</a></li>
                                <li><a href="javascript:void(0);">Rights &amp; Permissions</a></li>
                                <li class="sj-more"><a href="javascript:void(0);">more</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-4 float-left">
                    <div class="sj-fcol sj-widget sj-widgetcontactus">
                        <div class="sj-widgetheading">
                            <h3>Get In Touch</h3>
                        </div>
                        <div class="sj-widgetcontent">
                            <ul>
                                <li><i class="lnr lnr-home"></i>
                                    <address>123 Office St, ABC Building, Melbourne, Australia. </address>
                                </li>
                                <li><a href="tel:(+4)123456789101"><i class="lnr lnr-phone"></i><span>(+4) 1234 5678 9101</span></a></li>
                                <li><a href="tel:(+4)123456789101"><i class="lnr lnr-screen"></i><span>(+4) 4321 8765 1019</span></a></li>
                                <li><a href="mailto:info@yourdomain.com"><i class="lnr lnr-envelope"></i><span>info@yourdomain.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-2 col-lg-2 float-left">
                    @auth
                        <div class="sj-languages float-right">
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
            <div class="sj-footerbottom">
                <p class="sj-copyrights">© {{date("Y")}} <span>{{setting('site.title')}}</span>. All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>
<!--Footer End-->
