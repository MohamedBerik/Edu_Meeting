@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>{{ __('language.Products') }}</h4>
                        <div>
                            <a href="{{ route('product.create') }}" class="btn btn-success">
                                <i class="fas fa-plus"></i> {{ __('language.CreateProduct') }}
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
                                        <th>{{ __('language.Image') }}</th>
                                        <th>{{ __('language.Title') }}</th>
                                        <th>{{ __('language.Description') }}</th>
                                        <th>{{ __('language.Price') }}</th>
                                        <th>{{ __('language.Quantity') }}</th>
                                        <th>{{ __('language.Category_id') }}</th>
                                        <th>{{ __('language.Operation') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($result as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>
                                                <img src={{ asset('/img/product/' . $product->product_image) }}
                                                    style="width: 50px; height: 30px;" alt="">
                                            </td>
                                            <td>{{ $product->title_en }}</td>
                                            <td>{{ $product->description_en }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->category_id }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('product.show', $product->id) }}"
                                                        class="btn btn-sm btn-success">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('product.edit', $product->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('product.delete', $product->id) }}"
                                                        method="POST" class="d-inline">
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
