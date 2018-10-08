@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <span class="sr-only">Error:</span>
                    {{ session('error') }}
                </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">Dashboard - <a href="/add">Create new contact</a></div>
            </div>
                @if (count($contacts))
                    <div class="panel panel-default">
                        <table class="table table-hover">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td><a href="/edit/{{ $contact->id }}">edit</a> / <a href="/delete/{{ $contact->id }}">delete</a></td>
                        </tr>
                        @endforeach
                        </table>
                    </div>
                @else
                    <div class="alert alert-warning" role="alert">
                        <p>No Contacts found!</p>    
                    </div>
                @endif

            {{ $contacts->links() }}
        </div>
    </div>
</div>
@endsection
