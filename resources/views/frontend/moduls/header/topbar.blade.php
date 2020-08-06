<div class="sj-topbar">
    <ul class="sj-socialicons sj-socialiconssimple">
        <li class="sj-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook-f"></i></a></li>
        <li class="sj-twitter"><a href="javascript:void(0);"><i class="fab fa-twitter"></i></a></li>
        <li class="sj-linkedin"><a href="javascript:void(0);"><i class="fab fa-linkedin-in"></i></a></li>
        <li class="sj-googleplus"><a href="javascript:void(0);"><i class="fab fa-google-plus-g"></i></a></li>
    </ul>
    <div class="sj-languagelogin">

        @if (Route::has('login'))
            <div class="sj-loginarea">
                <ul class="sj-loging">
                    @auth
                    <div style="display: block" class="sj-userloginarea">
                        <a href="javascript:void(0);">
                            <i class="fa fa-angle-down"></i>
                            <img src="frontend/images/user-img.jpg" alt="image description">
                            <div class="sj-loginusername">
                                <h3>Hi, Racheal</h3>
                                <span>Author</span>
                            </div>
                        </a>
                        <nav class="sj-usernav">
                            <ul>
                                <li><a href="underreview.html"><i class="lnr lnr-sync"></i><span>Articles Under Review</span></a></li>
                                <li><a href="addtemplates.html"><i class="lnr lnr-briefcase"></i><span>Add Templates</span></a></li>
                                <li><a href="aticle-list.html"><i class="lnr lnr-sync"></i><span>Aticle List</span></a></li>
                                <li><a href="generalsettings.html"><i class="lnr lnr-layers"></i><span>General Settings</span></a></li>
                                <li><a href="manageuser.html"><i class="lnr lnr-users"></i><span>Manage Users</span></a></li>
                                <li><a href="manageeditions.html"><i class="lnr lnr-tag"></i><span>Manage Editions</span></a></li>
                                <li><a href="emailtemplates.html"><i class="lnr lnr-envelope"></i><span>Email Templates</span></a></li>
                                <li><a href="accountsettings.html"><i class="lnr lnr-lock"></i><span>Account Settings</span></a></li>
                                <li><a href="loginregister.html"><i class="lnr lnr-exit"></i><span>Logout</span></a></li>
                            </ul>
                        </nav>
                    </div>
                    @else
                        <li><a href="javascript:void(0);">Login</a></li>

                        @if (Route::has('register'))
                            <li><a href="javascript:void(0);">Register</a></li>
                        @endif
                    @endauth
                </ul>
            </div>
        @endif


        <!-- 
            <div class="sj-languages">
                <a id="sj-languages-button" href="javascript:void(0);">
                    <img src="frontend/images/flags/flag-02.jpg" alt="image description">
                    <span>Eng</span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul>
                    <li>
                        <a href="javascript:void(0);">
                            <img src="frontend/images/flags/flag-01.jpg" alt="image description">
                            <span>Ara</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <img src="frontend/images/flags/flag-02.jpg" alt="image description">
                            <span>Eng</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <img src="frontend/images/flags/flag-03.jpg" alt="image description">
                            <span>Chi</span>
                        </a>
                    </li>
                </ul>
            </div>
        -->
    </div>
</div>