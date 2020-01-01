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
                                        <h2>Create Project</h2>
                                        <a href="{!! url('admin/project') !!}" class="add-back-btn"><i class="fa fa-arrow-left"></i> Back</a>
                                    </div>
                                    <hr/>
                                    <form method="POST" action="{!! action('ProjectController@store') !!}" id="add_form" class="form-horizontal"  enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="update_project_name">Project Name*</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="name" id="update_project_name" placeholder="Enter Project Name" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3" for="update_project_description">Project Description*</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" name="description" id="update_project_description" rows="5" placeholder="Project Description" style="resize: vertical;" ></textarea>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="add-product-footer">
                                            <button name="addProduct_btn" type="submit" class="btn btn-success add-product_btn">Create Project</button>
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
    </div>

@stop
@section('footer')
    <script>

        // $(".datepick").datepicker({
        //     minDate: new Date(),
        //     dateFormat: 'yy-mm-dd'
        // });
        //
        // $("#uploadTrigger").click(function(){
        //     $("#uploadFile").click();
        //     $("#uploadFile").change(function(event) {
        //         $("#uploadTrigger").html($("#uploadFile").val());
        //     });
        // });
        // function readURL(input) {
        //
        //     if (input.files && input.files[0]) {
        //         var reader = new FileReader();
        //
        //         reader.onload = function (e) {
        //             $('#docphoto').attr('src', e.target.result);
        //         };
        //
        //         reader.readAsDataURL(input.files[0]);
        //     }
        // }
        bkLib.onDomLoaded(function() {
            new nicEditor().panelInstance('update_project_description');
        });
    </script>
@stop