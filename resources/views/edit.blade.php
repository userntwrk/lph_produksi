@extends('layouts.apps')

@section('content')

<div class="card">
	<div class="card-header border-transparent">
		<div class="container">
			<h2>Edit Data</h2>
			
	<div class="card-body p-0">		
		<form action="{{ route('index.update', $laporan->NoLot) }}" method="post" enctype="multipart/form-data">
            @csrf            
            @method('PUT')
			<label>No Lot</label>
			<input type="text" name="no_lot" id="no_lot" required="" class="form-control" value="{{$laporan->NoLot}}">

			<label>Kode Joint</label>
			<input type="text" name="kode_joint" id="kode_joint" required="" class="form-control" value="{{$laporan->kodejoint}}">

			<label>Std CH</label>
			<input type="decimal" name="std_ch" id="std_ch" class="form-control" value="{{$laporan->Std_CH}}">
			
            <label>N1</label>
			<input type="decimal" name="n1" id="n1" class="form-control" value="{{$laporan->N1}}">			

            <label>N2</label>
			<input type="decimal" name="n2" id="n2" class="form-control" value="{{$laporan->N2}}">			

            <label>N3</label>
			<input type="decimal" name="n3" id="n3" class="form-control" value="{{$laporan->N3}}">			

            <label>Std Tes</label>
			<input type="decimal" name="std_tes" id="std_tes" class="form-control" value="{{$laporan->Std_Tes}}">			

            <label>N1 Tes</label>
			<input type="decimal" name="n1_tes" id="n1_tes" class="form-control" value="{{$laporan->N1_tes}}">			

            <label>Hasil</label>
			<input type="number" name="hasil" id="hasil" class="form-control" value="{{$laporan->Hasil}}">			

            <label>Waste Setting</label>
			<input type="decimal" name="w_set" class="form-control" value="{{$laporan->w_setting}}">			

            <label>Waste Tes</label>
			<input type="decimal" name="w_tes" class="form-control" value="{{$laporan->w_tes}}">			

            <label>Rework</label>
			<input type="number" name="rework" class="form-control" value="{{$laporan->Rework}}">			

            <br>
			<input type="submit" value="Edit" class="btn btn-success">	
		</form>		
	</div>
	
	</div>

@endsection