@extends('layouts.apps')

@section('content')

<div class="container-fluid">
<form action="{{ route('report.import' )}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="excel_file" class="btn btn-default">
    <button type="submit" class="btn btn-info">Import</button>    
</form><br>
</div>
        
<div class="card">
    <div class="card-header border-transparent">
        <h3 class="card-title">Table Loading Joint</h3>

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
                        <th>Part Name</th>
                        <th>Skema</th>
                        <th>Status</th>
                        <th>Size</th>
                        <th>Warna</th>
                        <th>Kode Joint</th>
                        <th>Terminal</th>
                        <th>Std CH</th>                        
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach($load as $row)
                <tbody>
                    <tr>
                        <td>{{ $row->partname}}</td>
                        <td>{{ $row->skema}}</td>
                        <td>{{ $row->status}}</td>
                        <td>{{ $row->size}}</td>
                        <td>{{ $row->warna}}</td>
                        <td>{{ $row->kode_joint}}</td>
                        <td>{{ $row->terminal}}</td>
                        <td>{{ $row->std_ch}}</td>                        
                        <td>
                            <button type="button" class="btn btn-sm btn-info">
                                <a href="{{ route('report.show', $row->partname) }}" style="color: white">
                                Detail
                                </a>
                            </button>
                        </td>                            
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
</div>
@endsection