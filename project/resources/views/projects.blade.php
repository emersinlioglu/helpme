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

<div class="modal fade" id="project-details-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        @foreach($projects as $projectKey => $project)
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
                        @foreach($project->projectImages as $key => $projectImage)
                            {{--<a href="{{url('/')}}/campaign/{{$projectImage->id}}">--}}
                                <div class="single-featured-item">
                                    <div class="featured-img">
                                        <img class="featured-im"
                                             src="{{url('/assets/images/project')}}/{{$projectImage->project_id}}/{{$projectImage->image}}"
                                             alt=""
                                             onclick="openModal('myModal-{{$projectKey}}'); currentSlide({{$key}});"
                                        >
                                    </div>
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



@foreach($projects as $projectKey => $project)
    <!-- The Modal/Lightbox -->
    <div id="myModal-{{$projectKey}}" class="modal">
        <span class="close cursor" onclick="closeModal()">&times;</span>
        <div class="modal-content">

            <!-- Thumbnail image controls -->
            @foreach($project->projectImages as $key => $projectImage)
                <div class="mySlides">
                    <div class="numbertext">{{$key}} / {{count($project->projectImages)}}</div>
                    <img src="{{url('/assets/images/project')}}/{{$projectImage->project_id}}/{{$projectImage->image}}">
                </div>
            @endforeach


        <!-- Next/previous controls -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>

            <!-- Caption text -->
            <div class="caption-container">
                <p id="caption"></p>
            </div>

            <!-- Thumbnail image controls -->
            @foreach($project->projectImages as $key => $projectImage)
                <div class="column">
                    <img src="{{url('/assets/images/project')}}/{{$projectImage->project_id}}/{{$projectImage->image}}"
                         onclick="currentSlide({{$key}})" class="demo hover-shadow">
                </div>
            @endforeach
        </div>
    </div>
@endforeach


<style>
    .row > .column {
        padding: 0 8px;
    }

    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Create four equal columns that floats next to eachother */
    .column {
        float: left;
        text-align: center;
        padding-right: 4px;
    }
    .column img {
        height: 100px;
        width: auto;
    }

    /* The Modal (background) */
    .modal {
        display: none;
        position: fixed;
        z-index: 9999;
        padding-top: 15px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: black;
    }

    /* Modal Content */
    .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        width: 90%;
        max-width: 1200px;
    }

    /* The Close Button */
    .close {
        color: white;
        position: absolute;
        top: 10px;
        right: 25px;
        font-size: 35px;
        font-weight: bold;
        opacity: 100%;
    }

    .close:hover,
    .close:focus {
        color: #999;
        text-decoration: none;
        cursor: pointer;
    }

    /* Hide the slides by default */
    .mySlides {
        display: none;
        text-align: center;
    }
    .mySlides img {
        width: auto;
        max-height: 645px;
    }

    /* Next & previous buttons */
    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -50px;
        color: white;
        font-weight: bold;
        font-size: 20px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* Caption text */
    .caption-container {
        text-align: center;
        background-color: black;
        padding: 2px 16px;
        color: white;
    }

    img.demo {
        opacity: 0.6;
    }

    .active,
    .demo:hover {
        opacity: 1;
    }

    img.hover-shadow {
        transition: 0.3s;
    }

    .hover-shadow:hover {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
</style>


@stop

@section('footer')
    <script>
        $('.project-details').click(function() {
            $('#project-details-modal').find('.modal-body').html($(this).data('description'));
            $('#project-details-modal').modal();
        })
    </script>
    <script>
        var activeModal = null;
        // Open the Modal
        function openModal(modalId) {
            activeModal = $('#' + modalId);
            console.log(activeModal);
            // activeModal.style.display = "block";
            activeModal.css("display", "block");
        }

        // Close the Modal
        function closeModal(modalId) {
            // activeModal.style.display = "none";
            activeModal.css("display", "none");
        }

        var slideIndex = 1;
        // showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = activeModal.find(".mySlides");
            var dots = activeModal.find(".demo");
            var captionText = activeModal.find("#caption");
            if (n >= slides.length) {slideIndex = 0}
            if (n < 0) {slideIndex = slides.length-1}
            for (i = 0; i < slides.length; i++) {
                // slides[i].style.display = "none";
                slides.eq(i).css("display", "none");
            }
            for (i = 0; i < dots.length; i++) {
                dots.eq(i).removeClass("active");
            }
            slides.eq(slideIndex).css("display", "block");
            dots.eq(slideIndex).addClass("active");
            captionText.innerHTML(dots.eq(slideIndex).attr('alt'));
        }
    </script>
@stop