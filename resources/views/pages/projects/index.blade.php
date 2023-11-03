<?php
$records = \App\Models\Project::query()
    ->with('company')
    ->where('published_at', '<=', now())
    ->get();
?>
<x-layouts.app>
    <h1>Projects</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 md:gap-3 lg:gap-4">
        @foreach ($records as $record)
            <div class="p-4 rounded-lg shadow-lg">
                <h3>{{ $record->name }}</h3>
                <a href="{{ route('projects.show', ['project' => $record]) }}"></a>
            </div>
        @endforeach
    </div>
</x-layouts.app>
