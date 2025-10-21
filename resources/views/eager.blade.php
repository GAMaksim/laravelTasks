<!DOCTYPE html>
<html>
<head>
    <title>Eager Loading</title>
</head>
<body style="padding: 40px; font-family: Arial;">
    <h1 style="color: green;">✅ EAGER LOADING - Optimized</h1>
    <p><strong>Debugbar</strong> ni oching → <strong>Queries</strong> tab</p>
    <p>Query soni: <strong>Faqat 2 ta</strong></p>
    
    @foreach($posts as $post)
        <div style="border: 1px solid #ddd; padding: 20px; margin: 10px 0;">
            <h3>{{ $post->title }}</h3>
            <h4>Comments:</h4>
            @foreach($post->comments as $comment)
                <p>- {{ $comment->comment }}</p>
            @endforeach
        </div>
    @endforeach
    
    <a href="/lazy" style="color: red; font-size: 20px;">⚠️ Lazy Loading →</a>
</body>
</html>