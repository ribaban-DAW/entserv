<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NewsAPI</title>
</head>
<body>
    <h1>NewsAPI</h1>
    @if (isset($error))
        <p style="color: red;">{{ $error }}</p>
    @endif

    <form action="{{ route('news.index') }}" method="GET">
        @csrf
        <select name="option">
            <option value="everything">Mostrar todo</option>
            <option value="top-headlines">Cabeceras</option>
            <option value="sources">Orígenes</option>
        </select>
        <input name="query" type="text" placeholder="bitcoin" value="{{ request('query') }}" required />
        <button type="submit">Mostrar</button>
    </form>

    @if($articles)
        @foreach ($articles as $article)
            <h2>{{ $article['title'] }}</h2>
            <h3>{{ $article['author'] }} {{ $article['publishedAt'] }}</h3>
            <p>{{ $article['description'] }}</p>
        @endforeach
    @endif

    @if($sources)
        @foreach ($sources as $source)
            <h2>{{ $source['name'] }}</h2>
            <a href="{{ $source['url'] }}">Source</a>
            <p>{{ $source['description'] }}</p>
        @endforeach
    @endif
</body>
</html>
