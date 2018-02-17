@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Your Pets</h2>
                    <div class="d-flex justify-content-center" >
                    @foreach($user->pets as $pet)
                        <div class="card">
                            <img class="card-img-top" src="/uploads/avatars/{{ $pet->avatar }}" alt="{{ $pet->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $pet->name }}</h5>
                                <a href="#" class="btn btn-primary">Edit</a>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
