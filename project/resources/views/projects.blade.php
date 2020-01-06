@extends('includes.masterpage')

@section('content')

<style>
    .owl-carousel .owl-item img {
        height: 200px;
        width: auto;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .fa-info-circle {
        font-size: 14px;
        vertical-align: middle;
        cursor: pointer;
    }
</style>

<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Projekt-Details
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
            <div class="modal-body">

                adsfasdfa sdf asdf asdf asdf


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

    <!-- Starting of Latest Campaigns area -->
    <div class="section-padding latest featured-auction-wrapper wow fadeInUp">
        @foreach($projects as $project)
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2>{{$project->name}} @if($project->description)<i class="fa fa-info-circle project-details" data-description="{{$project->description}}"></i>@endif</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel featured-list">
                        @foreach($project->projectImages as $projectImage)
                            {{--<a href="{{url('/')}}/campaign/{{$projectImage->id}}">--}}
                                <div class="single-featured-item">
                                    <div class="featured-img">
                                        <img class="featured-im" src="{{url('/assets/images/project')}}/{{$projectImage->project_id}}/{{$projectImage->image}}" alt="">
                                    </div>

                                    {{--<div class="featured-text">--}}
                                        {{--<h3>{{$projectImage->name}}</h3>--}}
                                        {{--<div class="featured-meta">--}}
                                        {{--<span>--}}
                                            {{--@if (((strtotime($campaign->end_date)-time())/86400) < 0)--}}
                                                {{--<span>{{0}}</span>--}}
                                            {{--@else--}}
                                                {{--<span>{{ceil((strtotime($campaign->end_date)-time())/86400)}}</span>--}}
                                            {{--@endif--}}
                                            {{--{{$language->days_left}}--}}
                                        {{--</span>--}}
    {{--                                        <span class="pull-right"><span>${{\App\Donation::getFund($projectImage->id)}}</span> {{$language->funded}}</span>--}}
                                        {{--</div>--}}
                                        {{--<div class="progress">--}}
                                            {{--<div class="progress-bar" role="progressbar" aria-valuenow="28"--}}
                                                 {{--aria-valuemin="0" aria-valuemax="100" style="width:{{round(\App\Donation::getPercent($campaign->id))}}%">--}}
                                                {{--{{round(\App\Donation::getPercent($campaign->id))}}%--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
{{--                                        <p>{{ substr(strip_tags($projectImage->description), 0, 120) }}...</p>--}}
                                        {{--<div class="featured-meta-bottom">--}}
                                            {{--<span class="featured-left">{{$language->donate}}</span>--}}
                                            {{--<span class="pull-right"><i class="fa fa-heart-o"></i> {{\App\Donation::getDonations($campaign->id)}} {{$language->donations}}</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                            {{--</a>--}}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>
        @endforeach
    </div>
    <!-- Ending of Latest Campaigns area -->
    <br>
    <br>

@stop

@section('footer')
    <script>
        $('.project-details').click(function() {
            $('#mymodal').find('.modal-body').html($(this).data('description'));
            $('#mymodal').modal();
        })
    </script>
@stop