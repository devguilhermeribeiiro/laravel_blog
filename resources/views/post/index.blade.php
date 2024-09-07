<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog</title>
  @vite('resources/css/app.css')
</head>

<body class="bg-gray-900 text-white min-h-screen flex flex-col items-center">
  <header class="w-full bg-gray-800 py-4">
    <nav class="container mx-auto flex justify-between items-center">
      <h1 class="text-3xl font-bold">Blog</h1>
      <a href="{{ route('posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition duration-300">Create New Post</a>
    </nav>
  </header>

  <main class="container mx-auto my-8 px-4">
    <h2 class="text-2xl font-semibold mb-4">Posts</h2>
    <ul class="space-y-4">
      @foreach ($posts as $post)
      <li class="bg-gray-800 p-4 rounded-lg shadow-md flex justify-between items-center">
        <a href="{{ route('posts.show', $post->id) }}" class="text-blue-400 hover:text-blue-300 transition duration-300">{{ $post->title }}</a>
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition duration-300">Delete</button>
        </form>
      </li>
      @endforeach
    </ul>
  </main>

  @vite('resources/js/app.js')
</body>

</html>