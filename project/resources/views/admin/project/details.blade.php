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
                                            </tbody>
                                        </table>
                                    </div>

                                    <hr/>
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