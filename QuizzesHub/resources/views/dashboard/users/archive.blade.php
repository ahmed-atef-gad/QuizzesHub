@extends('dashboard.layout.master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('dashboard/assets') }}/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet"
        href="{{ asset('dashboard/assets') }}/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('dashboard/assets') }}/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
@endsection

@section('content')

    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    @if (Session::has('msg'))
                        <alert class="alert alert-success">
                            {{ Session::get('msg') }}
                        </alert>
                    @endif
                    <div class="card-header">
                        <strong class="card-title">Faculties Table</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th >fname</th>
                                    <th>lname</th>
                                    <th>email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $user)
                                    <tr>

                                        <td>{{ $user->fname}}</td>
                                        <td>{{ $user->lname}}</td>
                                        <td>{{ $user->email}}</td>
                                        <<td>
                                            <form method="POST" action="{{ route('admin.users.restore', $user->id) }}"
                                                style="display:inline">
                                                @csrf

                                                <input type="submit" id="restore" class="btn btn-success"
                                                   value="Restore">

                                            </form>
                                            <form method="POST"
                                                action="{{ route('admin.users.forceDelete', $user->id) }}"
                                                style="display:inline">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" id="delete" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure?')" value="Delete">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->


@endsection

@section('scripts')
    <!-- Make sure jQuery is loaded first -->
    <script src="{{ asset('dashboard/assets/vendors/jquery/jquery.min.js') }}"></script>

    <!-- DataTables JS -->
    <script src="{{ asset('dashboard/assets/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>

    <!-- Additional JS for DataTables functionality -->
    <script src="{{ asset('dashboard/assets/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendors/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- DataTables Initialization Script -->
    <script src="{{ asset('dashboard/assets/js/init-scripts/data-table/datatables-init.js') }}"></script>
@endsection
