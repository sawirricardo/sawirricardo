<?php
$record = \App\Models\User::query()
    ->with('companies.projects')
    ->first();
?>
<h1 align="center">{{ $record->name }}</h1>
<p align="center">
<a href="https://linkedin.com/in/{{ $record->linkedin_id }}">LinkedIn</a>
<a href="https://github.com/{{ $record->github_id }}">Github</a>
<a href="https://twitter.com/{{ $record->twitter_id }}">Twitter</a>
@if (! empty($record->links))
    
@endif
</p>
<p>{!! $record->bio !!}</p>

@foreach ($record->companies->sortBy('order_column') as $company)
<div>
<h2>{{ $company->name }}</h2>
<p>
@foreach ($company->links as $key => $link)
@if (in_array($link, ['Coming Soon']))
<span>{{ $link }}</span>
@else
<a href="{{ $link }}">{{ $key }}</a>
@endif
@if (! $loop->last && count($company->links) > 1)
    |
@endif
@endforeach
</p>
{{-- @foreach ($company->projects->sortBy('order_column') as $project)
<div>
<h3>{{ $project->name }}</h3>
<div>
    {!! $project->content !!}
</div>
</div>
@endforeach --}}
</div>
@endforeach
