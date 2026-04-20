document.addEventListener('DOMContentLoaded', () => {
    //#region CREATE STUDENTS 
        const form = document.getElementById('studentForm');

        if (!form) return;

        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            const formData = new FormData(form);

            try {
                const res = await fetch('/api/students', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                    },
                    body: formData
                });

                const data = await res.json();

                if (!res.ok) {
                    console.error(data);
                    alert('Validation failed');
                    return;
                }

                alert('Student created successfully');
                window.location.reload();

            } catch (err) {
                console.error(err);
                alert('Something went wrong');
            }
        });
    //#endregion

    //#region DELETE STUDENT 
        document.addEventListener('click', async (e) => {
            if (!e.target.classList.contains('delete-btn')) return;

            const row = e.target.closest('tr');
            const id = row.dataset.id;

            if (!confirm('Delete this student?')) return;

            try {
                const res = await fetch(`/api/students/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Accept': 'application/json',
                    }
                });

                const data = await res.json();

                if (!res.ok) {
                    alert(data.message || 'Delete failed');
                    return;
                }

                // remove row instantly (no reload)
                row.remove();

                alert('Student deleted successfully');

            } catch (err) {
                console.error(err);
                alert('Something went wrong');
            }
        });
    //#endregion

    //#region EDIT STUDENT
        //#region MODAL OPENING AND CLOSING MODAL
            const modal = document.getElementById('editModal');
            const closeBtn = document.getElementById('closeModal');

            // OPEN MODAL (EDIT CLICK)
            document.addEventListener('click', async (e) => {
                if (!e.target.classList.contains('edit-btn')) return;

                const id = e.target.dataset.id;

                try {
                    const res = await fetch(`/api/students/${id}`);
                    const data = await res.json();

                    const student = data.data;

                    // fill fields
                    document.getElementById('edit_id').value = student.id;
                    document.getElementById('edit_first_name').value = student.first_name || '';
                    document.getElementById('edit_middle_name').value = student.middle_name || '';
                    document.getElementById('edit_last_name').value = student.last_name || '';
                    document.getElementById('edit_suffix_name').value = student.suffix_name || '';
                    document.getElementById('edit_gender').value = student.gender;
                    document.getElementById('edit_birth_date').value = student.birth_date;
                    document.getElementById('edit_email').value = student.email;
                    document.getElementById('edit_contact_number').value = student.contact_number;
                    document.getElementById('edit_course_id').value = student.course_id;

                    // show modal
                    modal.classList.remove('hidden');

                } catch (err) {
                    console.error(err);
                    alert('Failed to load student data');
                }
            });

            // CLOSE MODAL (BUTTON)
            closeBtn.addEventListener('click', () => {
                modal.classList.add('hidden');
            });

            // CLOSE MODAL (OUTSIDE CLICK)
            modal.addEventListener('click', (e) => {
                // if click is on backdrop, not inside modal box
                if (e.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        //#endregion
        
        //#region EDIT AJAX
            document.getElementById('editForm').addEventListener('submit', async function (e) {
                e.preventDefault();

                const id = document.getElementById('edit_id').value;

                const formData = new FormData(this);

                const data = Object.fromEntries(formData.entries());

                const res = await fetch(`/api/students/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(data)
                });

                const json = await res.json();

                if (!res.ok) {
                    alert('Update failed');
                    console.log(json);
                    return;
                }

                alert('Student updated successfully');

                window.location.reload();
            });
        //#endregion
    //#endregion

});