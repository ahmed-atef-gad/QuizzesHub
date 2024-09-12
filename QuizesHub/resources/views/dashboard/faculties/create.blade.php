@extends('dashboard.layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if (Session::has('msg'))
                        <alert class="alert alert-success">
                            {{ Session::get('msg') }}
                        </alert>
                    @endif


                    <form class="form-horizontal" action="{{ route('admin.faculties.store') }}" enctype="multipart/form-data"
                        method="post">
                        @csrf

                        <div class="card-body card-block">



                            <div class="form-group">
                                <label class=" form-control-label" for="name">Faculty Name</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                    <input type="text" id="name" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Faculty Name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <label class=" form-control-label" for="university_id">University Name</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-bank"></i></div>
                                    @php
                                        $universityId = request('university_id');
                                    @endphp
                                    <select class="form-control @error('university_id') is-invalid @enderror" name="university_id"
                                        id="university_id" >
                                        @foreach ($universities as $university)
                                            <option value="{{ $university->id }}" @selected($universityId == $university->id)>{{ $university->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('university_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-sm" id="submit" >
                                <i class="fa fa-dot-circle-o"></i> Add Faculty
                            </button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
