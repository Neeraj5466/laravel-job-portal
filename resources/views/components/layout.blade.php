<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Job Portal</title>
</head>

<body>

    <nav class="mb-4 d-flex justify-content-between fs-2 fw-bold">
        <ul>
            <li class="nav-link">
                <a href="{{ route('jobs.index') }}" class="nav-link">Home</a>
            </li>
        </ul>
        <ul class="d-flex gap-2">
            @auth
                <li class="nav-link">
                    <a href="{{route('my-job-applications.index')}}" class="nav-link ">
                        {{ auth()->user()->name ?? 'Anonymous' }} : <span class="border border-2 px-2 border-primary"> Applications</span>
                    </a>
                
                </li>
                <li class="nav-link">
                    <a href="{{route('my-jobs.index')}}" class="nav-link border border-2 px-2 border-primary">My Jobs</a>
                </li>
                <li class="nav-link mx-4">
                    <form action="{{ route('auth.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Logout</button>
                    </form>
                </li>
            @else
                <li class="nav-link mx-4">
                    <a href="{{ route('auth.create') }}" class="btn btn-sm btn-primary">Sign In</a>
                </li>
            @endauth
        </ul>
    </nav>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mx-4" role="alert">
            <p class="fw-bold">Success!</p>
            <p>{{ session('success') }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show mx-4" role="alert">
            
            <p class="fw-bold">Error!</p>
            <p>{{ session('error') }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{ $slot }}

</body>

</html>
