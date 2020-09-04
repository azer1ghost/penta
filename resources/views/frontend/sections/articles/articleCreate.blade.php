@extends('layout')

<?php
    $data = [
        'title' => "Create Article",
        'bannerText' => 'Submit Your Article',
        'navigation' => [
            [
                'title' => 'Home',
                'url'   => route('Page.index')
            ],
            [
                'title' => 'Articles',
                'url'   => route('Articles.list')
            ],
            [
                'title' => 'New Article',
                'url'   => route('Articles.create')
            ]
        ]
    ]
?>

@section('title', $data['title'])


@section('scripts')

    <script>
        $(document).ready(function(){

            var _title = 0
            var _category = 0
            var _description = 0
            var _content = 0
            var _fileSelect = 0

             let percentCounterID = $('#percentCounter')
             let percentTextMessID = $('#percentText')

             function changePercent() {
                 let percent = _title + _category + _description + _fileSelect + _content
                 percentTextMessID.html(percent + "% Completed")

                 percentCounterID.animate({
                     width: percent+'%'
                 }, 300);
             }


             let title = $('#title')
             let category = $('#category')
             let description = $('#description')
             let content = $('#content')
             let fileSelect = $('#sj-uploadimgvtwo')

             let titleC = $('#titleC')
             let categoryC = $('#categoryC')
             let descriptionC = $('#descriptionC')
             let contentC = $('#contentC')
             let fileSelectC = $('#fileSelect')


             title.keyup(function (){
                 if (title.val().length > 2){
                     _title = 10
                     titleC.removeClass('sj-profileerror').addClass('sj-profilecompleted').html('<i class="ti-check"></i><span>Article Title</span>')
                 }else{
                     _title = 0
                     titleC.removeClass('sj-profilecompleted').addClass('sj-profileerror').html('<i class="ti-na"></i><span>Article Title</span>')
                 }
                 let self = this;
                 if (self.timer) clearTimeout(self.timer);
                 self.timer = setTimeout(function ()
                 {
                     self.timer = null;
                     changePercent()
                 }, 1000);
             })

             category.change(function (){
                 if (category.val()){
                     _category = 10
                     categoryC.removeClass('sj-profileerror').addClass('sj-profilecompleted').html('<i class="ti-check"></i><span>Article Category</span>')
                 }
                 let self = this;
                 if (self.timer) clearTimeout(self.timer);
                 self.timer = setTimeout(function ()
                 {
                     self.timer = null;
                     changePercent()
                 }, 1000);
             })

             description.keyup(function (){
                 let words = $.trim(description.val()).split(" ")
                 if (words.length > 3){
                     _description = 20
                     descriptionC.removeClass('sj-profileerror').addClass('sj-profilecompleted').html('<i class="ti-check"></i><span>Article Description</span>')
                 }else{
                     _description = 0
                     descriptionC.removeClass('sj-profilecompleted').addClass('sj-profileerror').html('<i class="ti-na"></i><span>Article Description</span>')
                 }
                 let self = this;
                 if (self.timer) clearTimeout(self.timer);
                 self.timer = setTimeout(function ()
                 {
                     self.timer = null;
                     changePercent()
                 }, 1000);
             })

            content.keyup(function (){
                let words = $.trim(content.val()).split(" ").length
                if (words > 5){
                    contentC.removeClass('sj-profileerror').addClass('sj-profilecompleted').html('<i class="ti-check"></i><span>Your Article</span>')
                }else{
                    contentC.removeClass('sj-profilecompleted').addClass('sj-profileerror').html('<i class="ti-na"></i><span>Your Article</span>')
                }

                if (words > 40) _content = 50
                else if (words > 30) _content = 40
                else if (words > 20) _content = 30
                else if (words > 10) _content = 20
                else if (words > 5) _content = 10
                else _content = 0

                let self = this;
                if (self.timer) clearTimeout(self.timer);
                self.timer = setTimeout(function ()
                {
                    self.timer = null;
                    changePercent()
                }, 1000);
            })

            fileSelect.change(function (){
                if (fileSelect.val()){
                    _fileSelect = 10
                    fileSelectC.removeClass('sj-profileerror').addClass('sj-profilecompleted').html('<i class="ti-check"></i><span>Article Banner Image</span>')
                }
                let self = this;
                if (self.timer) clearTimeout(self.timer);
                self.timer = setTimeout(function ()
                {
                    self.timer = null;
                    changePercent()
                }, 1000);
            })


        })

    </script>

