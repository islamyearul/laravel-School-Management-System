@extends('backend/layouts/master')
@section('edit-year')
 <!-- Main content -->
 <section class="content">
    <h1>Edit Year</h1>
    <hr>
    <hr>
    @error('year')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <form action="{{ url('admin/year/'. $EditYearData->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for=""> Name</label>
            <input type="text" name="year" value="{{ $EditYearData->year }}" class="form-control">
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