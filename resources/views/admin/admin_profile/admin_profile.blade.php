@extends('layouts.admin_layout')
@section('main')
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="text-center">Profile Details</h1>
                <div class="card  mb-4">
                    <div class="card-header bg-primary text-white">
                        <i class="fas fa-user fa-fw"></i>Profile
                    </div>
                    <div class="card-body table-responsive">
                        <form action="{{ route('updateProfile',auth()->user()->id) }}" method="post">
                            @csrf
                            <div class="m-auto mt-2" style="width:280px;height:220px;"> 
                                <img class="card-img-top" src="{{ asset('files/adminProfile/a.jpg') }}" alt="..."  style="height:250px;object-fit:fit;"/>
                            </div><br>
                            <div class="mt-2 mt-2">
                                <label for="first_name">Name</label>
                                <input type="text" class="form-control" id="first_name" name="name"
                                    placeholder="Enter name"
                                    value="{{old('first_name',auth()->user()->name)}}"
                                    >
                                {{-- @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror --}}
                            </div>
                            <div class="mt-2 mt-2">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter email"
                                    value="{{ old('email',auth()->user()->email) }}"
                                    >
                                {{-- @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror --}}
                            </div>
                            <div class="mt-2 mt-2">
                                <input type="submit" class="btn btn-primary" value="save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection