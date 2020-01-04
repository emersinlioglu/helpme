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
                                                <input type="text" class="form-control" name="name" value="{{$project->name}}" id="update_project_name" placeholder="Enter Project Name" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="update_project_description">Project Description*</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" name="description" id="update_project_description" rows="5" placeholder="Project Description" style="resize: vertical;"  required>{{$project->description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3"></label>
                                            <div class="col-sm-8" data-toggle="buttons">
                                                <input type="hidden" name="active" value="0" autocomplete="off" checked>
                                                @if($project->active == 1)
                                                    <label class="btn btn-default active">
                                                        <input type="checkbox" name="active" value="1" autocomplete="off" checked>
                                                        <span class="go_checkbox"><i class="glyphicon glyphicon-ok"></i></span>
                                                        Active
                                                    </label>
                                                @else
                                                    <label class="btn btn-default">
                                                        <input type="checkbox" name="active" value="1" autocomplete="off">
                                                        <span class="go_checkbox"><i class="glyphicon glyphicon-ok"></i></span>
                                                        Active
                                                    </label>
                                                @endif
                                            </div>
                                        </div>

                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">Update Project</button>
                                        </div>
                                    </form>

                                    <hr/>


                                    <div class="add-product-footer">
                                        <a href="{!! url('admin/project-image/create/' . $project->id) !!}" class="btn btn-success add-product_btn"><i class="fa fa-plus"></i> Add Project Image</a>
                                    </div>

                                    <div class="table-responsive">
                                        <table id="product-table_wrapper" class="table table-striped table-hover products dt-responsive" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th width="20%">Project Image</th>
                                                <th>Project Image Title</th>
                                                <th width="15%">Project Image Text</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($projectImages as $projectImage)
                                                <tr>
                                                    <td><img src="{{url('/')}}/assets/images/project/{{$projectImage->project_id}}/{{$projectImage->image}}" alt=""></td>
                                                    <td>{{$projectImage->title}}</td>
                                                    <td>{{$projectImage->text}}</td>
                                                    <td>
                                                        <form method="POST" action="{!! action('ProjectImageController@destroy',['id' => $projectImage->id]) !!}">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            {{--<a href="projectImages/{{$projectImage->id}}/edit" class="btn btn-primary product-btn"><i class="fa fa-edit"></i> Edit </a>--}}
                                                            <button type="submit" class="btn btn-danger product-btn"><i class="fa fa-trash"></i> Remove </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

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
        bkLib.onDomLoaded(function() {
            new nicEditor().panelInstance('update_project_description');
        });
    </script>
@stop