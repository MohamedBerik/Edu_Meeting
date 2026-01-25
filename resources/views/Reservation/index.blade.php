@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>{{ __('language.Reservations') }}</h4>
                        <div>
                            <a href="#" class="btn btn-success">
                                <i class="fas fa-plus"></i> {{ __('language.Create Reservation') }}
                            </a>
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                                <i class="fas fa-tachometer-alt"></i> {{ __('language.Dashboard') }}
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('language.Name') }}</th>
                                        <th>{{ __('language.Email') }}</th>
                                        <th>{{ __('language.Persons') }}</th>
                                        <th>{{ __('language.Date') }}</th>
                                        <th>{{ __('language.Time') }}</th>
                                        <th>{{ __('language.Message') }}</th>
                                        <th>{{ __('language.Status') }}</th>
                                        <th>{{ __('language.Operation') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservations as $reservation)
                                        <tr>
                                            <td>{{ $reservation->id }}</td>
                                            <td>{{ $reservation->name }}</td>
                                            <td>{{ $reservation->email }}</td>
                                            <td>{{ $reservation->persons }}</td>
                                            <td>{{ $reservation->date }}</td>
                                            <td>{{ $reservation->time }}</td>
                                            <td>{{ $reservation->message }}</td>
                                            <td>{{ $reservation->status }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="#" class="btn btn-sm btn-success">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="#" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('هل أنت متأكد؟')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
