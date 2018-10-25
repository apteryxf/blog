@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">詳細</div>
                    <div class="panel-body">
                        <div>
                            <h1>{{ $article->title }}</h1>
                            <p>{{ $article->body }}</p>
                        </div>
                    </div>
                    <div class="panel-footer">
                        {!! link_to('/articles', '一覧へ戻る', ['class' => 'btn btn-default']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
