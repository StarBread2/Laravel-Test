Courses data
    table name: colleges
        id (bigint) primary key  
        college_code (varchar 20) unique                {CAS}  
        college_name (varchar 150)                      {College of Arts and Sciences}  
        created_at (timestamp)  
        updated_at (timestamp)  
    table name: courses
        id (bigint) primary key
        college_id (bigint) foreign key → colleges.id 
        course_code (varchar 150)                      {BSCS}  
        course_name (varchar 150)                      {Bachelor of Science in Computer Science}  
        created_at (timestamp)
        updated_at (timestamp)




Student data
    table name: students       
        id (auto increment)            
        student_number  (bigint) primary key unique                  {202303537}
        first_name (varchar 100)
        middle_name (varchar 100) nullable
        last_name (varchar 100)
        suffix_name (varchar 50) nullable
        gender (enum: 'M','F')
        birth_date (date)
        email (varchar 150) unique
        contact_number (varchar 20)
        course_id (bigint) (relation) course_id -> courses.id
        created_at (timestamp)
        updated_at (timestamp)





For documentation (Subjects and enrolled students)
    table name: school_years
        id (bigint) primary key
        school_year (varchar 20)                    {2025-2026}
        semester (enum: 'first','second','summer')  {first}
        is_active (boolean)                         {0}
        created_at (timestamp)





Rooms
    table name: buildings
        id (bigint) primary key auto_increment
        building_code (varchar 20) unique      {CAS}
        building_name (varchar 150)            {CAS Building}
        created_at (timestamp)
        updated_at (timestamp)
    table name: rooms
        id (bigint) primary key auto_increment
        building_id (bigint) foreign key → buildings.id
        room_number (varchar 20)          {104}
        room_type (enum: 'lecture','lab','auditorium','office') default 'lecture'
        capacity (int)                    {40}
        created_at (timestamp)
        updated_at (timestamp)





Subjects
    table name: subject_schedules
        id (bigint) primary key
        section_id (bigint) (relation) section_id -> subject_sections.id        {all subject w sections and details}
        day_of_week (enum: 'M','T','W','TH','F','S')                            {M,T,W}
        start_time (time)                                                       {09:00}
        end_time (time)                                                         {10:30}
        room_id (bigint) room_id → rooms.id                                     {rooms}
        created_at (timestamp)

    table name: subject_sections
        id (bigint) primary key                             
        subject_id (bigint) (relation) subject_id -> subjects.id                {id = CSC 305}  
        section_code (varchar 20)                                               {B, C, A, F}
        school_year_id (bigint) (relation) school_year_id -> school_years.id    {2025-2026, first "semester"}
        year_level (tinyint)                                                    {3} (year level)
        capacity (int)                                                          {40}
        created_at (timestamp)

    table name: subjects
        id (bigint) primary key                     
        subject_code (varchar 20) unique            {CSC 305}
        description (varchar 255)                   {Application Development & Emerging Technologies}
        units (decimal 4,1)                         {3}
        created_at (timestamp)
        updated_at (timestamp)





Evaluation
    Check if student if enrolled data
        table name: enrollments
            id (bigint) primary key
            student_id (bigint) (relation) student_id -> students.id                {students data}
            school_year_id (bigint) (relation) school_year_id -> school_years.id    {date and semester}
            year_level (tinyint)                                                    {3}
            status (enum: 'enrolled','completed','dropped')                         {dropped}
            gpa (decimal 3,2) nullable                                              {1.1}
            total_units (int)
            created_at (timestamp)
            updated_at (timestamp)


    Enrolled subject of student
        table name: enrollment_subjects
            id (bigint) primary key                                                 
            enrollment_id (bigint) (relation) enrollment_id -> enrollments.id       {students data, date and semester, and status (if dropped)}
            section_id (bigint) (relation) section_id -> subject_sections.id        {subject section data capacity or soemthing}
            final_grade (decimal 5,2) nullable                                      {89}
            equivalent_grade (decimal 3,2) nullable                                 {1.1}
            reexam_grade (decimal 5,2) nullable                                     {null}
            remarks (enum: 'passed','failed','incomplete','ongoing')                {passed}
            created_at (timestamp)


Teachers
    table name: teachers
        id (bigint) primary key auto_increment
        employee_number (varchar 30) unique
        first_name (varchar 100)
        middle_name (varchar 100) nullable
        last_name (varchar 100)
        suffix_name (varchar 50) nullable
        email (varchar 150) unique
        contact_number (varchar 20)
        employment_status (enum: 'full-time','part-time','contractual')
        college_id (bigint) foreign key -> colleges.id
        created_at (timestamp)
        updated_at (timestamp)
    
    table name: teacher_assignments
        id (bigint) primary key auto_increment
        teacher_id (bigint) foreign key -> teachers.id
        section_id (bigint) foreign key -> subject_sections.id
        role (enum: 'lecturer','lab','assistant','co-instructor')
        assigned_at (timestamp)

    