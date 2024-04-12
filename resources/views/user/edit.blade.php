@extends('layouts.master')

@section('web-content')
    <!-- Header -->
    @include('layouts.header-home')
    <!-- End Header -->
    <section class="content">
        <div class="container">
            @if($errors->any())
                <div class="alert alert-danger">
                    {{implode('', $errors->all(':message'))}}
                </div>
            @endif
            <div class="card p-4">
                <form action="{{route('user-update', ['user' => $user -> id])}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input class="my-2 form-control" type="text" name="name" id="name" placeholder="Nama Fakultas" autofocus maxlength="255" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="my-2 form-control" type="email" name="email" id="email" placeholder="Email" required autofocus maxlength="255" readonly value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="old_password">Password Sebelumnya</label>
                            <input class="my-2 form-control" type="password" name="old_password" id="old_password" placeholder="Password Sebelumnya" required autofocus maxlength="255">
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input class="my-2 form-control" type="password" name="password" id="password" placeholder="Password" required autofocus maxlength="255">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input class="my-2 form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="Password" required autofocus maxlength="255">
                        </div>
                        <div class="form-group">
                            <label for="id_role">Role</label>
                            <select name="id_role" id="id_role">
                                <option value="{{$user->id_role}}" selected>{{$user->id_role}}</option>
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
