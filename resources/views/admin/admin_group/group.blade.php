@extends('layouts.admin_layout')

@section('main')
    <div class="container-fluid">
        <div class="row mt-5">
            @if ($groups->count()>0)
            <div class="col-lg-12">
                <h1>All Group</h1>
                <div class="card  mb-4">
                    <div class="card-header bg-primary text-white">
                        <i class="fa-solid fa-people-group"></i>
                        Groups
                    </div>
                {{-- success message when any row added --}}
                @if (session('create_group_message'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    {{ session('create_group_message') }}.
                </div>
                @endif
                {{-- showing message when any row delete --}}
                @if (session('delete_group_message'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    {{ session('delete_group_message') }}.
                </div>
                @endif
                {{-- showing message when any row updated --}}
                
                @if (session('update_group_message'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    {{ session('update_group_message') }}.
                </div>
                @endif
                    <div class="card-body table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Group Id</th>
                                    <th>Thesis</th>
                                    <th>Supervisor</th>
                                    <th>First Member</th>
                                    <th>Second Member</th>
                                    <th>Third Member</th>
                                    <th>Fourth Member</th>
                                    <th>Year</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($groups as $group)
                                    <tr>
                                        <td>{{ $group->id }}</td>
                                        <td>{{ $group->thesis_id }}</td>
                                        <td>{{ $group->supervisors[0]->email }}</td>
                                        {{-- @foreach ($group->groupMembers as $member) --}}
                                           
                                        <td>{{ $group->groupMembers[0]->student->email }}</td>
                                        
                                        @if($group->groupMembers[1]->student_id==0)
                                            <td>null</td>
                                        
                                        @else
                                        <td>{{ $group->groupMembers[1]->student->email }}</td>
                                        
                                        @endif
                                        @if($group->groupMembers[2]->student_id==0)
                                            <td>null</td>
                                        
                                        @else
                                        <td>{{ $group->groupMembers[2]->student->email }}</td>
                                        
                                        
                                        @endif
                                        @if($group->groupMembers[3]->student_id==0)
                                            <td>null</td>
                                    
                                        @else
                                        <td>{{ $group->groupMembers[3]->student->email }}</td>
                                        
                                        @endif
                                        
                                        
                                        
                                        <th>{{ $group->created_at->diffForHumans() }}</th>
                                        <td>
                                            
                                            {{-- <span class="text-primary">|</span> --}}
                                            {{-- <a href="{{ route('admin.editGroup',[
                                                $group->id,
                                                $group->thesis_id,
                                                $group->supervisor_id,
                                                $group->first_student_id,
                                                $group->second_student_id,
                                                $group->third_student_id,
                                                $group->fourth_student_id
                                                ]) }}"
                                                style="text-decoration: none"
                                            > --}}
                                                {{-- <i class="fa-solid fa-file-pen text-success"></i></a>
                                            <span class="text-primary">|</span> --}}
                                            <a href="{{ route('admin.deleteGroup',[$group->id,$group->thesis_id]) }}" style="text-decoration: none">
                                                <i class="fa-solid fa-trash-can text-danger"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            @else
                <div class="col-md-8">
                    <h1>No group!</h1>
                    @if (session('delete'))
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    {{ session('delete') }}.
                </div>
                @endif
                </div>
            @endif
        </div>
    </div>
@endsection
    