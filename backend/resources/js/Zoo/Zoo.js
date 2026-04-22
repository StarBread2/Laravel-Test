document.addEventListener('DOMContentLoaded', () => 
{

    //#region CREATE
        const form = document.getElementById('zooForm');

        if (form) {
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
        }
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
        //#region Modal Open and Close
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
        //#endregion

        //#region EDIT
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
    //#endregion
});