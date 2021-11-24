@extends('_layout.default')

@section('content')
    <div class="container">
        <h1 class="text-center">Yeni Lig Ekle</h1>
        <div class="row">
            <form action="{{ route('leagues.store') }}" method="POST">
                @csrf

                <div class="form-group mx-sm-3 mb-2">
                    <label for="name" class="sr-only">Lig Adı</label>
                    <input type="text" class="form-control" name="name" placeholder="Lig Adı" required>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="season" class="sr-only">Sezon</label>
                    <input type="text" class="form-control" name="season" placeholder="Sezonu" required>
                </div>

                <x-button :name="'Lig Ekle'" :color="'danger'"/>
            </form>
        </div>

    </div>
@endsection
