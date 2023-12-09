@extends('layouts.admin_layout')

@section('main')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-8 m-auto">
                <h1>Edit Thesis</h3>
                <div class="card  mb-4">
                    <div class="card-header bg-primary text-white">
                        <i class="fa-solid fa-book-tanakh"></i>
                        Edit Thesis
                    </div>
                    @if (session('updateAnnouncedThesis'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        {{ session('updateAnnouncedThesis') }}.
                    </div>
                @endif  
                    <div class="card-body table-responsive">
                        <form action="{{ route('admin.updateAnnouncedThesis',$id) }}" method="POST">
                            @csrf
                            <div class="mt-2 mt-2">
                                <label for="thesis_name">Thesis Name</label>
                                <input type="text" class="form-control" id="thesis_name" name="thesis_name"
                                    placeholder="Enter name"
                                    value="{{ old('thesis_name',$thesis->name) }}"
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
                                >
                                {{ $thesis->description }}
                            </textarea>

                                @error('thesis_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-2 mt-2">
                                <label for="thesis_type">Thesis Type</label>
                                <select name="thesis_type" id="thesis_type" class="form-select">
                                    <option value="{{ $thesis->type }}">{{ $thesis->type }}</option>
                                    <option value="research">Research</option>
                                    <option value="web application">Web Application</option>
                                    <option value="mobile application">Mobile Application</option>
                                    <option value="desktop application">desktop application</option>
                                    <option value="network">Network</option>
                                </select>
                                @error('thesis_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-2 mt-2">
                                <input type="submit" class="btn btn-primary" value="Update">
                                <a href="{{ route('admin.announcedThesises') }}" class="btn btn-success">back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>    
    </div>
@endsection