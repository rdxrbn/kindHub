<div class="modal modal-{{$student->id}} modalNormal" id="modal-{{$student->id}}">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <div class="modal-card-title">View Student ID {{$student->id}}</div>
            <a class="delete" aria-label="close"></a>
        </header>
        <section class="modal-card-body">
            <table class="table is-striped is-fullwidth">
                <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{$student->id}}</td>
                </tr>
                <tr>
                    <th>Class Room</th>
                    <td>{{$student->class_room}}</td>
                </tr>
                <tr>
                    <th>Student Firstname</th>
                    <td>{{$student->student_firstname}}</td>
                </tr>
                <tr>
                    <th>Student Lastname</th>
                    <td>{{$student->student_lastname}}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>{{$student->gender}}</td>
                </tr>
                <tr>
                    <th>Joined Year</th>
                    <td>{{$student->joined_year}}</td>
                </tr>

                <tr>
                    <th>Created at</th>
                    <td>{{Carbon\Carbon::parse($student->created_at)->diffForHumans()}}</td>
                </tr>

                </tbody>
            </table>
        </section>
    </div>
</div>
