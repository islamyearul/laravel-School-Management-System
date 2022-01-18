@extends('backend/layouts/master')
@section('edit-group')


    <!-- Main content -->
    <section class="content">
        <h1>Edit Group</h1>
        <hr>
        <hr>
        @error('group_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <form action="{{ url('admin/group/'.$EditGroupData->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for=""> Name</label>
                <input type="text" name="group_name" value="{{$EditGroupData->group_name}}" class="form-control">
                @error('group_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>            
            <div class="form-group">
                <input type="submit" value="Update" class=" btn btn-primary btn-block">
            </div>

        </form>


        </div>
    </section>

@endsection
