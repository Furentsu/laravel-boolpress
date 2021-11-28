@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card p-5">
            <div class="card-header">
                <h1>Hey, {{ session('lead')}}! Thank you for reaching out to us!</h1>
            </div>
            <p>
                <a href="{{ route('frontoffice.home') }}">Back to the homepage</a>
            </p>
        </div>
    </div>
@endsection