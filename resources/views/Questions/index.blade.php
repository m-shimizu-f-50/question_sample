<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>質問リスト</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
</head>
<body>
    <div class="container mt-3">
        <h1>質問リスト</h1>
    </div>
    <div class="container mt-4 mb-4">
        <a href="{{ route('questions.create') }}" class="btn btn-primary">
            投稿の新規作成
        </a>
    </div>
    <div class="container mt-3">
        @foreach ($questions as $question)
        <div class="border p-4">
            <form action="{{ route('answer.store')}}" method="POST">
                @csrf
                <div class="row">
                    <input type="text" name="answer" value="{{old('answer')}}" class="form-control col-8 mr-5">
                    <input type="submit" value="追記" class="btn btn-primary">
                </div>
            </form>
            <!-- 投稿情報 -->
            <div class="summary">
                <p><span class="label {{ $question->status_class }}">{{ $question->status_label }}</span> / <time>{{ $question->updated_at->format('Y.m.d H:i') }}</time> / 横花太郎 </p>
            </div>
            <!-- 本文 -->
            <div class="row">
                <p class="border">{{ $question->question }}</p>
                <form action="{{ route('questions.edit', $question->id)}}">
                    <input type="submit" value="修正" class="btn btn-primary btn">
                </form>
                <form action="{{ route('questions.destroy', $question->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="削除" class="btn btn-danger btn">
                </form>
            </div>
        </div>

        @endforeach
    </div>
</body>
</html>