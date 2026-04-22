@extends('layouts.app')

@section('content')
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
@endsection