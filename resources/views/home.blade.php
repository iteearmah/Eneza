@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if(Session::has('accessToken'))
                    <p>
                        Here is your new personal access token. This is the only time it will be shown so don't lose it!
                            You may now use this token to make API requests.
                    </p>
                    <textarea class="form-control" rows="10">{{ session('accessToken') }}</textarea>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
