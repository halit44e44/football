@extends('_layout.default')

@section('content')
    <div class="container">
        <h1 class="text-center">Welcome to League</h1>
        <div class="row col-md-3">
            <a href="{{ route('leagues.create') }}" class="btn btn-primary">Yeni Lig Oluştur</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Takım</th>
                        <th scope="col">Lig</th>
                        <th scope="col">Maçlara Git</th>
                        <th scope="col">İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($leagues as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->season }}</td>
                            <td><a href="{{ route('footballTeams.index', $item->id)}}" class="btn btn-success">Lige Git</a></td>
                            <td><a href="{{ route('leagues.delete', $item->id)}}" class="btn btn-danger">Ligi Sil</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
