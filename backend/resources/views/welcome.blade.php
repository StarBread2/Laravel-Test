@extends('layouts.app')

@section('content')
    <div>
        <!-- CREATE USER -->
        {{-- <h1 class="text-2xl font-bold mb-4">Create Student</h1> --}}
        {{-- <div class="mb-20 w-full">
            <form id="studentForm" class="space-y-3">

                @csrf
                <div class="grid grid-cols-1 md:grid-cols-1 gap-3">
                    <input name="first_name" placeholder="First Name" class="input pb-2 border border-gray-300 rounded-lg p-2 ">
                    <input name="last_name" placeholder="Last Name" class="input pb-2 border border-gray-300 rounded-lg p-2 ">
                    <input name="middle_name" placeholder="Middle Name" class="input pb-2 border border-gray-300 rounded-lg p-2 ">
                    <input name="suffix_name" placeholder="Suffix" class="input pb-2 border border-gray-300 rounded-lg p-2 ">

                    <select name="gender" class="input pb-2 border border-gray-300 rounded-lg p-2 ">
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>

                    <input type="date" name="birth_date" class="input pb-2 border border-gray-300 rounded-lg p-2 ">
                    <input type="email" name="email" placeholder="Email" class="input pb-2 border border-gray-300 rounded-lg p-2 ">
                    <input type="text" name="contact_number" placeholder="Contact Number" class="input pb-2 border border-gray-300 rounded-lg p-2 ">
                    <select name="course_id" class="input border border-gray-300 rounded-lg p-2">
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}">
                                {{ $course->course_code }} - {{ $course->course_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-center mt-5">
                    <button class="mt-5 w-[40%] bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition font-semibold" type="submit" class="btn">
                        Create Student
                    </button>
                </div>
            </form>
        </div> --}}

        <h1 class="text-2xl font-bold mb-4">Create Animal</h1>

        <div class="mb-20 w-full">
            <form id="zooForm" class="space-y-3">
                @csrf

                <div class="grid grid-cols-1 gap-3">
                    <input name="name" placeholder="Name" class="border p-2 rounded-lg">
                    <input name="species" placeholder="Species" class="border p-2 rounded-lg">
                    <input type="number" name="age" placeholder="Age" class="border p-2 rounded-lg">
                    <input name="habitat" placeholder="Habitat" class="border p-2 rounded-lg">
                </div>

                <div class="flex justify-center mt-5">
                    <button class="w-[40%] bg-blue-600 text-white py-2 rounded-lg">
                        Create Animal
                    </button>
                </div>
            </form>
        </div>
        
        <!-- READ TABLE -->
        {{-- <h1 class="text-2xl font-bold mb-4">Students List</h1> --}}
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
        {{-- <div class="bg-white shadow rounded-lg overflow-hidden"> --}}
            {{-- <table class="w-full text-sm text-left">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-3">Student No</th>
                        <th class="p-3">Name</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Gender</th>
                        <th class="p-3">Birth Date</th>
                        <th class="p-3">Contact</th>
                        <th class="p-3">Course</th>
                        <th class="p-3">College</th>
                        <th class="p-3">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($students as $student)
                        <tr class="border-b" data-id="{{ $student->id }}">
                            <td class="p-3">
                                {{ $student->student_number ?? 'N/A' }}
                            </td>

                            <td class="p-3">
                                {{ $student->first_name }}
                                {{ $student->middle_name }}
                                {{ $student->last_name }}
                            </td>

                            <td class="p-3">
                                {{ $student->email }}
                            </td>

                            <td class="p-3">
                                {{ $student->gender }}
                            </td>

                            <td class="p-3">
                                {{ $student->birth_date }}
                            </td>

                            <td class="p-3">
                                {{ $student->contact_number }}
                            </td>

                            <td class="p-3">
                                {{ $student->course->course_name ?? 'N/A' }}
                            </td>

                            <td class="p-3">
                                {{ $student->course->college->college_name ?? 'N/A' }}
                            </td>

                            <!-- ACTIONS -->
                            <td class="p-3 flex gap-2">

                                <!-- EDIT -->
                                <a class="edit-btn px-3 py-1 bg-blue-500 text-white rounded"
                                    data-id="{{ $student->id }}">
                                        Edit
                                </a>

                                <!-- DELETE -->
                                <button class="delete-btn px-3 py-1 bg-red-500 text-white rounded">
                                    Delete
                                </button>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-4 text-center text-gray-500">
                                No students found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table> --}}
        </div>

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
        {{-- <div id="editModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center">
            <div class="bg-white p-6 rounded w-[600px]">

                <h2 class="text-xl font-bold mb-4">Edit Student</h2>

                <form id="editForm" class="space-y-2">

                    <input type="hidden" name="id" id="edit_id">

                    <input name="first_name" id="edit_first_name" class="border p-2 w-full" placeholder="First Name">
                    <input name="middle_name" id="edit_middle_name" class="border p-2 w-full" placeholder="Middle Name">
                    <input name="last_name" id="edit_last_name" class="border p-2 w-full" placeholder="Last Name">
                    <input name="suffix_name" id="edit_suffix_name" class="border p-2 w-full" placeholder="Suffix">

                    <select name="gender" id="edit_gender" class="border p-2 w-full">
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                    <input type="date" name="birth_date" id="edit_birth_date" class="border p-2 w-full">
                    <input type="email" name="email" id="edit_email" class="border p-2 w-full" placeholder="Email">
                    <input name="contact_number" id="edit_contact_number" class="border p-2 w-full" placeholder="Contact Number">
                    <select name="course_id" id="edit_course_id" class="border p-2 w-full">
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}">
                                {{ $course->course_code }} - {{ $course->course_name }}
                            </option>
                        @endforeach
                    </select>

                    <div class="flex justify-end gap-2 mt-4">
                        <button type="button" id="closeModal" class="px-3 py-1 bg-gray-400 text-white rounded">
                            Cancel
                        </button>

                        <button class="px-3 py-1 bg-green-600 text-white rounded">
                            Save
                        </button>
                    </div>

                </form>
            </div>
        </div> --}}
    </div>
@endsection