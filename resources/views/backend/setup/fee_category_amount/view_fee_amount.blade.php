@extends('backend/layouts/master')
@section('title')
Fee Amount
@endsection
@section('content')
      <!-- Main content -->
      <section class="content">
        <div class="row">
            @if (session('success'))
            <h3 class="alert alert-success">{{ session('success') }}</h3>
        @endif
            <div class="col-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Fees Category Amount</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Fees Cat Name</th>
                                        <th>Class</th>
                                        <th>Amount</th>
                                        <th>Edit</th>
                                        <th>Delete</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($fee_category_amounts as $FeesCatdata)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $FeesCatdata->fees_cat_name }}</td>                                   
                                            <td>

                                                <a href="{{ URL::to('admin/feescategory/'.$FeesCatdata->id.'/edit') }}">Edit</a> 


                                            </td>
                                            <td>
                                                <form action="{{ URL::to('admin/feescategory/' . $FeesCatdata->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" onclick="return confirm('Are You Sure?')"
                                                        class="btn btn-danger" value="DELETE">
                                                </form>
                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>

            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Add Fees Category Amount</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="post" action="{{ route('feescategoryamount.store') }}">
                            @csrf
                            <!-- text input -->
                            <div class="form-group">
                                <label>Category Name</label>
                                <select name="fee_category_id" id="" class="form-control">
                                    <option value="#">--Select Fees Category--</option>
                                    @foreach ($FeesCatdatas as $item)                                   
                                    <option value="{{ $item->id }}">{{ $item->fees_cat_name }}</option>
                                    @endforeach
                                </select>                              
                                @error('fee_category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Class Name</label>
                                <select name="class_id" id="" class="form-control">
                                    <option value="#">--Select Class--</option>
                                    @foreach ($StudentClasss as $item)                                   
                                    <option value="{{ $item->id }}">{{ $item->class_name }}</option>
                                    @endforeach
                                </select>                              
                                @error('class_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Fees Amount</label><br>
                                <input type="number" name="amount" class="form-controll">
                                                         
                                @error('amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">

                                <input type="submit" class="btn btn-success" value='Add Category Fees'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection