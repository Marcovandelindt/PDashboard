@extends('layout.app')

@section('content')
    <div class="row">
        <div class="container">
            <div class="pageheader-wrapper d-flex justify-content-between">
                <div class="pageheader-title">
                    <h1>Gaming</h1>
                </div>
                <div class="pageheader-buttons">
                    <div class="buttons-holder">
                        <a href="{{ route('gaming.playstation.sync') }}"
                           class="btn btn-primary d-flex align-items-center gap-2">
                            <i class="fa-solid fa-sync"></i>
                            <span>Run PSN Sync</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (!empty($games))
        <div class="row mt-4">
            <div class="container">
                <div class="col-md-6">
                    <div class="table">
                        <table class="table table-striped table-responsive">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Play time</th>
                                <th>Last played</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($games as $game)
                                <tr>
                                    <td><img src="{{ $game->image_url }}" alt="{{ $game->name }}" height="50"
                                             width="50"></td>
                                    <td>{{ $game->name }}</td>
                                    <td>{{ $game->play_duration }}</td>
                                    <td>{{ date('d/m/Y', strtotime($game->last_played_date_time)) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
