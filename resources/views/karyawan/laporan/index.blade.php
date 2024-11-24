@extends('layouts.backend')
@section('title', 'Karyawan - Laporan Laundry')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> Laporan Laundry
                    <a href="{{ url('export-excel') }}" class="btn btn-info btn-sm">Export Excel</a>
                </h4>
                <div class="table-responsive m-t-0">
                    <table id="myTable" class="table display table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Customer</th>
                                <th>Jenis Laundry</th>
                                <th>Jenis Pembayaran</th>
                                <th>Status Pembayaran</th>
                                <th>Total</th>
                                <th>Tanggal Transaksi</th>
                            </tr>
                        </thead>
                        <tbody id="refresh_body">
                            <?php $no = 1; ?>
                            @foreach ($laporan as $laporans)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ namaCustomer($laporans->customer_id) ?? 'Customer Tidak Tersedia'}}</td>
                                    <td>{{ $laporans->price->jenis ?? 'Jenis tidak tersedia'}}</td>
                                    <td>{{ $laporans->jenis_pembayaran }}</td>
                                    <td>
                                        @if ($laporans->status_payment == 'Success')
                                            <span class="label label-success">Sudah Dibayar</span>
                                        @else
                                            <span class="label label-info">Belum Dibayar</span>
                                        @endif
                                    </td>
                                    <td>{{ Rupiah::getRupiah($laporans->harga_akhir) }}</td>
                                    <td>{{ carbon\carbon::parse($laporans->tgl_transaksi)->format('d-m-y') }}</td>
                                </tr>
                                <?php $no++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myTable').DataTable();
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before(
                                    '<tr class="group"><td colspan="5">' + group +
                                    '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
