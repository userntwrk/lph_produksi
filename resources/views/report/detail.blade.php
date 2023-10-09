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
            <tbody>
                <tr>
                    <td>{{ $load->partname }}</td>
                    <td>{{ $load->skema }}</td>
                    <td>{{ $load->status }}</td>
                    <td>{{ $load->size }}</td>
                    <td>{{ $load->warna }}</td>
                    <td>{{ $load->kode_joint }}</td>
                    <td>{{ $load->terminal }}</td>
                    <td>{{ $load->std_ch }}</td>                    
                    <td>
                        <form action="{{ route('report.destroy', $load->partname) }}" method="post">
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