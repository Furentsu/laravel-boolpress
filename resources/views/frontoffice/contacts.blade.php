@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card p-5">
            <div class="card-header">
                <h1>Contact us</h1>
            </div>

            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>        
                @endif

                <form action="{{route('frontoffice.contacts.send')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control form-control-lg" type="text" id="name" name="name" value="{{ old('name') }}">
                    </div>
    
                    <div class="form-group">
                        <label for="email_address">Email</label>
                        <input class="form-control form-control-lg" type="text" id="email" name="email" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea  class="form-control" type="textarea" id="message" name="message" >{{old('message') }} </textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
@endsection