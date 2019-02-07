@extends('layouts.app')

@section('content')
    <div class="block content-area orders-table">
        <div class="columns">
            <div class="column is-6">
                <a href="{{url('/home')}}">
                    <button class="button is-light "><i class="fas fa-angle-left"></i>&nbsp;Back</button>
                </a>
            </div>
            <div class="column is-6">
                <h1 class="is-pulled-right"><i class="fas fa-plus"></i>&nbsp;Add Students</h1>
            </div>
        </div>
    </div>

<div class="block content-area">

    <div class="columns">
        <div class="column is-5">
            <h2 class="panel-heading"><i class="fas fa-cubes"></i> Add Bulk Students</h2>
            <div class="bulk-upload">
               <div class="notification is-warning" data-bulma="notification">
                     <button class="delete" style="right: 6px;top: 7px;"></button>
                    @if(!$errors->isEmpty())
                    <b>{{ $errors->first('file') }}</b> <br>
                    @endif
                    Please Upload excel file or csv file <br>
                    allowed extensions (.xlsx, .xls, .csv )

                </div>

                <div class="notification " data-bulma="notification">
                    <b>Download</b> the sample .xlsx <i class="fa fa-file-excel green-color"></i>
                    <b><a download href="{{asset('csv/students_records.csv')}}">File here</a></b>
                </div>

                <form action="{{url('students/add') }}" method="POST" enctype="multipart/form-data">
                    @csrf


                    <div class="file has-name">
                        <label class="file-label">
                            <input class="file-input" type="file" name="file" id="file">
                        <span class="file-cta">
                              <span class="file-icon">
                                <i class="fa fa-upload"></i>
                              </span>
                              <span class="file-label">
                                Choose a file…
                              </span>
                        </span>

                        <span class="file-name" id="filename">
                         Choose File...
                        </span>
                            <script>
                                var file = document.getElementById("file");
                                file.onchange = function(){
                                    if(file.files.length > 0)
                                    {
                                        document.getElementById('filename').innerHTML = file.files[0].name;
                                    }
                                };
                            </script>
                        </label>
                    </div>
                    <div class="field excel-submit">
                        <button type="submit" id="bulkAdd" class="button is-success"><i class="fas fa-fire"></i>&nbsp; Process Students</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="column is-1">
            <div class="or-cont">
                <div class="or">Or</div>
            </div>
        </div>
        <div class="column is-6">
            <h2 class="panel-heading"><i class="fas fa-cube"></i> Add Student</h2>

            <form action="{{url('home/orders-quick') }}" method="POST" enctype="multipart/form-data">
            @csrf

                @include('students.form')
                <button type="submit" class="button is-success"><i class="fas fa-bolt"></i>&nbsp; Add Student</button>
            </form>
        </div>
    </div>
</div>
@endsection
