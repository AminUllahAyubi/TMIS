@extends('layouts.admin_layout')

@section('main')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-lg-8 m-auto">
                <div class="card mb-4 mt-4" style="background-color: #f3f3f3">
                    <div class="card-header text-white" style="background-color: #2d3133">
                        <h3>{{ $thesis->name }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.publish', $thesis->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <strong>Title:</strong><input type="text" name="thesisName" class="form-control"
                                    value="{{ $thesis->name }}" readonly>
                            </div>
                            <div class="mb-3 mt-3">
                                <strong>Description:</strong>
                                <textarea class="form-control" name="thesisDescription" readonly>{{ $thesis->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Supervised by:</strong><input type="email" class="form-control"
                                                value="{{ $thesis->group[0]->supervisors[0]->email }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Development group members:</strong><br>
                                            <strong>member1</strong><input type="email" class="form-control"
                                                value="{{ $thesis->group[0]->groupMembers[0]->student->email }}" readonly>
                                            
                                                @if($thesis->group[0]->groupMembers[1]->student_id==0)
                                                
                                                @else
                                                {{-- <td>{{ $group->groupMembers[1]->student->email }}</td> --}}
                                            
                                                <strong>member2</strong><input type="email" class="form-control"
                                                value="{{ $thesis->group[0]->groupMembers[1]->student->email }}" readonly>
                                                @endif
                                                
                                                @if($thesis->group[0]->groupMembers[2]->student_id==0)
                                                
                                                @else
                                                {{-- <td>{{ $group->groupMembers[1]->student->email }}</td> --}}
                                            
                                                <strong>member2</strong><input type="email" class="form-control"
                                                value="{{ $thesis->group[0]->groupMembers[2]->student->email }}" readonly>
                                                @endif
                                            
        
                                                @if($thesis->group[0]->groupMembers[3]->student_id==0)
                                                
                                                @else
                                                {{-- <td>{{ $group->groupMembers[1]->student->email }}</td> --}}
                                            
                                                <strong>member2</strong><input type="email" class="form-control"
                                                value="{{ $thesis->group[0]->groupMembers[3]->student->email }}" readonly>
                                                @endif
                                            
                                            
                                            
                                            {{-- <strong>member3</strong><input type="email" class="form-control"
                                            value="{{ $thesis->group[0]->groupMembers[2]->student->email }}" readonly>
                                            <strong>member4</strong><input type="email" class="form-control"
                                                value="{{ $thesis->group[0]->groupMembers[3]->student->email }}" readonly> --}}
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                            <strong>Select Proposal,Book and image of project:</strong>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong><span class="text-danger">*</span> Proposal:</strong> <input type="file"  class="input-group"
                                        accept="application/docx,application/pdf"    name="thesisProposal">
                                    </div>
                                    @error('thesisProposal')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong><span class="text-danger">*</span> Book: <input type="file" class="input-group"accept="application/docx,application/pdf"    name="thesisBook"></strong>
                                    </div>
                                    @error('thesisBook')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong><span class="text-danger">*</span>Image:   </strong> <input type="file" class="input-group" name="thesisImage" accept="image/png,image/jpeg,image/gif">
                                    </div>
                                    @error('thesisImage')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="submit" class="btn btn-primary" value="submit">
                            </div>
                        </form>
    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection