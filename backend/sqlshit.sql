Courses data
    table name: courses
        id (bigint) primary key
        course_code (varchar 20) unique     {BSCS}
        course_name (varchar 150)           {Bachelor of Science in Computer Science}
        college (varchar 100)               {CAS}
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





Subjects
    table name: subject_schedules
        id (bigint) primary key
        section_id (bigint) (relation) section_id -> subject_sections.id        {all subject w sections and details}
        day_of_week (enum: 'M','T','W','TH','F','S')                            {M,T,W}
        start_time (time)                                                       {09:00}
        end_time (time)                                                         {10:30}
        room (varchar 100)                                                      {CAS 104}
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
