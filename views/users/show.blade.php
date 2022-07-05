@extends('main')

@section('content')

<div class="show">
    <div class="show__window">
        <div class="show__top">
            <h2 class="show__top-title">User list</h2>
            <button class="show__top-button" onclick="window.location=`{{ url('/users/add-user')}}`">+ Add user</button>
        </div>
        <table class="show__table">
            <tr>
                <th>Client name</th>
                <th>E-mail</th>
                <th>Actions</th>
            </tr>
            @foreach ($users as $item)
            <tr>
                <td>{{$item->client_name}}</td>
                <td>{{$item->email}}</td>
                <td><button class="show__table-button--edit"><a href="/users/edit/{{$item->id}}">Edit</a></button><button class="show__table-button--delete">
                    <a href="/users/delete/{{$item->id}}">Delete</a></button>
                </td>
            </tr>
            
            @endforeach
            
        </table>
        {{ $users->links() }}
    </div>
</div>

@endsection