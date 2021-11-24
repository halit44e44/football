@extends('_layout.default')

@section('content')
    <div class="container">
        <h1 class="text-center">Welcome to League</h1>
        <div class="col-md-12 d-flex justify-content-left">
            <a href="{{ route('scores.start',$leaguesId) }}" class="btn btn-success {{ $match ? 'disabled' : '' }}">Takımları
                Eşle</a>
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
                            <td>{{ $item->totalGoals }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        @if($match)
            <div class="form">
                <h2 class="text-center">Maçları Oyna</h2>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">
                        <table class="table table-dark">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ev Sahibi</th>
                                <th scope="col">Deplasman</th>
                                <th scope="col">SKOR</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $match->teamsOwner->name }}</td>
                                <td>{{ $match->teamsAway->name }}</td>
                                <td>{{ isset($match->score) ? 'Oynanmadı' : $match->score1 . '-' . $match->score2 }}</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="col-md-12 d-flex justify-content-center">
                            <a href="{{ route('scores.game',$match->id) }}" class="btn btn-success">Maçı Oyna</a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            @if($alert)
                <div class="alert alert-danger" role="alert">
                    {{ $alert }}
                </div>
            @endif
        @endif
        <hr>
        <div class="form">
            <h2 class="text-center">Geçmiş Maçlar</h2>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ev Sahibi</th>
                            <th scope="col">Deplasman</th>
                            <th scope="col">Skor</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($oldMatch as $match)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $match->teamsOwner->name }}</td>
                                <td>{{ $match->teamsAway->name }}</td>
                                <td>{{ $match->score1 }} - {{ $match->score2 }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    </div>
@endsection
