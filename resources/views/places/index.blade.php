@extends('adminlte::page')
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)

@section('title', 'Data Sekolah')
@section('content_header')
    <h1>Data Sekolah</h1>
@stop

@section('content')
    <div class="container-fluid mt--8 mb-5">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header bg-dark">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <h3 class="card-title">{{ __('Sekolah') }}</h3>
                            </div>
                            <div class="col-8 text-right">
                                <a href="{{ route('places.create') }}"
                                    class="btn btn-md btn-primary">{{ __('Tambah Sekolah') }}</a>
                            </div>

                        </div>
                    </div>

                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="card-body ">
                        <table class="table table-hovered" id="datatable">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>{{ __('Nama TK') }}</th>
                                    <th>{{ __('Alamat') }}</th>
                                    <th>{{ __('Update') }}</th>
                                    <th class="text-right">{{ __('Aksi') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $temp)
                                    <tr class="text-center">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $temp->place_name }}</td>
                                        <td>{{ $temp->address }}</td>
                                        <td>
                                            {{ tgl_id($temp->updated_at) }}
                                            <p class="text-muted well well-sm text-red shadow-none">
                                                {{ $temp->updated_at->diffForHumans() }}
                                            </p>
                                        </td>
                                        <td class="text-right">
                                            <form action="{{ route('places.destroy', $temp->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a class="btn btn-primary btn-sm" href="{{ route('places.show', $temp->id) }}">
                                                    <i class="fas fa-folder">
                                                    </i>
                                                    View
                                                </a>
                                                <a class="btn btn-info btn-sm" href="{{ route('places.edit', $temp->id) }}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="confirm('{{ __('Are you sure you want to delete this temp?') }}') ? this.parentElement.submit() : ''"><i
                                                            class="fas fa-trash">
                                                        </i>
                                                        {{ __('Delete') }}
                                                    </button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $temps->links() }}
                        </nav>
                    </div> --}}
                </div>
            </div>
        </div>


    </div>
@endsection
@push('js')
    <script>
        $(function() {
            $('#datatable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,

            });
        });
    </script>
@endpush
