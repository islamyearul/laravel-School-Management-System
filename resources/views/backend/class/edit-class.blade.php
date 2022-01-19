@extends('backend/layouts/master')
@section('edit-class')
 <!-- Main content -->
 <section class="content">
    <h1>Edit Group</h1>
    <hr>
    <hr>
    @error('class_name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <form action="{{ url('admin/class/'. $EditClassData->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for=""> Name</label>
            <input type="text" name="class_name" value="{{ $EditClassData->class_name }}" class="form-control">
            @error('class_name')
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