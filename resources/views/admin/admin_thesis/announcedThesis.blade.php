@extends('layouts.admin_layout')

@section('main')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="container-fluid px-4">
                <h1>Announced Thesis</h1>
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <div class="row">
                            <div class="col-sm-10">
                                <i class="fas fa-table me-1"></i>
                                Announced Thesis
                            </div>
                            <div class="col-sm-2">
                                <a href="{{ route('announcedThesisPDF') }}" class="btn btn-success btn-sm">create PDF</a>
                            </div>
                        </div>
                    </div>
                    @if (session('delete'))
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            {{ session('delete') }}.
                        </div>
                    @endif

                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Type</th>
                                    <th class="text-center">Submited To Group</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($announcedThesises as $thesis)
                                    <tr>
                                        <td>{{ $thesis->id }}</td>
                                        <td>{{ $thesis->name }}</td>
                                        <td>{{ $thesis->description }}</td>
                                        <td>{{ $thesis->type }}</td>
                                        <td class="text-center"><a
                                                href="{{ route('admin.submitThesisToGroup', $thesis->id) }}"><i
                                                    class="fa-solid fa-circle-up"></i></a></td>
                                        <td>
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <a href="{{ route('admin.editAnnouncedThesis', $thesis->id) }}"
                                                        class="btn btn-success btn-sm">
                                                        Edit
                                                    </a>
                                                </div>
                                                <div class="col-xl-4">
                                                    <a href="{{ route('admin.deleteAnnouncedThesis', $thesis->id) }}"
                                                        class="btn btn-danger btn-sm">
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $thesises->links("pagination::bootstrap-5") }} --}}
                    </div>
                </div>
            </div>
            </main>
        </div>
    </div>
@endsection
