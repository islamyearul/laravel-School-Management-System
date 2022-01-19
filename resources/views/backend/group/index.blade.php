@extends('backend/layouts/master')
@section('group')


    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-12">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">All Group</h4>
                        @if (Auth::user()->role == 'administrator')
                            <a href="{{ url('admin/group/create') }}" class="btn btn-info float-right">Add Group</a>
                        @endif
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            @if (session('success'))
                                <h3 class="alert alert-success">{{ session('success') }}</h3>
                            @endif
                            <table id="complex_header" class="text-white table table-bordered display" style="width:100%">
                                <thead>

                                    <tr>
                                        <th>SL </th>
                                        <th>Group Id</th>
                                        <th>Gropue Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($GroupsData as $GroupData)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $GroupData->id }}</td>
                                            <td>{{ $GroupData->group_name }}</td>

                                            <td>
                                                <a href="{{ URL::to('admin/group/' . $GroupData->id . '/edit') }}"
                                                    class="btn btn-primary">Edit
                                                </a>
                                                <a href="">
                                                    <form action="{{ URL::to('admin/group/' . $GroupData->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" onclick="return confirm('Are You Sure?')"
                                                            class="btn btn-danger" value="DELETE">
                                                    </form>
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>SL </th>
                                        <th>Group Id</th>
                                        <th>Gropue Name</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

@endsection
