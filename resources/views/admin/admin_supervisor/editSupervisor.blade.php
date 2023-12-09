@extends('layouts.admin_layout')

@section('main')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-lg-8 m-auto">
                <h3>Edit Supervisor</h3>
                <div class="card  mb-4">
                    <div class="card-header bg-primary text-white">
                        <i class="fa-solid fa-person-chalkboard"></i>
                        Edit Supervisor
                    </div>
                    <div class="card-body table-responsive">
                        <form action="{{ route('admin.updateSupervisor',$supervisor->id) }}" method="post">
                            @csrf
                            <div class="mt-2 mt-2">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    placeholder="Enter name"
                                    value="{{old('first_name',$supervisor->first_name)}}">
                                @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-2 mt-2">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    placeholder="Enter last name"
                                    value="{{ old('last_name',$supervisor->last_name) }}">
                                @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-2 mt-2">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter email"
                                    value="{{ old('email',$supervisor->email) }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-2 mt-2">
                                {{-- <br> --}}
                                <input type="submit" class="btn btn-primary" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection