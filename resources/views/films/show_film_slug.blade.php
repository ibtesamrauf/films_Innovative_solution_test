@extends('layouts.app')
@section('title', 'Films Project List')
@section('content')

<div class="container">
    <h2>Films Details</h2>
    <p>{{$film->description}}</p> 
    <table class="table table-bordered table-striped ">
        <tbody>
            <tr>
                <td>Id</td>
                <td>{{$film->id}}</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{$film->name}}</td>
            </tr>
            <tr>
                <td>Description</td>
                <td>{{$film->description}}</td>
            </tr>

            <tr>
                <td>Release Date</td>
                <td>{{$film->release_date}}</td>
            </tr>
            <tr>
                <td>Rating</td>
                <td>{{$film->rating}}</td>
            </tr>
            <tr>
                <td>Ticket Price</td>
                <td>{{$film->ticket_price}}</td>
            </tr>
            <tr>
                <td>Country</td>
                <td>{{$film->country}}</td>
            </tr>
            <tr>
                <td>Genre</td>
                <td>{{$film->genre}}</td>
            </tr>
            <tr>
                <td>Photo</td>
                <td><img src="{{asset($film->photo)}}" width="250px"/></td>
            </tr>
           
        </tbody>
    </table>
</div>

@endsection
