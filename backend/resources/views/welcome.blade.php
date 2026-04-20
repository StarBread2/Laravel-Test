@extends('layouts.app')

@section('content')
    <div>
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
                                {{ $student->course->course_code ?? 'N/A' }}
                            </td>

                            <td class="p-3">
                                {{ $student->course->college->college_code ?? 'N/A' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-4 text-center text-gray-500">
                                No students found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection