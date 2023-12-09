@extends('layouts.admin_layout')

@section('main')
    <div class="container-fluid">
        <div class="row">
              <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Publish Thesises</h1>
                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white">
                                <i class="fas fa-table me-1"></i>
                                published Thesises
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Development Group</th>
                                            <th>Supervisor</th>
                                            <th>Proposal</th>
                                            <th>Book</th>
                                            <th>type</th>
                                            <th>Publish Year</th>
                                            <th>Used Technology</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($publishedThesises as $publishedThesises)
                                            <tr>
                                                <td>{{ $publishedThesises->id }}</td>
                                                <td>{{ $publishedThesises->name }}</td>
                                                <td>{{ $publishedThesises->group[0]->id }}</td>
                                                <td>{{ $publishedThesises->group[0]->supervisor_id }}</td>
                                                <td>{{ $publishedThesises->proposal }}</td>
                                                {{-- <td>{{ $publishedThesises->book }}</td> --}}
                                                {{-- <td>{{ $publishedThesises->platform }}</td> --}}
                                                <td>{{ $publishedThesises->year }}</td>
                                                {{-- <td>{{ $publishedThesises->technology }}</td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            {{-- {{ $publishedThesiseses->links("pagination::bootstrap-5") }} --}}
                            </div>
                        </div>
                    </div>
                </main>
        </div>
    </div>
@endsection