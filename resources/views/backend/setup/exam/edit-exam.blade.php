@extends('backend/layouts/master')
@section('edit-exam')
 <!-- Main content -->
 <section class="content">
    <h1>Edit Exam</h1>
    <hr>
    <hr>
    @error('success')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <form action="{{ url('admin/exam/'. $EditExamData->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Exam Name</label>
            <input type="text" class="form-control" value="{{ $EditExamData->exam_name }}" name="exam_name" placeholder="Enter ...">
            @error('exam_name')
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