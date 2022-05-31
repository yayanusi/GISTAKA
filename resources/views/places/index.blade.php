@extends('adminlte::page')
@section('plugins.Sweetalert2', true)

@section('title', 'Data Sekolah')
@section('content_header')
    <h1>Data Sekolah TK</h1>
@stop

@section('content')
    <div class="card">
        {{-- <x:notify-messages /> --}}
        <div class="card-header">Daftar Sekolah</div>
        <div class="card-body">
            <a href="{{ route('places.create') }}" class="btn btn-primary btn-sm float-right">Tambah Data</a>
            <table class="table table-hovered" id="tablePlace">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Sekolah</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>


    <form action="" method="post" id="deleteForm">
        @csrf
        @method('DELETE')
        <input type="submit" value="Hapus" style="display:none">
    </form>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('/vendor/datatables/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/datatables/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@push('js')
    <script src="{{ asset('/vendor/datatables/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $(function() {
            $('#tablePlace').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('place.data') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        class:'text-center',
                    },
                    {
                        data: 'place_name'
                    },
                    {
                        data: 'address'
                    },
                    {
                        data: 'description'
                    },
                    {
                        data: 'action'
                    }
                ]
            })
        });
    </script>
@endpush
