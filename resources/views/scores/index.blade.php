@extends('_layout.default')

@section('content')
    <div class="container">
        <h1 class="text-center">Welcome to League</h1>
        <div class="row col-md-3">
            <a href="{{ route('footballTeams.create',$leaguesId) }}" class="btn btn-primary">Yeni Takım Oluştur</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Lig</th>
                        <th scope="col">Takım</th>
                        <th scope="col">T.Puan</th>
                        <th scope="col">T.Maç</th>
                        <th scope="col">Galibiyet</th>
                        <th scope="col">Beraber</th>
                        <th scope="col">Mağlubiyet</th>
                        <th scope="col">A.Gol</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teams as $item)
                        <tr>
                            <th scope="row">{{ $item->id}}</th>
                            <td>{{ $item->leagues->name }}</td>
                            <td>{{ $item->teams->name }}</td>
                            <td>{{ $item->point }}</td>
                            <td>5</td>
                            <td>{{ $item->winPoint }}</td>
                            <td>{{ $item->draw }}</td>
                            <td>{{ $item->losePoint }}</td>
                            <td>{{ $item->point }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