@endsection

@section('content')
    @include('frontend.moduls.static.header')
    @include('frontend.moduls.banner',$data)


    <!--Main Start-->
    <main id="sj-main" class="sj-main sj-haslayout sj-sectionspace">
        <div class="container">
            <div class="row">
                <div id="sj-twocolumns" class="sj-twocolumns">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 float-right">
                        <div id="sj-content" class="sj-content sj-addarticleholdcontent">
                            <div class="sj-dashboardboxtitle">
                                <h2>Add A New Article</h2>
                            </div>
                            <div class="sj-addarticlehold">
                                <form class="sj-formtheme sj-formarticle">
                                    <fieldset>
                                        <div class="form-group">
                                            <input type="text" name="Title" id="title" class="form-control"
                                                placeholder="Title of Article *">
                                        </div>
                                        <div class="form-group">
                                            <span class="sj-select">
                                                <select id="category">
                                                    <option selected disabled>Select Category (Optional)</option>
                                                    @foreach($categories as $category)
                                                        <option>{{$category['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" id="description" name="Corresponding" class="form-control"
                                                placeholder="Sort Description">
                                        </div>
                                        <div class="form-group">
                                            <textarea id="content" placeholder="Add Your Abstract"></textarea>
                                        </div>
                                    </fieldset>
                                </form>
                                <form class="sj-formtheme sj-formaddproject">
                                    <fieldset class="sj-dragdropimg">
                                        <div class="sj-inputtyfile">
                                            <div class="sj-title">
                                                <h3>Article Banner Image</h3>
                                            </div>
                                            <label for="sj-uploadimgvtwo">
                                                <span>Upload Your Image Here</span>
                                                <span><i class="ti-upload"></i></span>
                                                <input type="file" name="uploadimgvtwo" id="sj-uploadimgvtwo">
                                            </label>
                                            <div class="sj-filedetails">
                                                <span>File should be max 500kb </span>
                                                <em>Not Uploaded Yet</em>
                                            </div>
                                        </div>
                                     <!--   <div class="sj-inputtyfile sj-uploading">
                                            <div class="sj-title">
                                                <h3>Upload Handout</h3>
                                            </div>
                                            <label for="sj-uploadimgvtwoa">
                                                <span>Final_handout_2019.pdf</span>
                                                <span><i class="ti-close"></i></span>
                                                <input type="file" name="uploadimgvtwo" id="sj-uploadimgvtwoa">
                                            </label>
                                            <div class="sj-filedetails">
                                                <span>File should be max 500kb </span>
                                                <em>File Uploaded</em>
                                            </div>
                                        </div> -->
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 float-left">
                        <aside id="sj-sidebarvtwo" class="sj-sidebar">
                            <div class="sj-profilestrenght">
                                <div class="sj-headerhold">
                                    <div class="sj-dashboardboxtitle">
                                        <h2>Article Strength</h2>
                                        <span>Article must be 80 percent </span>
                                    </div>
                                    <div id="sj-ourskill" class="sj-ourskill">
                                        <div class="sj-skill">
                                            <div class="sj-skillholder" >
                                                <div class="sj-skillbar" id="percentCounter" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span id="percentText" class="sj-strenghtcomplete">0% Completed</span>
                                        </div>
                                    </div>
                                </div>
                                <ul class="sj-profilecomplete">
                                    <li id="titleC" class="sj-profileerror"><i class="ti-na"></i><span>Article Title</span></li>
                                    <li id="categoryC" class="sj-profileerror"><i class="ti-na"></i><span>Article Category</span></li>
                                    <li id="descriptionC" class="sj-profileerror"><i class="ti-na"></i><span>Article Description</span></li>
                                    <li id="contentC" class="sj-profileerror"><i class="ti-na"></i><span>Your Article</span></li>
                                    <li id="fileSelect" class="sj-profileerror"><i class="ti-na"></i><span>Article Banner Image</span></li>
                                </ul>
                                <div class="sj-submitdetails">
                                    <span>I accept all the submiting article’s<a href="javascript:void(0);">Terms &amp;
                                            Conditions</a></span>
                                    <a href="javascript:void(0);"  class="sj-btn sj-btnactive">Submit Now</a>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--Main End-->

    @include('frontend.moduls.footer')
@endsection
