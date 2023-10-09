@extends('layouts.apps')

@section('content')

<section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Detail Data</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
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
                    <th>Rework</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $laporan->NoLot }}</td>
                    <td>{{ $laporan->kode_joint }}</td>
                    <td>{{ $laporan->Std_CH }}</td>
                    <td>{{ $laporan->N1 }}</td>
                    <td>{{ $laporan->N2 }}</td>
                    <td>{{ $laporan->N3 }}</td>
                    <td>{{ $laporan->Std_Tes }}</td>
                    <td>{{ $laporan->N1_tes }}</td>
                    <td>{{ $laporan->Hasil }}</td>
                    <td>{{ $laporan->w_setting }}</td>
                    <td>{{ $laporan->w_tes }}</td>
                    <td>{{ $laporan->Rework }}</td>
                    <td>
                        <form action="{{ route('index.destroy', $laporan->NoLot) }}" method="post">
                            @csrf
                            @method('DELETE')                                
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
        
    </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

@endsection