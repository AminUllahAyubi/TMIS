@extends('layouts.home_layout')

@section('main')

    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            @if ($thesises->count() == 0)
                <h1>No Thesis Exists!</h1>
            @else
                @foreach ($thesises as $thesis)
                    <div class="card mb-4">
                        @if ($thesis->image)
                            <img class="card-img-top" src="{{ asset($thesis->image) }}" alt="..." style="height: 300px" />
                        @endif
                        <div class="card-body">
                            <h2 class="card-title">{{ $thesis->name }}</h2>
                            <p class="card-text">{{ $thesis->description }}.</p>
                            <hr>
                            <a class="btn btn-primary" href="{{ route('home.view', $thesis->id) }}">Read more →</a>
                        </div>
                    </div>
                @endforeach
                {{ $thesises->links('pagination::bootstrap-5') }}
            @endif

        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Search widget-->
            <div class="card mb-4">
                <div class="card-header">
                    Search
                </div>
                <div class="card-body">
                    <form action="{{ route('home.search') }}" method="GET">
                        @csrf
                        <div class="input-group">
                            <input class="form-control" type="text" name="searchedThesisName"
                                placeholder="Enter search term..." aria-label="Enter search term..."
                                aria-describedby="button-search" />
                            <button class="btn btn-primary"><i class="fa-sharp fa-light fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="{{ route('home.index') }}">All</a></li>
                            
                                <li><a href="{{ route('home.filterThesis', $name = 'mobile application') }}">Mobile
                                        Application</a></li>
                                <li><a href="{{ route('home.filterThesis', $name = 'desktop application') }}">Desktop
                                        Application</a></li>
                                <li><a href="{{ route('home.filterThesis', $name = 'research') }}">Research</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="{{ route('home.filterThesis', $name = 'network') }}">Network</a></li>
                                <li><a href="{{ route('home.filterThesis', $name = 'ordino') }}">Ordino</a></li>
                                <li><a href="{{ route('home.filterThesis', $name = 'web application') }}">Web Application</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side widget-->
            {{-- <div class="card mb-4">
            <div class="card-header">Side Widget</div>
            <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
        </div> --}}
        </div>
    </div>
@endsection
