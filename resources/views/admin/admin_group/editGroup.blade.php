@extends('layouts.admin_layout')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 m-auto">
                <h2>Edit Group</h2>
                <div class="card  mb-4">
                    <div class="card-header bg-primary text-white">
                        <i class="fa-solid fa-users-viewfinder"></i>
                        Group Details
                    </div>
                    <div class="card-body table-responsive">
                        <form action="{{ route('admin.updateGroup',$groupId) }}" method="POST">
                            @csrf
                            <div class="mt-2 mt-2">
                                <label for="thesis_id"><strong>Thesis Id</strong></label>
                                <select name="thesis_id" id="thesis_id" class="form-select">
                                    <option value="{{ $thesisId }}">{{ $thesisId }}</option>
                                    @foreach ($thesises as $thesis)
                                        <option value="{{ $thesis->id }}">{{ $thesis->id }}</option>
                                    @endforeach
                                </select>
                                @error('thesis_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-2 mt-2">
                                <label for="thesis_id"><strong>Supervisor Id</strong> </label>
                                <select name="supervisor_id" id="supervisor_id" class="form-select">
                                    <option value="{{ $supervisorId }}">{{ $supervisorId }}</option>
                                    @foreach ($supervisors as $supervisor)
                                        <option value="{{ $supervisor->id }}">
                                            {{ 'ID: "' . $supervisor->id . '" Name: "' . $supervisor->first_name . '"' }}</option>
                                    @endforeach
                                </select>
                                @error('supervisor_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- students input --}}
                            <div class="mt-2 mt-2">
                                <span class="" style="font-size:25px"><strong>Select Gorup student</strong></span>
                                <span class="text-danger"><small> group should have at least one student</small></span>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mt-2 mt-2">
                                                    <label for="first_student_id"><small><strong> First student Id</strong></small></label>
                                                    <select name="first_student_id" id="first_student_id" class="form-select">
                                                        <option value="{{ $firstStudentId }}">{{ $firstStudentId }}</option>
                                                        @foreach ($students as $student)
                                                            <option value="{{ $student->id }}">
                                                                {{ 'ID: "' . $student->id . '" Name: "' . $student->first_name . '"' }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('first_student_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mt-2 mt-2">
                                                    <label for="second_student_id"><small><strong> Second student Id</strong></small></label>
                                                    <select name="second_student_id" id="second_student_id" class="form-select">
                                                        <option value="{{ $secondStudentId }}">{{ $secondStudentId }}</option>
                                                        @foreach ($students as $student)
                                                            <option value="{{ $student->id }}">
                                                                {{ 'ID: "' . $student->id . '" Name: "' . $student->first_name . '"' }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('second_student_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="mt-2 mt-2">
                                                <label for="third_student_id"><small><strong> Third student Id</strong></small></label>
                                                <select name="third_student_id" id="third_student_id" class="form-select">
                                                    <option value="{{ $thirdStudentId }}">{{ $thirdStudentId }}</option>
                                                    @foreach ($students as $student)
                                                        <option value="{{ $student->id }}">
                                                            {{ 'ID: "' . $student->id . '" Name: "' . $student->first_name . '"' }}</option>
                                                    @endforeach
                                                </select>
                                                @error('third_student_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="mt-2 mt-2">
                                                <label for="fourth_student_id"><small><strong>Fourth student Id</strong></small></label>
                                                <select name="fourth_student_id" id="fourth_student_id" class="form-select">
                                                    <option value="{{ $fourthStudentId }}">{{ $fourthStudentId }}</option>
                                                    @foreach ($students as $student)
                                                        <option value="{{ $student->id }}">
                                                            {{ 'ID: "' . $student->id . '" Name: "' . $student->first_name . '"' }}</option>
                                                    @endforeach
                                                </select>
                                                @error('fourth_student_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-danger" id='alert-div'></div>
                            </div>
                            <div class="mt-2 mt-2">
                                {{-- <br> --}}
                                <input type="submit" class="btn btn-primary" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection