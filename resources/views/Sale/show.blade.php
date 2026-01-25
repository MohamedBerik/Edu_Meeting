@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>{{ __('language.Sales') }}</h4>
                        <div>
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
                                        <th class="text-center">#</th>
                                        <th class="text-center">{{ __('language.Title') }}</th>
                                        <th class="text-center">{{ __('language.Description') }}</th>
                                        <th class="text-center">{{ __('language.Price') }}</th>
                                        <th class="text-center">{{ __('language.Quantity') }}</th>
                                        <th class="text-center">{{ __('language.Employee_id') }}</th>
                                        <th class="text-center">{{ __('language.Created_at') }}</th>
                                        <th class="text-center">{{ __('language.Operation') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $result->id }}</td>
                                        <td>{{ $result->title_en }}</td>
                                        <td>{{ $result->description_en }}</td>
                                        <td>{{ $result->price }}</td>
                                        <td>{{ $result->quantity }}</td>
                                        <td>{{ $result->employee_id }}</td>
                                        <td>{{ $result->created_at }}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('sale.index') }}" class="btn btn-sm btn-success">
                                                    <i class="fas fa-house"></i>
                                                </a>
                                                <a href="{{ route('sale.edit', $result->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('sale.delete', $result->id) }}" method="POST"
                                                    class="d-inline">
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
