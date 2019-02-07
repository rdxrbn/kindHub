
<div class="modal modalD-{{$student->id}} modalNormal" id="modalD-{{$student->id}}">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <div class="modal-card-title">Delete Student ID {{$student->id}}</div>
            <a class="delete" aria-label="close"></a>
        </header>
        <section class="modal-card-body">
            <h4>You are about to Delete {{$student->student_firstname}}</h4>
        </section>

        <div class="modal-card-foot">
            <a  data-id="{{$student->id}}" class="button is-danger is-right" id="delete-{{$student->id}}">
                <i class="fa fa-trash-alt"></i> &nbsp;Delete Anyway
            </a>
        </div>
    </div>
</div>
