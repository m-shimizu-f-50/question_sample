<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>質問リスト - 編集</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="border p-4">
            <h1 class="h4 mb-4 font-weight-bold">質問投稿 - 編集</h1>
            <form action="{{ route('questions.update', $question->id)}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <fieldset class="mb-4">
                    <div class="form-group">
                        <label for="subject">名前</label>
                        <input type="text" name="name" value="{{ $name->name}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="subject">質問内容</label>
                        <input type="text" name="updateQuestion" value="{{ $question->question}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="status">状態</label>
                        <select name="status" id="status" class="form-control">
                        @foreach(\App\Question::STATUS as $key => $val)
                            <option
                                value="{{ $key }}"
                                {{ $key == old('status', $question->status) ? 'selected' : '' }}
                            >
                            {{ $val['label'] }}
                            </option>
                        @endforeach
                        </select>
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