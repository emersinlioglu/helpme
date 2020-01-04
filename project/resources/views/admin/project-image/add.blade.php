@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard add-projectImage-1 area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div id="response" class="col-md-12">
                                @if(Session::has('message'))
                                    <div class="alert alert-success alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        {{ Session::get('message') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header">
                                        <h2>Add Slider</h2>
                                        <a href="{!! url('admin/project/' . $project->id . '/edit') !!}" class="add-back-btn"><i class="fa fa-arrow-left"></i> back</a>
                                    </div>
                                    <hr/>
                                    <form  method="POST" action="{!! action('ProjectImageController@store') !!}" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                        {{csrf_field()}}

                                        <input type="hidden" name="project_id" value="{{$project->id}}"/>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="projectImage_image">Slider Image*</label>
                                            <div class="col-sm-8">
                                                <input type="file" name="image" id="projectImage_image" accept="image/*" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="projectImage_title">Slider Title* <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="title" id="projectImage_title" placeholder="e.g sports">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="projectImage_text">Slider Text* <span>(In Any Language)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="text" id="projectImage_text" placeholder="e.g sports">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="projectImage_text _position">Slider Text Position*</label>
                                            <div class="col-sm-8">
                                                <select id="projectImage_text _position" name="text_position" class="form-control" required>
                                                    <option value="slide_style_left">Left</option>
                                                    <option value="slide_style_center" selected>Center</option>
                                                    <option value="slide_style_right">Right</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">add projectImage</button>
                                            <button name="addImageAgain" value="1" type="submit" class="btn btn-success add-product_btn">add projectImage and stay hier</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard add-product-1 area -->


                </div>
            </div>
        </div>
    </div>


    {{--<div id="page-wrapper">--}}
        {{--<div class="container-fluid">--}}
            {{--<div class="row" id="main">--}}

                {{--<!-- Page Heading -->--}}
                {{--<div class="go-title">--}}
                    {{--<div class="pull-right">--}}
                        {{--<a href="{!! url('admin/projectImages') !!}" class="btn btn-default btn-back"><i class="fa fa-arrow-left"></i> Back</a>--}}
                    {{--</div>--}}
                    {{--<h3>Add Slider</h3>--}}
                    {{--<div class="go-line"></div>--}}
                {{--</div>--}}
                {{--<!-- Page Content -->--}}
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-body">--}}
                        {{--<div id="response"></div>--}}
                        {{--<form method="POST" action="{!! action('SliderController@store') !!}" class="form-horizontal form-label-left" enctype="multipart/form-data">--}}
                            {{--{{csrf_field()}}--}}
                            {{--<div class="item form-group">--}}
                                {{--<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Slider Image<span class="required">*</span>--}}

                                {{--</label>--}}
                                {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                                   {{--<input type="file" accept="image/*" name="image">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="item form-group">--}}
                                {{--<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Slider Title<span class="required">*</span>--}}
                                    {{--<p class="small-label">(In Any Language)</p>--}}
                                {{--</label>--}}
                                {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                                    {{--<input id="name" class="form-control col-md-7 col-xs-12" name="title" placeholder="e.g Sports" type="text">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="item form-group">--}}
                                {{--<label class="control-label col-md-3 col-sm-3 col-xs-12" for="slug">Slider Text<span class="required">*</span>--}}
                                    {{--<p class="small-label">(In Any Language)</p>--}}
                                {{--</label>--}}
                                {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                                    {{--<input id="slug" class="form-control col-md-7 col-xs-12" name="text" placeholder="e.g sports" type="text">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="item form-group">--}}
                                {{--<label class="control-label col-md-3 col-sm-3 col-xs-12" for="slug">Slider Text Position<span class="required">*</span>--}}

                                {{--</label>--}}
                                {{--<div class="col-md-3 col-sm-3 col-xs-12">--}}
                                    {{--<select name="text_position" class="form-control">--}}
                                        {{--<option value="slide_style_left">Left</option>--}}
                                        {{--<option value="slide_style_center">Center</option>--}}
                                        {{--<option value="slide_style_right">Right</option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="ln_solid"></div>--}}
                            {{--<div class="form-group">--}}
                                {{--<div class="col-md-6 col-md-offset-3">--}}
                                    {{--<button type="submit" class="btn btn-success btn-block">Add Slider</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<!-- /.row -->--}}
        {{--</div>--}}
        {{--<!-- /.container-fluid -->--}}
    {{--</div>--}}
    {{--<!-- /#page-wrapper -->--}}
@stop

@section('footer')

@stop