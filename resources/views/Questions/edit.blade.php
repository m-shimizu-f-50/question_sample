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
    <div class="container mt-3">
        <h1>質問リスト - 編集</h1>
    </div>
    <div class="container mt-3">
        <div class="container mb-4">
            {!! Form::open(['route' => ['questions.update', $question->id], 'method' => 'POST']) !!}
            {{ csrf_field() }}
            {{ method_field('PUT') }}
                <div class="row">
                    {{ Form::text('updateQuestion', $question->question, ['class' => 'form-control col-7 mr-4']) }}
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
                    {{ Form::submit('更新', ['class' => 'btn btn-primary mr-3']) }}
                    <a href="{{ route('questions.index') }}" class="btn btn-danger">戻る</a>
                </div>
            {!! Form::close() !!}
        </div>
        @if ($errors->has('updateQuestion'))
            <p class="alert alert-danger">{{ $errors->first('updateQuestion') }}</p>
        @endif
    </div>
</body>
</html>