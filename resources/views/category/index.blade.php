@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Data Kategori') }}</div>

                <div class="card-body">

                    <div class="mb-2">
                        <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary">
                            {{ __('Tambah') }}
                        </a>
                    </div>
                    @if(session()->has('success'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <table class="table table-responsive table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Kategori</th>
                            <th scope="col" width="20%">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td class="text-center">
                                        <div>
                                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-primary">
                                                {{ __('Edit') }}
                                            </a>
                                        </div>
                                       <div>
                                        <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                {{ __('Hapus') }}
                                            </button>
                                        </form>
                                       </div>
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
