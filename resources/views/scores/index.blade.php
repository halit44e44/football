@extends('_layout.default')

@section('content')
    <div class="container">
        <h1 class="text-center">Welcome to League</h1>
        <div class="col-md-12 d-flex justify-content-left">
            <a href="{{ route('scores.start',$leaguesId) }}" class="btn btn-success">Takımları Eşle</a>
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
                    @foreach($scores as $item)
                        <tr>
                            <th scope="row">{{ $item->id}}</th>
                            <td>{{ $item->leagues->name }}</td>
                            <td>{{ $item->teams->name }}</td>
                            <td>{{ $item->point }}</td>
                            <td>{{ $item->pastMatch }}</td>
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
        <hr>
        @if(isset($match))
            <div class="form">
                <div class="row">
                    <div class="col-md-4">
                        <table class="table table-dark">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $match->teamsOwner->name }}</td>
                                <td>{{ $match->teamsAway->name }}</td>
                                <td>@mdo</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection
