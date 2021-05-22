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
    <div class="container mt-4">
        <div class="border p-4">
            <h1 class="h4 mb-4 font-weight-bold">
                投稿の新規作成
            </h1>
            <form action="{{ route('questions.store')}}" method="POST">
                @csrf
                <fieldset class="mb-4">
                    <div class="form-group">
                        <label for="subject">名前</label>
                        <input type="text" name="newName" value="{{old('newName')}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="subject">質問内容</label>
                        <input type="text" name="newQuestion" value="{{old('newQuestion')}}" class="form-control">
                        @if ($errors->has('newQuestion'))
                            <p class="alert alert-danger">{{ $errors->first('newQuestion') }}</p>
                        @endif
                    </div>
                    <div class="mt-5">
                        <a class="btn btn-secondary" href="{{ route('questions.index') }}">
                            キャンセル
                        </a>
                        <button type="submit" class="btn btn-primary">
                            投稿する
                        </button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>
