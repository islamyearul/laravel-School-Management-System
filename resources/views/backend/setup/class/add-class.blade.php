@extends('backend/layouts/master')
@section('add-class')

    <!-- Main content -->
    <section class="content">
        <h1>Add Group</h1>
        <hr>
        <hr>
        @error('class_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <form action="{{ url('admin/class') }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for=""> Name</label>
                <input type="text" name="class_name" class="form-control">
                @error('class_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="submit" value="Add" class=" btn btn-primary btn-block">
            </div>

        </form>


        </div>
    </section>

@endsection
