<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Your Tasks</h2>
    </x-slot>

    <div class="py-4 px-6">
        <a href="{{ route('tasks.create') }}" class="text-blue-600 underline">+ Add Task</a>

        @if(session('success'))
            <p class="text-green-600 mt-2">{{ session('success') }}</p>
        @endif

        <ul class="mt-4 space-y-2">
@forelse ($tasks as $task)
    <li class="border-b pb-2">
        <strong>{{ $task->title }}</strong> – {{ $task->description }} <br>
        Due: {{ $task->due_date ?? 'No date' }} |
        Status:
        <span class="{{ $task->is_completed ? 'text-green-600' : 'text-red-600' }}">
            {{ $task->is_completed ? 'Completed' : 'Pending' }}
        </span>

        <div class="mt-2 space-x-2">
            {{-- ✔ Mark Complete (only if not finished, and owner) --}}
            @can('update', $task)
                @if (!$task->is_completed)
                    <form action="{{ route('tasks.complete', $task) }}" method="POST" class="inline">
                        @csrf @method('PATCH')
                        <button type="submit" class="text-sm text-green-600">
                            ✔ Mark Complete
                        </button>
                    </form>
                @endif
            @endcan

            {{-- ✎ Edit --}}
            @can('update', $task)
                <a href="{{ route('tasks.edit', $task) }}" class="text-sm text-blue-600">✎ Edit</a>
            @endcan

            {{-- 🗑 Delete --}}
            @can('delete', $task)
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-sm text-red-600"
                            onclick="return confirm('Delete task?')">
                        🗑 Delete
                    </button>
                </form>
            @endcan
        </div>
    </li>
@empty
    <p>No tasks yet. <a href="{{ route('tasks.create') }}" class="text-blue-600">Add one</a>.</p>
@endforelse
</ul>

    </div>
</x-app-layout>
