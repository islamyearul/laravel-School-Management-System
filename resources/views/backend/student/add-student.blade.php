@extends('backend/layouts/master')
@section('add-student')

    <!-- Main content -->
    <section class="content">
        <h1>Add Student</h1>
        <hr>
        <hr>
        @error('success')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <form action="{{ url('admin/student') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for=""> Name</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> Std ID</label>
                <input type="text" name="std_id" value="{{old('std_id')}}" class="form-control">
                @error('std_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Class Roll</label>
                <input type="number" name="class_roll" value="{{old('class_roll')}}" class="form-control">
                @error('class_roll')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> Father Name</label>
                <input type="text" name="f_name" value="{{old('f_name')}}" class="form-control">
                @error('f_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> Mother Name</label>
                <input type="text" name="m_name" value="{{old('m_name')}}" class="form-control">
                @error('m_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for=""> Class</label>
                <select name="class" class="form-control" id="" >
                    <option value="null" selected disabled>--Select One--</option>
                    @foreach ($Classs as $Class)
                        <option value="{{ $Class->class_name }}">{{ $Class->class_name }}</option>
                    @endforeach
                </select>
                @error('std_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> Shift</label>
                <select name="shift" class="form-control" id="">
                    <option value="null" selected disabled>--Select One--</option>
                    @foreach ($Shifts as $Shift)
                        <option value="{{ $Shift->shift_name }}">{{ $Shift->shift_name }}</option>
                    @endforeach
                </select>
                @error('shift')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> Session</label>
                <select name="session" class="form-control" id="">
                    <option value="null" selected disabled>--Select One--</option>
                    @foreach ($Sessions as $Session)
                        <option value="{{ $Session->edu_session }}">{{ $Session->edu_session }}</option>
                    @endforeach
                </select>
                @error('session')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> Group</label>
                <select name="group" class="form-control" id="">
                    <option value="null" selected disabled>--Select One--</option>
                    @foreach ($Groups as $Group)
                        <option value="{{ $Group->group_name }}">{{ $Group->group_name }}</option>
                    @endforeach
                </select>
                @error('group')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> Mobile</label>
                <input type="number" name="mobile" value="{{old('mobile')}}" class="form-control">
                @error('mobile')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> Phone</label>
                <input type="number" name="phone" value="{{old('phone')}}" class="form-control">
                @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> Birthday</label>
                <input type="date" name="b_date" class="form-control" value="{{old('b_date')}}">
                @error('b_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> Gender</label>

                <div class="form-control">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="male">
                        <label class="form-check-label" for="exampleRadios1">
                            Male
                        </label>

                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios" value="female">
                        <label class="form-check-label" for="exampleRadios">
                            Male
                        </label>
                    </div>
                </div>
                @error('gender')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> Present Address</label><br>
                <textarea name="p_address" id="" cols="50" rows="3">{{old('p_address')}}</textarea>
                @error('p_address')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> Permanent Address</label><br>
                <textarea name="per_address" id="" cols="50" rows="3">{{old('per_address')}}</textarea>
                @error('p_address')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> Photo</label>
                <input type="file" name="photo">
            </div>
            <div class="form-group">
                <input type="submit" value="Add" class=" btn btn-primary btn-block">
            </div>

        </form>


        </div>
    </section>

@endsection
