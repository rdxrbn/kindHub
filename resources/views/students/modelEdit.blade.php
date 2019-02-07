<div class="modal modalE-{{$student->id}} modalEdit" id="modalE-{{$student->id}}">

    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <div class="modal-card-title">Edit Student {{$student->id}}</div>
            <a class="delete" aria-label="close"></a>
        </header>
        <section class="modal-card-body">

            <div class="columns">
                <div class="column is-6">
                    <div class="field">
                        <label class="label">Class Room</label>
                        <div class="control">
                            <input id="class_room-{{$student->id}}" class="input {{ $errors->has('class_room') ? ' is-danger' : '' }}" type="text" name="class_room" value="{{$student->class_room}}">
                        </div>
                    </div>
                </div>
                <div class="column is-6">
                    <div class="field">
                        <label class="label">Teachers Name</label>
                        <div class="control">
                            <input id="teachers_name-{{$student->id}}" class="input {{ $errors->has('teachers_name') ? ' is-danger' : '' }}" type="text" name="teachers_name" value="{{$student->teachers_name}}">
                        </div>
                    </div>
                </div>

            </div>





            <div class="columns">

                <div class="column is-6">
                    <div class="field">
                        <label class="label">Student Firstname</label>
                        <div class="control">
                            <input id="student_firstname-{{$student->id}}" class="input {{ $errors->has('student_firstname') ? ' is-danger' : '' }}" type="text" name="student_firstname" value="{{$student->student_firstname}}">
                        </div>
                    </div>
                </div>

                <div class="column is-6">
                    <div class="field">
                        <label class="label">Student Lastname</label>
                        <div class="control">
                            <input id="student_lastname-{{$student->id}}" class="input {{ $errors->has('student_lastname') ? ' is-danger' : '' }}" type="text" name="student_lastname" value="{{$student->student_lastname}}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="columns">
                <div class="column is-6">
                    <div class="field">
                        <label class="label">Gender</label>
                        <div class="control">
                            <input id="gender-{{$student->id}}" class="input {{ $errors->has('gender') ? ' is-danger' : '' }}" type="text" name="gender" value="{{$student->gender}}">
                        </div>
                    </div>
                </div>
                <div class="column is-6">
                    <div class="field">
                        <label class="label">Joined Year</label>
                        <div class="control">
                            <input id="joined_year-{{$student->id}}" class="input {{ $errors->has('joined_year') ? ' is-danger' : '' }}" type="text" name="joined_year" value="{{$student->joined_year}}">
                        </div>
                    </div>
                </div>
            </div>



            <button type="button" id="updateOrderEdit-{{$student->id}}" data-id="{{$student->id}}" class="button is-success is-pulled-left"><i class="fas fa-pencil-alt"></i>&nbsp;Update Student</button>




        </section>
    </div>
</div>

<script>


    $(function(){
        $('#updateOrderEdit-{{$student->id}}').click(function(){
            var id = $(this).attr('data-id');
            var class_room = $('#class_room-{{$student->id}}').val();
            var teachers_name = $('#teachers_name-{{$student->id}}').val();
            var student_firstname = $('#student_firstname-{{$student->id}}').val();
            var student_lastname = $('#student_lastname-{{$student->id}}').val();
            var gender = $('#gender-{{$student->id}}').val();
            var joined_year = $('#joined_year-{{$student->id}}').val();
            var route = '{{ URL('home/edit/singleOrder') }}';
            var data = {
                id: id, class_room: class_room,teachers_name:teachers_name,student_firstname:student_firstname,student_lastname:student_lastname,gender:gender,joined_year:joined_year
            }
            var request = $.post(route, data);
            $(this).html('processing...');

            request.done(function(response){
                $(this).html('Activated');
                if(response.success == 'true')

                    window.location.href = ('/home');

            });
            request.always(function(response){
                $(this).html('Activated');
            });
        });

    });

</script>
