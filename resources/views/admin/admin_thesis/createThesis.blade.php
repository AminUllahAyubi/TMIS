@extends('layouts.admin_layout')

@section('main')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-8 m-auto">
                <h1>Add New Thesis</h3>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        {{ session('success') }}.
                    </div>
                @endif
                <div class="card  mb-4">
                    <div class="card-header bg-primary text-white">
                        <i class="fa-solid fa-book-tanakh"></i>
                        Add New
                    </div>
                    <div class="card-body table-responsive">
                        <form action="{{ route('admin.storeThesis') }}" method="POST">
                            @csrf
                            <div class="mt-2 mt-2">
                                <label for="thesis_name">Thesis Name</label>
                                <input type="text" class="form-control" id="thesis_name" name="thesis_name"
                                    placeholder="Enter name"
                                    value="{{ old('thesis_name') }}"
                                >
                                @error('thesis_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-2 mt-2">
                                <label for="thesis_description">Description</label>
                                <textarea type="text" class="form-control" id="thesis_description" name="thesis_description"
                                    placeholder="thesis description"
                                    value="{{ old('thesis_description') }}"
                                ></textarea>

                                @error('thesis_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-2 mt-2">
                                <label for="thesis_type">Thesis Type</label>
                                <select name="thesis_type" id="thesis_type" class="form-select">
                                    <option value="">Select Thesis Type</option>
                                    <option value="research">Research</option>
                                    <option value="web application">Web Application</option>
                                    <option value="mobile application">Mobile Application</option>
                                    <option value="desktop application">desktop application</option>
                                    <option value="network">Network</option>
                                    <option value="ordino">Ordino</option>
                                </select>
                                @error('thesis_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-2 mt-2">
                                <input type="submit" class="btn btn-primary" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>    
    </div>
@endsection