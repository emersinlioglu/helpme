@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard Update New Project area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header">
                                        <h2>Update Project</h2>
                                        <a href="{!! url('admin/project') !!}" class="add-back-btn"><i class="fa fa-arrow-left"></i> Back</a>
                                    </div>
                                    <hr/>
                                    <form method="POST" action="{!! action('ProjectController@update',['id'=> $project->id]) !!}" id="add_form" class="form-horizontal"  enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="PATCH">
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="update_project_name">Project Name*</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="title" value="{{$project->title}}" id="update_project_name" placeholder="Enter Project Name" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="update_select_project_category">Select Category *</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="update_select_project_category" id="update_select_project_category">
                                                    <option value="">Select Category</option>
                                                    @foreach($categories as $category)
                                                        @if($category->name == $project->category)
                                                            <option value="{{$category->name}}" selected>{{$category->name}}</option>
                                                        @else
                                                            <option value="{{$category->name}}">{{$category->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="update_current_feature_photo">Current Feature Photo*</label>
                                            <div class="col-sm-8">
                                                <img src="{{url('/')}}/assets/images/project/{{$project->feature_image}}" style="max-width: 200px;" alt="No Photo Added" id="docphoto">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="update_current_feature_photo">Feature Photo *</label>
                                            <div class="col-sm-8">
                                                <input type="file" accept="image/*" name="photo" class="hidden" onchange="readURL(this)" id="uploadFile"/>
                                                <div id="uploadTrigger" class="btn btn-default form-control">
                                                    <i class="fa fa-upload"></i> <span>Add Feature Photo</span>
                                                </div>
                                                <p>Prefered Image Ratio: (16:9)</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="update_project_description">Project Description*</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" name="description" id="update_project_description" rows="5" placeholder="Project Description" style="resize: vertical;"  required>{{$project->description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="update_project_video_link">Project Video Link* <span>(Youtube urls only)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="video_link" value="{{$project->video_link}}" id="update_project_video_link" placeholder="Project Video Link">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="update_project_end_date">End Date*</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control datepick" name="end_date" value="{{$project->end_date}}" id="update_project_end_date" placeholder="Enter End Date" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="update_project_goal">Goal* <span>in USD($)</span></label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" name="goal" value="{{$project->goal}}" id="update_project_goal" placeholder="Project Goal" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="update_project_preloaded_amount">Preloaded Amount(Optional)* <span>Seperated By Comma(,)</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="preloaded_amount" value="{{$project->preloaded_amount}}" id="update_project_preloaded_amount" placeholder="Preloaded Amount">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="update_close_project_after">Close Project After*</label>
                                            <div class="col-sm-6">
                                                <label class="radio-inline">
                                                    @if($project->end_after == "goal")
                                                        <input type="radio" name="end_after" value="goal" required checked>
                                                    @else
                                                        <input type="radio" name="end_after" value="goal" required>
                                                    @endif
                                                    Achieving Goal
                                                </label>
                                                <label class="radio-inline">
                                                    @if($project->end_after == "date")
                                                        <input type="radio" name="end_after" value="date" required checked>
                                                    @else
                                                        <input type="radio" name="end_after" value="date" required>
                                                    @endif
                                                    End Date
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3"></label>
                                            <div class="col-sm-8" data-toggle="buttons">
                                                @if($project->featured == 1)
                                                    <label class="btn btn-default active">
                                                        <input type="checkbox" name="featured" value="1" autocomplete="off" checked>
                                                        <span class="go_checkbox"><i class="glyphicon glyphicon-ok"></i></span>
                                                        Add to Featured Project
                                                    </label>
                                                @else
                                                    <label class="btn btn-default">
                                                        <input type="checkbox" name="featured" value="1" autocomplete="off">
                                                        <span class="go_checkbox"><i class="glyphicon glyphicon-ok"></i></span>
                                                        Add to Featured Project
                                                    </label>
                                                @endif
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">Update Project</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Update New Project area -->


                </div>
            </div>
        </div>

@stop
@section('footer')
    <script>

        $(".datepick").datepicker({
            minDate: new Date(),
            dateFormat: 'yy-mm-dd'
        });

        $("#uploadTrigger").click(function(){
            $("#uploadFile").click();
            $("#uploadFile").change(function(event) {
                $("#uploadTrigger").html($("#uploadFile").val());
            });
        });
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#docphoto').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        bkLib.onDomLoaded(function() {
            new nicEditor().panelInstance('update_project_description');
        });
    </script>
@stop