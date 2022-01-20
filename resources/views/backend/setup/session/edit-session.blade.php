@extends('backend/layouts/master')
@section('edit-year')
 <!-- Main content -->
 <section class="content">
    <h1>Edit Session</h1>
    <hr>
    <hr>
    @error('year')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <form action="{{ url('admin/session/'. $EditsessionData->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for=""> Session</label>
            <input type="text" name="edu_session" value="{{ $EditsessionData->edu_session }}" class="form-control">
            @error('edu_session')
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