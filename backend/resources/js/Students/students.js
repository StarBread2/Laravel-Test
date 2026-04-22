// document.addEventListener('DOMContentLoaded', () => {
//     //#region CREATE STUDENTS 
//         const form = document.getElementById('studentForm');

//         if (!form) return;

//         form.addEventListener('submit', async (e) => {
//             e.preventDefault();

//             const formData = new FormData(form);

//             try {
//                 const res = await fetch('/api/students', {
//                     method: 'POST',
//                     headers: {
//                         'Accept': 'application/json',
//                     },
//                     body: formData
//                 });

//                 const data = await res.json();

//                 if (!res.ok) {
//                     console.error(data);
//                     alert('Validation failed');
//                     return;
//                 }

//                 alert('Student created successfully');
//                 window.location.reload();

//             } catch (err) {
//                 console.error(err);
//                 alert('Something went wrong');
//             }
//         });
//     //#endregion

//     //#region DELETE STUDENT 
//         document.addEventListener('click', async (e) => {
//             if (!e.target.classList.contains('delete-btn')) return;

//             const row = e.target.closest('tr');
//             const id = row.dataset.id;

//             if (!confirm('Delete this student?')) return;

//             try {
//                 const res = await fetch(`/api/students/${id}`, {
//                     method: 'DELETE',
//                     headers: {
//                         'Accept': 'application/json',
//                     }
//                 });

//                 const data = await res.json();

//                 if (!res.ok) {
//                     alert(data.message || 'Delete failed');
//                     return;
//                 }

//                 // remove row instantly (no reload)
//                 row.remove();

//                 alert('Student deleted successfully');

//             } catch (err) {
//                 console.error(err);
//                 alert('Something went wrong');
//             }
//         });
//     //#endregion

//     //#region EDIT STUDENT
//         //#region MODAL OPENING AND CLOSING MODAL
//             const modal = document.getElementById('editModal');
//             const closeBtn = document.getElementById('closeModal');

//             // OPEN MODAL (EDIT CLICK)
//             document.addEventListener('click', async (e) => {
//                 if (!e.target.classList.contains('edit-btn')) return;

//                 const id = e.target.dataset.id;

//                 try {
//                     const res = await fetch(`/api/students/${id}`);
//                     const data = await res.json();

//                     const student = data.data;

//                     // fill fields
//                     document.getElementById('edit_id').value = student.id;
//                     document.getElementById('edit_first_name').value = student.first_name || '';
//                     document.getElementById('edit_middle_name').value = student.middle_name || '';
//                     document.getElementById('edit_last_name').value = student.last_name || '';
//                     document.getElementById('edit_suffix_name').value = student.suffix_name || '';
//                     document.getElementById('edit_gender').value = student.gender;
//                     document.getElementById('edit_birth_date').value = student.birth_date;
//                     document.getElementById('edit_email').value = student.email;
//                     document.getElementById('edit_contact_number').value = student.contact_number;
//                     document.getElementById('edit_course_id').value = student.course_id;

//                     // show modal
//                     modal.classList.remove('hidden');

//                 } catch (err) {
//                     console.error(err);
//                     alert('Failed to load student data');
//                 }
//             });

//             // CLOSE MODAL (BUTTON)
//             closeBtn.addEventListener('click', () => {
//                 modal.classList.add('hidden');
//             });

//             // CLOSE MODAL (OUTSIDE CLICK)
//             modal.addEventListener('click', (e) => {
//                 // if click is on backdrop, not inside modal box
//                 if (e.target === modal) {
//                     modal.classList.add('hidden');
//                 }
//             });
//         //#endregion
        
//         //#region EDIT AJAX
//             document.getElementById('editForm').addEventListener('submit', async function (e) {
//                 e.preventDefault();

//                 const id = document.getElementById('edit_id').value;

//                 const formData = new FormData(this);

//                 const data = Object.fromEntries(formData.entries());

//                 const res = await fetch(`/api/students/${id}`, {
//                     method: 'PUT',
//                     headers: {
//                         'Content-Type': 'application/json',
//                         'Accept': 'application/json'
//                     },
//                     body: JSON.stringify(data)
//                 });

//                 const json = await res.json();

//                 if (!res.ok) {
//                     alert('Update failed');
//                     console.log(json);
//                     return;
//                 }

//                 alert('Student updated successfully');

//                 window.location.reload();
//             });
//         //#endregion
//     //#endregion

// });

document.addEventListener('DOMContentLoaded', () => {

    //#region CREATE
    const form = document.getElementById('zooForm');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(form);

        const res = await fetch('/api/zoos', {
            method: 'POST',
            headers: { 'Accept': 'application/json' },
            body: formData
        });

        if (!res.ok) return alert('Create failed');

        alert('Created successfully');
        location.reload();
    });
    //#endregion


    //#region DELETE
    document.addEventListener('click', async (e) => {
        if (!e.target.classList.contains('delete-btn')) return;

        const row = e.target.closest('tr');
        const id = row.dataset.id;

        if (!confirm('Delete this?')) return;

        const res = await fetch(`/api/zoos/${id}`, {
            method: 'DELETE',
            headers: { 'Accept': 'application/json' }
        });

        if (!res.ok) return alert('Delete failed');

        row.remove();
        alert('Deleted');
    });
    //#endregion


    //#region EDIT
    const modal = document.getElementById('editModal');

    document.addEventListener('click', async (e) => {
        if (!e.target.classList.contains('edit-btn')) return;

        const id = e.target.dataset.id;

        const res = await fetch(`/api/zoos/${id}`);
        const data = await res.json();

        document.getElementById('edit_id').value = data.id;
        document.getElementById('edit_name').value = data.name;
        document.getElementById('edit_species').value = data.species;
        document.getElementById('edit_age').value = data.age;
        document.getElementById('edit_habitat').value = data.habitat;

        modal.classList.remove('hidden');
    });

    document.getElementById('closeModal').onclick = () =>
        modal.classList.add('hidden');

    document.getElementById('editForm').addEventListener('submit', async (e) => {
        e.preventDefault();

        const id = document.getElementById('edit_id').value;

        const data = {
            name: edit_name.value,
            species: edit_species.value,
            age: edit_age.value,
            habitat: edit_habitat.value
        };

        const res = await fetch(`/api/zoos/${id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(data)
        });

        if (!res.ok) return alert('Update failed');

        alert('Updated');
        location.reload();
    });
    //#endregion
});