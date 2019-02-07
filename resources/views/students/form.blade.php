


<div class="columns">
    <div class="column is-6">
        <div class="field">
            <label class="label">Class Room</label>
            <div class="control">
                <div class="select">
                    <select name="class_room" id="class_room">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="column is-6">
        <div class="field">
            <label class="label">Teachers Name</label>
            <div class="control">
                <div class="select">
                    <select name="teachers_name" id="teachers_name">
                        <option value="Isabella">Isabella</option>
                        <option value="Emily">Emily</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="columns">
    <div class="column is-6">
        <div class="field">
            <label class="label">Student Firstname</label>
            <div class="control">
                <input class="input {{ $errors->has('student_firstname') ? ' is-danger' : '' }}" type="text" name="student_firstname" placeholder="Student Firstname">
            </div>
        </div>
    </div>
    <div class="column is-6">
        <div class="field">
            <label class="label">Student Lastname</label>
            <div class="control">
                <input class="input {{ $errors->has('student_lastname') ? ' is-danger' : '' }}" type="text" name="student_lastname" placeholder="Student Lastname">
            </div>
        </div>
    </div>
</div>


<div class="columns">
    <div class="column is-6">
        <div class="field">
            <label class="label">Gender</label>
            <div class="control">
                <div class="select">
                    <select name="gender" id="gender">
                        <option value="F">Female</option>
                        <option value="M">Male</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="column is-6">
        <div class="field">
            <label class="label">Joined Year</label>
            <div class="control">
                <input class="input {{ $errors->has('joined_year') ? ' is-danger' : '' }}" type="text" name="joined_year" placeholder="Joined Year">
            </div>
        </div>
    </div>
</div>

