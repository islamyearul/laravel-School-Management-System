@extends('backend/layouts/master')
@section('edit-holidays')
 <!-- Main content -->
 <section class="content">
    <h1>Edit Shift</h1>
    <hr>
    <hr>
    @error('success')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <form action="{{ url('admin/holidays/'. $EditholidaysData->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Holidays Name</label>
            <input type="text" class="form-control" value="{{ $EditholidaysData->name }}" name="name" placeholder="Enter ...">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" id="" cols="30" rows="5" placeholder="Enter ...">{{ $EditholidaysData->description }}</textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label>Date</label>
            <input type="date" value="{{ $EditholidaysData->date}}" class="form-control" name="date" placeholder="Enter ...">
            @error('date')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <input type="submit" value="Update" class=" btn btn-primary btn-block">
        </div>
    </form>
    </div>
</section>

    
@endsection