@extends('layouts.admin_layout')
@section('main')
    <div class="container-fluid">
        <div class="row mt-5">
            @if ($students->count()>0)
            <div class="col-lg-8">
                <h1>All Students</h1>
                <div class="card  mb-4">
                    <div class="card-header bg-primary text-white">
                        <i class="fa-solid fa-people-group"></i>
                        Student
                    </div>
                    {{-- success message when any row deleted --}}
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
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->first_name }}</td>
                                        <td>{{ $student->last_name }}</td>
                                        <td>{{ $student->email }}</td>
                                        {{-- <td>
                                            <a href="" style="text-decoration: none">
                                                <i class="fa-solid fa-eye text-primary"></i>
                                            </a>
                                            <span class="text-primary"> | </span>
                                            <a href="#" style="text-decoration: none">
                                                <i class="fa-solid fa-user-pen text-success"></i>
                                            </a>
                                            <span class="text-primary"> | </span>
                                            <a href="{{ route('admin.deleteStudent',$student->id) }}" style="text-decoration: none">
                                                <i class="fa-solid fa-user-xmark text-danger"></i>
                                            </a>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            @else
                <div class="col-md-8">
                    <h1>No Student!</h1>
                    @if (session('delete'))
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    {{ session('delete') }}.
                </div>
                @endif
                </div>
            @endif
            
            <div class="col-lg-4">
                <h3>Add Student</h3>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        {{ session('success') }}.
                    </div>
                @endif
                <div class="card  mb-4">
                    <div class="card-header bg-primary text-white">
                        <i class="fa-solid fa-user-plus"></i>
                        Add New
                    </div>
                    <div class="card-body table-responsive">
                        <form action="{{ route('admin.addStudent') }}" method="POST">
                            @csrf
                            <div class="mt-2 mt-2">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    placeholder="Enter name"
                                    value="{{ old('first_name') }}"
                                >
                                @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-2 mt-2">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    placeholder="Enter last name"
                                    value="{{ old('last_name') }}"
                                >
                                @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-2 mt-2">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter email"
                                    value="{{ old('email') }}"
                                >
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
