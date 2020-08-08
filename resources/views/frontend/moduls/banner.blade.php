<div class="sj-innerbanner">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="sj-innerbannercontent">
                    <h1>{{$bannerText}}</h1>
                    <ol class="sj-breadcrumb">
                        @foreach ($navigation as $navItem)
                            <li><a href="{{$navItem['url']}}">{{$navItem['title']}}</a></li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>