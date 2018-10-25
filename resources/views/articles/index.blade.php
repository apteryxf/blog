@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">記事一覧</div>
                <div class="panel-body">
                    @if (Session::has('flash_message'))
                        <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
                    @endif

                    <div class="mb10">
                        {!! link_to_action('Admin\ArticlesController@create', '新規作成') !!}
                    </div>

                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>タイトル</th>
                            <th>作成日</th>
                            <th>編集</th>
                        </tr>
                        </thead>
                        @foreach($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->created_at->format('Y年m月d日') }}</td>
                                <td>
                                    {!! link_to_action('ArticlesController@show', '表示', [$article->id]) !!}
                                    {!! link_to_action('Admin\ArticlesController@edit', '編集', [$article->id]) !!}
                                    {!! Form::model($article,
                                    ['url' => [
                                        '/', $article->id],
                                        'method' => 'delete',
                                        'class' => 'delete-from'
                                    ]) !!}
                                        {!! Form::submit('削除', [
                                            'onclick' => "return confirm('本当に削除しますか?')",
                                            'class' => 'text-link'
                                            ]) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {!! $articles->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
