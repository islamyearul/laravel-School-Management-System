@extends('backend/layouts/master')
@section('edit-shift')
 <!-- Main content -->
 <section class="content">
    <h1>Edit Fees Category</h1>
    <hr>
    <hr>
    @error('success')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <form action="{{ url('admin/feescategory/'. $EditFeesCattData->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for=""> Shift Name</label>
            <input type="text" name="fees_cat_name" value="{{ $EditFeesCattData->fees_cat_name }}" class="form-control">
            @error('fees_cat_name')
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