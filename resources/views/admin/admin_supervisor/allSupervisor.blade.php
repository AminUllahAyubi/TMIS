@extends('layouts.admin_layout')
@section('main')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-lg-8">
                <h1>All Supervisor</h1>
                <div class="card  mb-4">
                    <div class="card-header bg-primary text-white">
                        <i class="fa-solid fa-person-chalkboard"></i>
                        Supervisors
                    </div>
                    {{-- delete row success message --}}
                    @if (session('update_supervisor_message'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        {{ session('update_supervisor_message') }}.
                    </div>
                    @endif
                    {{-- delete row success message --}}
                    @if (session('delete'))
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        {{ session('delete') }}.
                    </div>
                    @endif
                    <div class="card-body table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Added Date</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($supervisors as $supervisor)
                                    <tr>
                                        <td>{{ $supervisor->id }}</td>                                        
                                        <td>
                                            <a href="{{ route('admin.viewSupervisorGroups',$supervisor->id)}}"> {{ $supervisor->first_name }}</a>
                                        </td>
                                        <td>{{ $supervisor->last_name }}</td>
                                        <td>{{ $supervisor->email }}</td>
                                        <td>{{ $supervisor->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('admin.editSupervisor',$supervisor->id) }}" style="text-decoration: none">
                                                <i class="fa-solid fa-user-pen text-success"></i>
                                            </a>
                                            {{-- <span class="text-primary"> | </span>
                                            <a href="{{ route('admin.deleteSupervisor',$supervisor->id) }}" style="text-decoration: none">
                                                <i class="fa-solid fa-user-xmark text-danger"></i>
                                            </a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        {{ $supervisors->links("pagination::bootstrap-5") }}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h3>Add Supervisor</h3>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        {{ session('success') }}.
                    </div>
                @endif
                <div class="card  mb-4">
                    <div class="card-header bg-primary text-white">
                        <i class="fa-solid fa-person-chalkboard"></i>
                        add new
                    </div>
                    <div class="card-body table-responsive">
                        <form action="{{ route('admin.addSupervisor') }}" method="post">
                            @csrf
                            <div class="mt-2 mt-2">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    placeholder="Enter name"
                                    value="{{ old('first_name') }}">
                                @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-2 mt-2">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    placeholder="Enter last name"
                                    value="{{ old('last_name') }}">
                                @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-2 mt-2">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter email"
                                    value="{{ old('email') }}">
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
