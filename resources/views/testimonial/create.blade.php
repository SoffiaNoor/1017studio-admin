@extends('layouts.master')

@section('content')
<style>
    .rating {
        border: none;
        float: left;
    }

    .myratings {

        font-size: 85px;
        color: green;
    }

    .rating>[id^="star"] {
        display: none;
    }

    .rating>label:before {
        margin: 5px;
        font-size: 2.25em;
        font-family: FontAwesome;
        display: inline-block;
        content: "\f005";
    }

    .rating>.half:before {
        content: "\f005";
        position: absolute;
    }

    .rating>label {
        color: #ddd;
        float: right;
    }

    .rating>[id^="star"]:checked~label,
    .rating:not(:checked)>label:hover,
    .rating:not(:checked)>label:hover~label {
        color: #FFD700;
    }

    .rating>[id^="star"]:checked+label:hover,
    .rating>[id^="star"]:checked~label:hover,
    .rating>label:hover~[id^="star"]:checked~label,
    .rating>[id^="star"]:checked~label:hover~label {
        color: #FFED85;
    }
</style>
<div class="container-fluid py-2">
    <div class="row">
        <div class="col-lg-12 mb-lg-0 mb-4 shadow-xl">
            <div class="card p-2">
                <div class="px-3 pt-2 font-weight-bold">
                    <h5 class="font-weight-bolder" style="color:black">Add Content Testimonial
                    </h5>
                    <hr style="background-color:#1c1c1c;height:10px;border-radius:40px;width:25%">
                </div>
                @if(session('error'))
                <div class="alert alert-danger m-2" style="color:white;font-weight:bold">
                    {{ session('error') }}
                </div>
                @endif
                <form class="p-3" method="POST" action="{{ route('testimonial.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="color:black">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="color:black;float:left">Rating</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                    <fieldset class="rating">
                                        <input type="radio" id="star5" name="rate" value="5" /><label class="full"
                                            for="star5" title="Awesome - 5 stars"></label>
                                        <input type="radio" id="star4" name="rate" value="4" /><label class="full"
                                            for="star4" title="Pretty good - 4 stars"></label>
                                        <input type="radio" id="star3" name="rate" value="3" /><label class="full"
                                            for="star3" title="Meh - 3 stars"></label>
                                        <input type="radio" id="star2" name="rate" value="2" /><label class="full"
                                            for="star2" title="Kinda bad - 2 stars"></label>
                                        <input type="radio" id="star1" name="rate" value="1" /><label class="full"
                                            for="star1" title="Sucks big time - 1 star"></label>
                                    </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="color:black">Description</label>
                                <input type="text" class="form-control" id="description" name="description" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 pt-2">
                            <button class="btn btn-icon btn-3 btn-secondary" type="button">
                                <a href="/testimonial" class="btn-inner--icon text-white"><i class="fa fa-arrow-left"
                                        aria-hidden="true"></i>
                                </a>
                                <a href="/testimonial" class="btn-inner--text text-white ms-2">Back</a>
                            </button>
                            <button class="btn btn-icon btn-3 btn-success"
                                style="background: linear-gradient(45deg, #525151, #1c1c1c)" type="submit">
                                <a class="btn-inner--icon text-white"><i class="fa fa-save" aria-hidden="true"></i>
                                </a>
                                <a class="btn-inner--text text-white ms-2">Save</a>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
            
</div>
@endsection

@section('jquery')
<script>
    $(document).ready(function(){

$("input[type='radio']").click(function(){
      var sim =  $("input[type='radio']:checked").val();
      //alert(sim);
      if (sim<3) {
      $('.myratings').css('color','red'); 
      $(".myratings").text(sim);
   }else{
      $('.myratings').css('color','green');
      $(".myratings").text(sim);
   }
   });


});
    const fileInput = document.getElementById('file_input');
    const imageDisplay = document.getElementById('image_display');

    fileInput.addEventListener('change', function() {
        if (fileInput.files.length > 0) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imageDisplay.src = e.target.result;
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    });
</script>
@endsection