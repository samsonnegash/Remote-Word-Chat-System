@extends('lap::layouts.auth')

@section('title', 'Head Dashboard')
@section('child-content')
    <h2>@yield('title')</h2>

    <div class="card">
        <div class="card-body">
            Hello CSE depatment ,You are logged in! <br> <br>
            <h4 style="color: blue">what you have to do:</h3> <hr>

                <center> <ol>
                    <li>Create A Student And Teacher</li>
                    <li>Verify student information</li>
                    <li>Remove non student user from list</li>
                    <li>Make Announcement For Students And Teachers</li>
                    <a href="http://127.0.0.1:8000/home"><center>student</center></a>
                  </ol>
                  </center>
        </div>
    </div>
@endsection
