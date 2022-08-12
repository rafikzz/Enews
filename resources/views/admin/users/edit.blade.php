@extends('layouts.admin.master')
@section('title')
    User Management
@endsection
@section('content')
    <div class="row card card-outline card-warning ">
        <div class="card-header">
            <h2 class="card-title ">Edit User</h2>
            <div class="card-tools">
                <a class="btn btn-primary" href="{{ route('admin.users.index') }}"> Back</a></i></a>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                @csrf
                @method('PUT')
                <div class="row col-md-6">
                    <div class="form-group">
                        <label class="label" for="name">User Name</label>
                        <input type="text" name="name" value="{{ old('name') ?: $user->name }}"
                            class="form-control  @error('name') is-invalid @enderror" minlength="3"
                            placeholder="Enter Name" required>
                        @error('name')
                            <span class=" text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="label" for="email">User Email</label>
                        <input type="email" name="email" value="{{ old('email') ?: $user->email }}"
                            class="form-control  @error('email') is-invalid @enderror"
                            placeholder="Enter Email" required>
                        @error('email')
                            <span class=" text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="label" for="password">Password</label>
                        <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror"
                            minlength="8" placeholder="Enter Password" required>
                        @error('password')
                            <span class=" text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="label" for="confirm-password">Confirm Password</label>
                        <input type="password" name="confirm-password"
                            class="form-control  @error('confirm-password') is-invalid @enderror" minlength="8"
                            placeholder="Confirm Password" required>
                        @error('confirm-password')
                            <span class=" text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="label" for="confirm-password">Role</label>
                        <div class="px-3">
                            <input class="form-check-input" type="radio" name="role" value="superadmin" @if (old('type') ?: $user->role == 'superadmin') checked @endif>
                            <label class="form-check-label">Super Admin  </label>
                        </div>
                        <div class="px-3">
                            <input class="form-check-input" type="radio" name="role" value="admin"  @if (old('type') ?: $user->role == 'admin') checked @endif>
                            <label class="form-check-label">Admin</label>

                        </div>
                        <div class="px-3">
                            <input class="form-check-input" type="radio" name="role" value="user"  @if ((old('type') !== 'admin' || old('type') !== 'superadmin')?: $user->role == 'user') checked @endif >
                            <label class="form-check-label">User</label>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary  mt-3">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
