@extends('adminlte::page')
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)

@section('title', 'Data Sekolah')
@section('content_header')
    <h1>Data User</h1>
@stop

@section('content')
    <div class="container-fluid mt--8 mb-5">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header ">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <h3 class="card-title">{{ __('Users') }}</h3>
                            </div>
                            <div class="col-8 text-right">
                                <a href="{{ route('user.create') }}"
                                    class="btn btn-md btn-primary">{{ __('Tambah Pengguna') }}</a>
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
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Last Login') }}</th>
                                    <th class="text-right">{{ __('Aksi') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr class="text-center">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                        </td>
                                        <td>
                                            {{ tgl_id($user->updated_at) }}
                                            <p class="text-muted well well-sm text-red shadow-none">
                                                {{ $user->updated_at->diffForHumans() }}
                                            </p>
                                        </td>
                                        <td class="project-actions text-right">
                                            <form action="{{ route('user.destroy', $user) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a class="btn btn-primary btn-sm" href="{{ route('user.edit', $user) }}">
                                                    <i class="fas fa-folder">
                                                    </i>
                                                    View
                                                </a>
                                                <a class="btn btn-info btn-sm" href="{{ route('user.edit', $user) }}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>
                                                @if ($user->id != auth()->id())
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="confirm('{{ __('Are you sure you want to delete this user?') }}') ? this.parentElement.submit() : ''"><i
                                                            class="fas fa-trash">
                                                        </i>
                                                        {{ __('Delete') }}
                                                    </button>
                                                @endif
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $users->links() }}
                        </nav>
                    </div>
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
