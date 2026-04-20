@extends('layouts.app')

@section('content')
    <div>
        

        <!-- CREATE USER -->
        <h1 class="text-2xl font-bold mb-4">Create Student</h1>
        
        <div class="mb-20 w-full">
            <form id="studentForm" class="space-y-3">

                @csrf

                <div class="grid grid-cols-1 md:grid-cols-1 gap-3">
                    <input name="first_name" placeholder="First Name" class="input pb-2 border border-gray-300 rounded-lg p-2 ">
                    <input name="last_name" placeholder="Last Name" class="input pb-2 border border-gray-300 rounded-lg p-2 ">
                    <input name="middle_name" placeholder="Middle Name" class="input pb-2 border border-gray-300 rounded-lg p-2 ">
                    <input name="suffix_name" placeholder="Suffix" class="input pb-2 border border-gray-300 rounded-lg p-2 ">
                

                    <select name="gender" class="input pb-2 border border-gray-300 rounded-lg p-2 ">
                        <option value="">Select Gender</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>

                    <input type="date" name="birth_date" class="input pb-2 border border-gray-300 rounded-lg p-2 ">
                    <input type="email" name="email" placeholder="Email" class="input pb-2 border border-gray-300 rounded-lg p-2 ">
                    <input type="text" name="contact_number" placeholder="Contact Number" class="input pb-2 border border-gray-300 rounded-lg p-2 ">
                    <input type="number" name="course_id" placeholder="Course ID" class="input pb-2 border border-gray-300 rounded-lg p-2 ">
                </div>

                <div class="flex justify-center mt-5">
                    <button class="mt-5 w-[40%] bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition font-semibold" type="submit" class="btn">
                        Create Student
                    </button>
                </div>
                
            </form>
        </div>
        

        <!-- READ TABLE -->
        <h1 class="text-2xl font-bold mb-4">Students List</h1>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-3">Student No</th>
                        <th class="p-3">Name</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Course</th>
                        <th class="p-3">College</th>
                        <th class="p-3">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($students as $student)
                        <tr class="border-b">
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
                                {{ $student->course->course_name ?? 'N/A' }}
                            </td>

                            <td class="p-3">
                                {{ $student->course->college->college_name ?? 'N/A' }}
                            </td>

                            <!-- ACTIONS -->
                            <td class="p-3 flex gap-2">

                                <!-- EDIT -->
                                <a 
                                    class="px-3 py-1 bg-blue-500 text-white rounded">
                                    Edit
                                </a>

                                <!-- DELETE -->
                                <button type="submit"
                                        class="px-3 py-1 bg-red-500 text-white rounded">
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
            </table>
        </div>
    </div>
@endsection