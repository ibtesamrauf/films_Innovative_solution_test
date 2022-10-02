@extends('layouts.app')
@section('title', 'Films Project List')
@section('content')

<div class="container">
    <h2>Create Comment</h2>
    <p>Using api jquery and api</p>
    <div class="error-box-dynamic"></div>
    @if($errors->any())
        {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
    @endif

    <form action="{{route('comment.store')}}" method="post" id="form">
        @csrf
        <input type="hidden" value="{{$film_id}}" name="film_id">
        <div class="form-group mb-3">
            <label for="name">Name:</label>
            <input class="form-control" id="name" placeholder="Enter name" name="name" >
        </div>
        <div class="form-group mb-3">
            <label for="comment">Comment:</label>
            <input class="form-control" id="comment" placeholder="Enter comment" name="comment" >
        </div>
        <button type="bitton" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection