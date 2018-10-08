@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (session('error'))
                <div class="alert alert-success" role="alert">
                    <span class="sr-only">Error:</span>
                    {{ session('error') }}
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    {{ Form::open() }}

                        <div class="form-group">
                        {{ Form::label('name', 'Name') }}
                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                        {{ Form::label('email', 'E-Mail Address') }}
                        {{ Form::email('email', null, ['class' => 'form-control']) }}
                        </div>

                        {{ Form::submit('Create', ['class' => 'btn btn-default']) }}

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
