@extends('_layout.default')

@section('content')
    <div class="container">
        <h1 class="text-center">Welcome to League</h1>
        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('footballTeams.create',$leaguesId) }}"
                   class="btn btn-primary {{ $teamsCount < 4 ? '' : 'disabled' }}">Yeni Takım Oluştur</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Lig</th>
                        <th scope="col">Takım</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teams as $item)
                        <tr>
                            <th scope="row">{{ $item->id}}</th>
                            <td>{{ $item->leagues->name }}</td>
                            <td>{{ $item->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                <a href="{{ route('scores.index',$leaguesId) }}"
                   class="btn btn-success {{ $teamsCount < 4 ? 'disabled' : '' }}">Sezonu Başlat</a>
            </div>
        </div>

    </div>
@endsection
