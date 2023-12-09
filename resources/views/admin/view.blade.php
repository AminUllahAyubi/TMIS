@extends('layouts.admin_layout')

@section('main')
    <div class="row mt-1">
        <!-- Blog entries-->
        <div class="col-lg-8 m-auto">
            <!-- Featured blog post-->
            <div class="card mb-4">
                <div class="card-header  text-center text-white" style="background-color: #2d3133">
                    <h3>{{ $thesis->name }}</h3>
                </div>
                @if ($thesis->image)
                    <img class="card-img-top" src="{{ asset($thesis->image) }}" alt="..."  style="height: 300px"/>
                @endif

                <div class="card-body">
                    <div class="form-group">
                        <strong>Title:</strong>
                        <p class="form-control">{{ $thesis->name }}</p>
                    </div>
                    <div class="mb-3 mt-3">
                        <strong>Description:</strong>
                        <textarea class="form-control">{{ $thesis->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    @if (count($thesis->group))
                                        <strong>Supervised by:</strong>
                                        <p class="form-control"> {{ $thesis->group[0]->supervisors[0]->email }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if (count($thesis->group))
                                    <div class="form-group">
                                        <strong>Development group members:</strong><br>
                                        {{-- <strong>member1</strong>
                                        <p class="form-control">{{ $thesis->group[0]->groupMembers[0]->student->email }}</p>
                                        <strong>member2</strong>
                                        <p class="form-control">{{ $thesis->group[0]->groupMembers[1]->student->email }}</p>
                                        <strong>member3</strong>
                                        <p class="form-control">{{ $thesis->group[0]->groupMembers[2]->student->email }}</p>
                                        <strong>member4</strong>
                                        <p class="form-control">{{ $thesis->group[0]->groupMembers[3]->student->email }}</p> --}}

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
                                            
                                            
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Proposal: </strong> <a href="{{ route('downloadProposal',$thesis->id) }}" class="btn btn-sm btn-primary">download</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <strong>Book: </strong> <a href="{{ route('downloadBook',$thesis->id) }}" class="btn btn-sm btn-primary">download</a>
                        </div>
                    </div><hr>
                    <a href="{{route('admin.index')}}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
