<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Add New Task</h2>
    </x-slot>

    <div class="py-4 px-6">
        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf

            <div class="mb-4">
                <label>Title:</label><br>
                <input type="text" name="title" class="border rounded w-full" required>
            </div>

            <div class="mb-4">
                <label>Description:</label><br>
                <textarea name="description" class="border rounded w-full"></textarea>
            </div>

            <div class="mb-4">
                <label>Due Date:</label><br>
                <input type="date" name="due_date" class="border rounded">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Task</button>
        </form>
    </div>
</x-app-layout>
