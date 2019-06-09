<h1>Projects</h1>

<h2>Projects that were created today:</h2>
@foreach ($projects as $project)
    @if (date('Ymd', strtotime($projects[0]->created_at)) == date('Ymd'))
        <li>{{ $project->title }}: {{ $project->description }}</li>
    @endif
@endforeach

<h2>All Projects</h2>
@foreach ($projects as $project)
    <li>{{ $project->title }}: {{ $project->description }}</li>
@endforeach