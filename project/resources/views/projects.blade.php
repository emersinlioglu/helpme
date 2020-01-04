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
</style>
    <!-- Starting of Latest Campaigns area -->
    <div class="section-padding latest featured-auction-wrapper wow fadeInUp">
        @foreach($projects as $project)
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-title text-center">
                        <h2>{{$project->name}}</h2>
                        {{--<h2>{{$languages->newcamp_title}}</h2>--}}
                        {{--<p>{{$languages->newcamp_text}}</p>--}}
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

@stop