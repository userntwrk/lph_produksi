@extends('layouts.apps')

@section('content')

<div class="card">
    <div class="card-header border-transparent">
        <h3 class="card-title">Data Laporan Harian Hasil Produksi W/H</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table m-0">
                <thead>
                    <tr>                        
                        <th>No Lot</th>
                        <th>Kode Joint</th>
                        <th>Std CH</th>
                        <th>N1</th>                        
                        <th>N2</th>                        
                        <th>N3</th>
                        <th>Std Tes</th>
                        <th>N1 Tes</th>
                        <th>Hasil</th>
                        <th>W Setting</th>
                        <th>W Tes</th>                        
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach($laporan as $row)
                <tbody>
                    <tr>                        
                        <td>{{ $row->NoLot}}</td>
                        <td>{{ $row->kodejoint}}</td>
                        <td>{{ $row->Std_CH}}</td>
                        <td>{{ $row->N1}}</td>
                        <td>{{ $row->N2}}</td>
                        <td>{{ $row->N3}}</td>
                        <td>{{ $row->Std_tes}}</td>
                        <td>{{ $row->N1_tes}}</td>
                        <td>{{ $row->Hasil}}</td>
                        <td>{{ $row->w_setting}}</td>
                        <td>{{ $row->w_tes}}</td>                        
                        <td>
                            <button type="button" class="btn btn-sm btn-success">
                                <a href="/index/create" style="color: white">
                                <i class="fas fa-cog"></i>
                                </a>
                            </button>
                            <button type="button" class="btn btn-sm btn-warning">
                                <a href="{{ route('index.edit', $row->NoLot) }}" style="color: white">
                                <i class="fas fa-edit"></i>
                                </a>
                                </button>
                            <button type="button" class="btn btn-sm btn-info">
                                <a href="{{ route('index.show', $row->NoLot) }}" style="color: white">
                                Detail
                                </a>
                            </button>                                                        
                    </tr>                    
                </tbody>
                @endforeach
            </table>
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

@endsection