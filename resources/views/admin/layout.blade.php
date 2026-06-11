<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — Breganza Portfolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans min-h-screen">

<nav class="bg-gray-900 text-white px-6 py-4 flex items-center justify-between shadow">
    <div class="flex items-center gap-6">
        <span class="font-bold text-lg tracking-wide">⚡ IMB Admin</span>
        <a href="{{ route('admin.projects.index') }}" class="text-sm hover:text-green-400 transition {{ request()->routeIs('admin.projects*') ? 'text-green-400' : '' }}">Projects</a>
        <a href="{{ route('admin.experiences.index') }}" class="text-sm hover:text-green-400 transition {{ request()->routeIs('admin.experiences*') ? 'text-green-400' : '' }}">Experience</a>
        <a href="{{ route('admin.skills.index') }}" class="text-sm hover:text-green-400 transition {{ request()->routeIs('admin.skills*') ? 'text-green-400' : '' }}">Skills</a>
        <a href="{{ route('admin.certificates.index') }}" class="text-sm hover:text-green-400 transition {{ request()->routeIs('admin.certificates*') ? 'text-green-400' : '' }}">Certificates</a>
    </div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="text-sm text-gray-400 hover:text-red-400 transition">Logout</button>
    </form>
</nav>

<main class="max-w-5xl mx-auto py-10 px-4">
    @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-300 text-green-800 rounded px-4 py-3 text-sm">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</main>

</body>
</html>
