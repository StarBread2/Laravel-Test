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
        </tr>
    </thead>

    <tbody>
        @forelse($zoos as $zoo)
            <tr data-id="{{ $zoo->id }}">
                <td class="p-3">{{ $zoo->name }}</td>
                <td class="p-3">{{ $zoo->species }}</td>
                <td class="p-3">{{ $zoo->age }}</td>
                <td class="p-3">{{ $zoo->habitat }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center p-4">No data</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection