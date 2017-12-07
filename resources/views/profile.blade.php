@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">User Profile: {{ $user->name }}</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <div class="form-control-static">{{ $user->email }}</div>
                        </div>
                        <hr />
                        <div class="form-group">
                            <label class="control-label">Phone Number</label>
                            <div class="form-control-static">{{ $user->phone }}</div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Address</label>
                            <div class="form-control-static">{{ $user->address }}</div>
                        </div>
                        <hr />
                        <div class="form-group">
                            <label class="control-label">Favorite Sport</label>
                            <div class="form-control-static">{{ $user->sport }}</div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Favorite Color</label>
                            <div class="form-control-static">{{ $user->color }}</div>
                        </div>
                    </div>
                    @if ($user->id == Auth::id())
                        <div class="panel-footer">
                            <a href="{{ route('settings') }}" class="btn btn-primary">Edit</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
