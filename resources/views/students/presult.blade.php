
<small >Total Students <span style="margin-bottom: 10px;" class="tag is-light"><b>{{$students->total()}}</b></span> </small>
<div  style="margin-bottom: 15px;">
    {{ $students->appends($_GET)->links() }}
</div>

<div id="general-content" style="position: relative;">
    <table class="table  is-fullwidth" style="font-size: 14px;">
        <thead>
        <tr>
            <th>ID</th>
            <th>Class Room</th>
            <th>Teachers Name</th>
            <th>Student Firstname</th>
            <th>Student Lastname</th>
            <th>Gender</th>
            <th>Joined Year</th>
            <th>#</th>
        </tr>
        </thead>
        <tbody>

        @foreach($students as $student)


            <tr>
                <td>{{$student->id}}</td>
                <td>{{$student->class_room}}</td>
                <td>{{$student->teachers_name}}</td>
                <td>{{$student->student_firstname}}</td>
                <td>{{$student->student_lastname}}</td>
                <td>{{$student->gender}}</td>
                <td>{{$student->joined_year}}</td>


                <td style="text-align: center;">


                            <a style="color: #4e4e4e;margin-right: 8px;font-size: 16px;" data-target="#modalE-{{$student->id}}" id="modalE-{{$student->id}}" class="modal-button modalBtnE-{{$student->id}} " >
                                <i class="fa fa-pencil-alt"></i>
                            </a>

                    @include('students.modelEdit')

                    <a style="color: #ff892d;margin-right: 8px;" data-target="#modal-{{$student->id}}" id="modal-{{$student->id}}" class="modal-button modalBtn-{{$student->id}} " >
                        <i class="fa fa-expand"></i>
                    </a>
                    @include('students.model')

                    <a style="color: #ea8a8a;margin-right: 8px;" data-target="#modalD-{{$student->id}}" id="modalD-{{$student->id}}" class="modal-button modalBtnD-{{$student->id}}" >
                        <i class="fa fa-trash-alt"></i>
                    </a>
                    @include('students.modelDel')


                </td>
            </tr>

            <script>
                $(".modalBtn-{{$student->id}}").click(function() {
                    $(".modal-{{$student->id}}").addClass("is-active");
                    $(".mainBlock").addClass("is-blurred");
                });

                $(".modalBtnE-{{$student->id}}").click(function() {
                    $(".modalE-{{$student->id}}").addClass("is-active");
                    $(".mainBlock").addClass("is-blurred");
                });

                $(".modalBtnD-{{$student->id}}").click(function() {
                    $(".modalD-{{$student->id}}").addClass("is-active");
                    $(".mainBlock").addClass("is-blurred");
                });

                $(".delete").click(function() {
                    $(".modal-{{$student->id}}").removeClass("is-active");
                    $(".modalE-{{$student->id}}").removeClass("is-active");
                    $(".modalD-{{$student->id}}").removeClass("is-active");
                    $(".mainBlock").removeClass("is-blurred");
                });
            </script>

            <script>


                $(function(){


                    // Delete function
                    $('#delete-{{$student->id}}').click(function(){
                        var id = $(this).attr('data-id');
                        var route = '{{ URL('home/delete-order') }}';
                        var data = {
                            id: id, deleted: 1
                        }
                        var request = $.post(route, data);
                        $(this).html('<i class="fa fa-spinner fa-spin fa-fw"></i> Deleting..');

                        request.done(function(response){
                            if(response.success == 'true')
                                window.location.href = ('/home');

                        });
                        request.always(function(response){
                            $(this).html('Activated');
                        });
                    });

                });


            </script>


        @endforeach



        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).ready(function() {
                $('#general i .counter').text(' ');

                var fnUpdateCount = function() {
                    var generallen = $("#general-content input[name='chk[]']:checked").length;
                    console.log(generallen,$("#general .counter") )
                    if (generallen > 0) {
                        $("#general .counter").html('&nbsp;(' + generallen +')');
                    } else {
                        $("#general .counter").text('');
                    }
                };

                $("#general-content input:checkbox").on("change", function() {
                    fnUpdateCount();
                });

                $(".checkAll").click(function(){
                    $('input:checkbox').not(this).prop('checked', this.checked);
                });

            });
        </script>
        </tbody>
    </table>
</div>
{{ $students->appends($_GET)->links() }}

