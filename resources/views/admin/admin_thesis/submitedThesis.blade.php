@extends('layouts.admin_layout')

@section('main')
    <div class="container-fluid">
        <div class="row mt-5">
              <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Submited Thesises</h1>
                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white">
                                <i class="fas fa-table me-1"></i>
                                submited Thesises
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Development Group</th>
                                            <th>Supervisor</th>
                                            <th>type</th>
                                            <th>Publish</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($submitedThesises as $submitedThesises)
                                            <tr>
                                                <td>{{ $submitedThesises->id }}</td>
                                                <td>{{ $submitedThesises->name }}</td>
                                                {{-- <td> {{ $submitedThesises->group[0]->id }}</td> --}}
                                                <td><a href="{{ route('admin.groupDetails',$submitedThesises->group[0]->id) }}">{{ $submitedThesises->group[0]->id }}</a></td>
                                                    
                                                <td>{{ $submitedThesises->group[0]->supervisors[0]->first_name.' '.$submitedThesises->group[0]->supervisors[0]->last_name }}</td>
                                                
                                                <td>{{ $submitedThesises->type }}</td>
                                                <td class="text-center"><a href="{{ route('admin.publishThesis',$submitedThesises->id) }}"><i class="fa-solid fa-upload" style="font-size: 23px"></i></a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            {{-- {{ $submitedThesiseses->links("pagination::bootstrap-5") }} --}}
                            </div>
                        </div>
                    </div>
                </main>
        </div>
    </div>
@endsection