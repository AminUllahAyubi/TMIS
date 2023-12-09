
@auth
@extends('layouts.admin_layout')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Published Thesis <span
                                    class="badge bg-light text-dark">{{ $publishedThesises->count() }}</span></div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="{{ route('admin.index') }}">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Announced Project <span
                                        class="badge bg-light text-dark">{{ $announcedThesises->count() }}</span></div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link"
                                        href="{{ route('admin.announcedThesises') }}">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Research <span
                                        class="badge bg-light text-dark">{{ $researchThesises->count() }}</span></div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="{{ route('admin.groupBy','research') }}">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Web Applications <span
                                        class="badge bg-light text-dark">{{ $webAppThesises->count() }}</span></div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="{{ route('admin.groupBy','web application') }}">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (session('deletePublishedThesis'))
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            {{ session('deletePublishedThesis') }}.
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                                <form action="{{ route('admin.search') }}" method="GET" class="mt-3">
                                    @csrf
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="searchedThesisName"
                                            placeholder="search thesis by name" aria-label="Enter search term..."
                                            aria-describedby="button-search" />
                                        <button class="btn btn-primary"><i
                                                class="fa-sharp fa-light fa-magnifying-glass"></i></button>
                                    </div>
                                </form>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">

                                    <form action="{{ route('admin.filterThesis') }}" method="post">
                                        @csrf

                                        <div class="input-group mt-3 mb-3">

                                            <select name="thesis_type" class="form-select" required>
                                                <option value="all">All</option>
                                                <option value="web application">Web Application</option>
                                                <option value="network">Network</option>
                                                <option value="mobile application">Mobile Application</option>
                                                <option value="research">Research</option>
                                                <option value="ordino">Ordino</option>
                                                <option value="desktop application">Desktop Application</option>
                                            </select>
                                            <input type="submit" class="btn btn-primary" value="filter by">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <i class="fas fa-table me-1"></i>
                            All Published Thesis
                        </div>
                        @if ($thesises->count() < 1)
                            <h3 class="p-3">No Publish Thesis Exists!</h3>
                        @else
                            <div class="card-body table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Development Group Id</th>
                                            <th>Supervisor</th>
                                            {{-- <th>Proposal</th> --}}
                                            {{-- <th>image</th> --}}
                                            <th>type</th>
                                            <th>Submited Time</th>
                                            {{-- <th>Used Technology</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($thesises as $thesis)
                                            @if (count($thesis->group))
                                                <tr>
                                                    <td>{{ $thesis->id }}</td>
                                                    <td>
                                                        <a
                                                            href="{{ route('admin.view', $thesis->id) }}">{{ $thesis->name }}</a>
                                                    </td>
                                                    <td><a href="{{ route('admin.groupDetails',$thesis->group[0]->id) }}"> {{ $thesis->group[0]->id }}</a></td>
                                                    <td>{{ $thesis->group[0]->supervisors[0]->email }}</td>
                                                    {{-- <td><img src="{{ asset($thesis->image) }}" style='height:50px;width:100px' alt=""></td> --}}
                                                    <td>{{ $thesis->type }}</td>
                                                    <td>{{ $thesis->created_at->diffForHumans() }}</td>
                                                    {{-- <td><input type="file" value='{{ $thesis->proposal }}'></td> --}}
                                                    <td>
                                                        <a href="{{ route('admin.deletePublishedThesis', $thesis->id) }}"
                                                            class="btn btn-danger btn-sm">
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- {{ $thesises->links('pagination::bootstrap-5') }} --}}
                            </div>
                        @endif

                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
    
@endauth