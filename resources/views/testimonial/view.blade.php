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
                    <h5 class="font-weight-bolder" style="color:black">Data: {{ $testimonial->id }}
                    </h5>
                    <hr style="background-color:#1c1c1c;height:10px;border-radius:40px;width:25%">
                </div>
                <div class="ms-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="color:black">Name</label>
                                <input type="text" value="{{ $testimonial->name }}" class="form-control" id="name"
                                    name="name" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="color:black;float:left">Rating</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <fieldset class="rating" disabled>
                                    <input type="radio" id="star5" name="rate" value="5" disabled /><label class="full"
                                        for="star5" title="Awesome - 5 stars"></label>
                                    <input type="radio" id="star4" name="rate" value="4" disabled /><label class="full"
                                        for="star4" title="Pretty good - 4 stars"></label>
                                    <input type="radio" id="star3" name="rate" value="3" disabled /><label class="full"
                                        for="star3" title="Meh - 3 stars"></label>
                                    <input type="radio" id="star2" name="rate" value="2" disabled /><label class="full"
                                        for="star2" title="Kinda bad - 2 stars"></label>
                                    <input type="radio" id="star1" name="rate" value="1" disabled /><label class="full"
                                        for="star1" title="Sucks big time - 1 star"></label>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="color:black">Description</label>
                                <textarea type="text" style="height:200px" class="form-control" id="description" name="description"
                                    value="" readonly>{{ $testimonial->description }}</textarea>
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
                                <a href="{{ route('testimonial.edit', $testimonial->id) }}"
                                    class="btn-inner--icon text-white"><i class="fa fa-save" aria-hidden="true"></i>
                                </a>
                                <a class="btn-inner--text text-white ms-2">Edit</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jquery')
<script>
    var ratingFromDB = <?php echo $testimonial->rate; ?>;
document.getElementById('star' + ratingFromDB).checked = true;
</script>
@endsection