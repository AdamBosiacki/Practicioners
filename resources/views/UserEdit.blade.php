@extends("layout")

@section("content")

    <div class="container">
        @if ($errors -> any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors -> all() as $error)
                        <li>
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session()->get('message'))
            <div class="alert alert-success" role="alert">
                <strong>Success: </strong>{{session()->get('message')}}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Profil {{Auth::user()->name}} {{\Illuminate\Support\Facades\Auth::user()->surname}}
                    </div>
                    <div class="card-body">
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{session('status')}}
                            </div>
                        @endif
                        @if($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>
                                    {{$message}}
                                </p>
                            </div>
                        @endif
                            @if($message = Session::get('error'))
                                <div class="alert alert-danger">
                                    <p>
                                        {{$message}}
                                    </p>
                                </div>
                            @endif
                        <form action="/UserEdit" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name"><strong>Name:</strong></label>
                                <input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}">
                            </div>
                            <div class="form-group">
                                <label for="surname"><strong>Surname:</strong></label>
                                <input type="text" class="form-control" id="surname" name="surname" value="{{Auth::user()->surname}}">
                            </div>
                            <div class="form-group">
                                <label for="email"><strong>Email:</strong></label>
                                <input type="text" class="form-control" id="email" name="email" value="{{Auth::user()->email}}">
                            </div><br>
                            <div class="form-group">
                                <label for="email"><strong>Zmie?? has??o:</strong></label>
                                <input type="password" class="form-control" id="haslo" name="haslo" value="">
                            </div><br>
                            <div class="form-group">
                                <label for="email"><strong>Powt??rz has??o:</strong></label>
                                <input type="password" class="form-control" id="haslo2" name="haslo2" value="">
                            </div><br>
                            <button class="btn btn-primary" type="submit">Update profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
