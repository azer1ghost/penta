<?php use App\Classes\FrontMenu; ?>


<div class="sj-navigationarea">
    <strong class="sj-logo"><a href="{{route('Page.index')}}"><img style="max-height: 50px"
                                                                   src="{{ asset('storage/')."/".setting('site.logo') }}"
                                                                   alt="company logo here"></a></strong>
    <div class="sj-rightarea">
        <nav id="sj-nav" class="sj-nav navbar-expand-lg">
            <button class="navbar-toggler" type="button"
                    data-toggle="collapse"
                    data-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <i class="lnr lnr-menu"></i>
            </button>
            <div class="collapse navbar-collapse sj-navigation" id="navbarNav">
                {!! FrontMenu::getLinks() !!}
            </div>
        </nav>
        <a class="sj-btntopsearch" href="#sj-searcharea"><i class="lnr lnr-magnifier"></i></a>
        {{-- <a class="sj-btn sj-btnactive" href="javascript:void(0);">Submit Your Article</a> --}}
    </div>
</div>


{{--
	<li class="menu-item-has-children page_item_has_children">
		<span class="sj-tagnew">New</span>
		<a href="javascript:void(0);">Issues</a>
		<ul class="sub-menu">
			<li><a href="issuesweeks.html">Issues Weeks</a></li>
			<li><a href="issuesyears.html">Issues Years</a></li>
		</ul>
	</li>
--}}
