@extends('admin.includes.masterpage-admin')

@section('content')

    <div class="right-side">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard Campaigns view details data-table area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="add-product-box">
                                    <div class="add-product-header campaigns">
                                        <h2>Project Details</h2>
                                        <a href="{!! url('admin/project') !!}" class="add-back-btn"><i class="fa fa-arrow-left"></i> Back</a>
                                    </div>
                                    <hr/>

                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover products dt-responsive nowrap" cellspacing="0" width="100%">
                                            <tbody>
                                            <tr>
                                                <td width="30%"><strong>Project ID</strong></td>
                                                <td>{{$project->id}}</td>
                                            </tr>
                                            <tr>
                                                <td width="30%"><strong>Project Name:</strong></td>
                                                <td>{{$project->name}}</td>
                                            </tr>
                                            <tr>
                                                <td width="30%"><strong>Project Description:</strong></td>
                                                <td>{{$project->description}}</td>
                                            </tr>
                                            <tr>
                                                <td width="30%"><strong>Project From:</strong></td>
                                                <td>{{$project->from ? date( 'd.m.Y', strtotime($project->from)) : ''}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <hr/>

                                    <div class="table-responsive">
                                        <table id="product-table_wrapper" class="table table-striped table-hover products dt-responsive" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th width="20%">Project Image</th>
                                                <th width="30%">Project Image Title</th>
                                                <th width="50%">Project Image Text</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($project->projectImages as $projectImage)
                                                <tr>
                                                    <td><img src="{{url('/')}}/assets/images/project/{{$projectImage->project_id}}/{{$projectImage->image}}" alt=""></td>
                                                    <td>{{$projectImage->title}}</td>
                                                    <td>{{$projectImage->text}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ending of Dashboard Campaigns view details data-table area -->


                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')

@stop