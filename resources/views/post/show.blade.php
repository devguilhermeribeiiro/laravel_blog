<!DOCTYPE html>
<html>
<head>
    <title>Blog</title>
</head>
<body>
  <h1>{{ $post->title }}</h1>
  <p>{{ $post->content }}</p>
  <a href="{{ route('posts.edit', $post->id) }}">Edit Post</a>
</body>
</html>
