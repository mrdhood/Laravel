@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form method="post" action="{{ route('settings') }}" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="panel panel-default">
                        <div class="panel-heading">Account Settings</div>

                        <div class="panel-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Address</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                           class="form-control"
                                           name="address"
                                           value="{{ old('address') ?: Auth::user()->address }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Phone Number</label>
                                <div class="col-sm-9">
                                    <input type="tel"
                                           class="form-control"
                                           name="phone"
                                           value="{{ old('phone') ?: Auth::user()->phone }}" />
                                </div>
                            </div>
                            <hr />
                            <?php
                            // Likely a better way to do this.
                            $color = old('color') ?: Auth::user()->color;
                            $sport = old('sport') ?: Auth::user()->sport;
                            ?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Favorite Color</label>
                                <div class="col-sm-9">
                                    <select name="color" class="form-control" required="required">
                                        <option value="blue" {{ $color === 'blue' ? ' selected="selected"' : '' }}>Blue</option>
                                        <option value="green" {{ $color === 'green' ? ' selected="selected"' : '' }}>Green</option>
                                        <option value="red" {{ $color === 'red' ? ' selected="selected"' : '' }}>Red</option>
                                        <option value="error">Error</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Favorite Sport</label>
                                <div class="col-sm-9">
                                    <select name="sport" class="form-control" required="required">
                                        <option value="baseball" {{ $sport === 'baseball' ? ' selected="selected"' : '' }}>Baseball</option>
                                        <option value="basketball" {{ $sport === 'basketball' ? ' selected="selected"' : '' }}>Basketball</option>
                                        <option value="football" {{ $sport === 'football' ? ' selected="selected"' : '' }}>Football</option>
                                        <option value="hockey" {{ $sport === 'hockey' ? ' selected="selected"' : '' }}>Hockey</option>
                                        <option value="soccer" {{ $sport === 'soccer' ? ' selected="selected"' : '' }}>Soccer</option>
                                        <option value="golf" {{ $sport === 'golf' ? ' selected="selected"' : '' }}>Golf</option>
                                        <option value="error">Error</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="panel-footer">
                            <input type="submit" class="btn btn-primary" value="Save" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
