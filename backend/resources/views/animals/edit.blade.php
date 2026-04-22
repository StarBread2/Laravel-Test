@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Zoo List</h1>

<table class="w-full text-sm text-left">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-3">Name</th>
            <th class="p-3">Species</th>
            <th class="p-3">Age</th>
            <th class="p-3">Habitat</th>
            <th class="p-3">Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($zoos as $zoo)
            <tr data-id="{{ $zoo->id }}">
                <td class="p-3">{{ $zoo->name }}</td>
                <td class="p-3">{{ $zoo->species }}</td>
                <td class="p-3">{{ $zoo->age }}</td>
                <td class="p-3">{{ $zoo->habitat }}</td>

                <td class="p-3 flex gap-2">
                    <button class="edit-btn bg-blue-500 text-white px-2 py-1 rounded"
                        data-id="{{ $zoo->id }}">Edit</button>

                    <button class="delete-btn bg-red-500 text-white px-2 py-1 rounded">
                        Delete
                    </button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center p-4">No data</td>
            </tr>
        @endforelse
    </tbody>
</table>

<!-- EDIT MODAL -->
<div id="editModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center">
    <div class="bg-white p-6 rounded w-[400px]">

        <h2 class="text-xl font-bold mb-4">Edit Animal</h2>

        <form id="editForm">
            <input type="hidden" id="edit_id">

            <input id="edit_name" class="border p-2 w-full mb-2" placeholder="Name">
            <input id="edit_species" class="border p-2 w-full mb-2" placeholder="Species">
            <input id="edit_age" type="number" class="border p-2 w-full mb-2" placeholder="Age">
            <input id="edit_habitat" class="border p-2 w-full mb-2" placeholder="Habitat">

            <div class="flex justify-end gap-2 mt-4">
                <button type="button" id="closeModal" class="bg-gray-400 px-3 py-1 text-white rounded">
                    Cancel
                </button>

                <button class="bg-green-600 px-3 py-1 text-white rounded">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
@endsection