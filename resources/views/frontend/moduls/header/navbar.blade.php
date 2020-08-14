<?php

	$json = menu('site', '_json');
	$menus = json_decode($json, true);

	//dd($json);

	function navbar($array)
	{
		$menu_Item = "";  //create empty menu item
		foreach ($array as $menu) {  // loop all menus from json encode
			$menu_Item .= "<li ";  // first create li tag
			$class = ""; // create empty class
			if ($menu['children']) {  // if menu has children add this class
				$class .= "menu-item-has-children page_item_has_children";
			}
			$menu_Url = $menu['url']; // get menu url

			if (!$menu['parent_id']) { //show "active" class only if is not child
				if (URL::current() == $menu_Url)
				{
					$class .= " current-menu-item";
				}
			}
			if ($class) {
				$menu_Item .= "class='$class'>";
			} else {
				$menu_Item .= ">";
			}

			if ($menu_Url) {
				$menu_Item .= "<a href='$menu_Url' >";
			} else {
			    if (!empty($menu['route'])){
                    $route_url = $menu['route'];
			        if (!empty($menu['parameters'])){
                        $menu_route = route("$route_url", $menu['parameters']);
                    } else {
                        $menu_route = route("$route_url");
                    }
                    $menu_Item .= "<a href='$menu_route' >";
                } else {
                    $menu_Item .= "<a href='javascript:void(0)' >";
                }
			}
			$iconClass = $menu['icon_class'];
			if ($iconClass) {
				$menu_Item .= "<i class='$iconClass'></i> ";
			}
			if ($menu['title']) {
				$menu_Item .= $menu['title'];
			}
			$menu_Item .= "</a>";
			if ($menu['children']) {
				$menu_Item .= '<ul class="sub-menu">';
				$menu_Item .= navbar($menu['children']);
				$menu_Item .= "</ul>";
			}
			$menu_Item .= "</li>";
		}
		return $menu_Item;
	}
?>


<div class="sj-navigationarea">
    <strong class="sj-logo"><a href="{{route('Page.index')}}"><img style="max-height: 50px" src="{{ asset('storage/')."/".setting('site.logo') }}" alt="company logo here"></a></strong>
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
                <ul>{!! navbar($menus) !!}</ul>
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
