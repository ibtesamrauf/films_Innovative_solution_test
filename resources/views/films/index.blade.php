@extends('layouts.app')
@section('title', 'Films Project List')
@section('content')

<div class="container">
    <h2>List Films</h2>
    <a class="btn btn-primary" href="{{ route('films.create') }}">Create film</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th> id</th>
                <th> name</th>
                <th> description</th>
                <th> release_date</th>
                <th> rating</th>
                <th> ticket_price </th>
                <th> country</th>
                <th> genre</th>
                <th> photo</th>
                <th> Action</th>
            </tr>
        </thead>
        <tbody class="table-dynamic"></tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-dynamic"></ul>
    </nav>
</div>
<script>
    let url_temp = "{{ route('film.index') }}";
    let site_url = "{{ url('/') }}";
    function getFilmsList(page_number) {
        if(page_number) url_temp = page_number
        $.ajax({
            method: "GET",
            url: url_temp,
            success: (result) => {
                $('.table-dynamic').html("");
                
                let table_value_temp="<tr>";
                result.data.map(function (value) { 
                    table_value_temp+= "<td>"+value.id+"</td>"+
                    "<td>"+value.name+"</td>"+
                    "<td>"+value.description+"</td>"+
                    "<td>"+value.release_date+"</td>"+
                    "<td>"+value.rating+"</td>"+
                    "<td>"+value.ticket_price+"</td>"+
                    "<td>"+value.country+"</td>"+
                    "<td>"+value.genre+"</td>"+
                    "<td><img src='"+value.photo+"' width='250px'></td>"+
                    "<td>"+
                        "<a class='btn btn-primary btn-sm' href='"+site_url+"/"+value.slug+"'> View Film </a> / "+
                        " <a class='btn btn-primary btn-sm' href='"+site_url+"/comment/create?film_id="+value.id+"'> Post Comment </a>"+
                    "</td></tr>";
                    $('.table-dynamic').append(table_value_temp);
                });

                
                $('.pagination-dynamic').html("");
                result.meta.links.map(function (value) { 
                    renderPagination(value)
                });
            },
            error: (error) => {
                alert('Something went wrong to fetch datas...');
            }
        });
    }
    function renderPagination(value) {
        $('.pagination-dynamic').append('<li class="page-item"><a class="page-link" onclick="getFilmsList(\''+(value.url ? value.url : '')+'\')" >'+value.label+'</a></li>');
    }
    getFilmsList();
</script>
@endsection
