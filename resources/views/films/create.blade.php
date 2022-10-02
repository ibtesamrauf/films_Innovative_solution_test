@extends('layouts.app')
@section('title', 'Films Project List')
@section('content')

<div class="container">
    <h2>Create Film</h2>
    <p>Using api jquery and api</p>
    <div class="error-box-dynamic"></div>
    
    <form action="{{route('film.store')}}" onsubmit="return false" id="form">
        <div class="form-group mb-3">
            <label for="name">Film Name:</label>
            <input class="form-control" id="name" placeholder="Enter film name" name="name" required>
        </div>
        <div class="form-group mb-3">
            <label for="description">Description:</label>
            <input class="form-control" id="description" placeholder="Enter description" name="description" required>
        </div>
        <div class="form-group mb-3">
            <label for="release_date">Release date:</label>
            <input class="form-control" id="release_date" placeholder="Enter release date" name="release_date" required>
        </div>
        <div class="form-group mb-3">
            <label for="rating">Rating:</label>
            <input class="form-control" id="rating" placeholder="Enter rating" name="rating" required>
        </div>
        <div class="form-group mb-3">
            <label for="ticket_price">Ticket price:</label>
            <input class="form-control" id="ticket_price" placeholder="Enter ticket price" name="ticket_price" required>
        </div>
        <div class="form-group mb-3">
            <label for="country">Country:</label>
            <input class="form-control" id="country" placeholder="Enter country" name="country" required>
        </div>
        <div class="form-group mb-3">
            <label for="genre">Genre:</label>
            <input class="form-control" id="genre" placeholder="Enter genre" name="genre" required>
        </div>
        <div class="form-group mb-3">
            <label for="photo">Photo:</label>
            <input type="file" class="form-control" id="photo" placeholder="Enter photo" name="photo" required>
        </div>
        <button type="bitton" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('.error-box-dynamic').html("");

        $("#form").on('submit', (function(e) {
            e.preventDefault();
            $('.error-box-dynamic').html("");
            $.ajax({
                url: $(this).attr('action'),
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    // $("#form").trigger("reset"); // to reset form input fields
                    window.location.href = "{{route('films.index')}}"
                },
                error: function(e) {
                    console.log(e);
                    Object.keys(e.responseJSON.error).forEach(function(key) {
                        $('.error-box-dynamic').append('<div class="alert alert-danger alert-dismissible" ><button type="button" class="close" data-dismiss="alert">&times;</button>'+e.responseJSON.error[key]+'</div>');
                        console.log(key, e.responseJSON.error[key]);
                    });
                    window.scrollTo(0, 0);
                }
            });
        }));
    });
</script>
@endsection