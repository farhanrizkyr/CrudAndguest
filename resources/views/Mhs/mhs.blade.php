@extends('Template.tampilan')
@section('title','Halaman Mahsiswa')

@section('content')
    <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List Mahasiswa</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/mahasiswa">Mahasiswa</a></li>
              <li class="breadcrumb-item">Halaman Mahasiswa</li>
             
            </ol>
          </div>



@auth
<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
<i class="fas fa-user-plus"></i>  Tambah Mahasiswa 
</button>

@else
<button type="button" class="btn btn-primary mb-3" disabled data-toggle="modal" data-target="#exampleModal">
<i class="fas fa-user-plus"></i>  Tambah Mahasiswa 
</button>

@endauth
@if(Session::get('pesan'))
<div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
  <strong>Berhasil!</strong> {{Session::get('pesan')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
         <div class="card" style="padding:22px;">
         	<table class="table table-hover">
         		<tr>
         			<th>No</th>
         			<th>Nama Mahasiswa</th>
         			<th>Semester</th>
         			<th>NPM Mahasiswa</th>
         			<th>Status</th>
         			<th>Gender</th>
              <th>Aksi</th>
         		</tr>

            <tbody>
              <?php   $no=1; ?>
              @foreach($mhs as $data)
              <tr>
                <th>{{$no++;}}</th>
                <td class="text-center">{{$data->name}}</td>
                <td>
                  @if($data->semester=='smt1')
                    Semester 1
                  @endif

                    @if($data->semester=='smt2')
                    Semester 2
                  @endif

                   @if($data->semester=='smt3')
                    Semester 3
                  @endif

                   @if($data->semester=='smt4')
                    Semester 4
                  @endif

                   @if($data->semester=='smt5')
                    Semester 5
                  @endif

                   @if($data->semester=='smt6')
                    Semester 6
                  @endif

                   @if($data->semester=='smt7')
                    Semester 7
                  @endif

                   @if($data->semester=='smt8')
                    Semester 8
                  @endif
                 
                   
                </td>
                <td>{{$data->npm}}</td>
                <td>
                 @if($data->status=='aktif')
                    <span class="badge badge-success">Mahasiswa Aktif</span>
                  @endif

                  @if($data->status=='cuti')
                    <span class="badge badge-warning text-center">Mahasiswa Cuti</span>
                  @endif

                      @if($data->status=='tidak_ada')
                    <span class="badge badge-danger text-center"> Cuti Tidak Lapor</span>
                  @endif

                  </td>

                   <td>
                 @if($data->gender=='L')
                    Laki-Laki
                  @endif

                  @if($data->gender=='P')
                    Perempuan
                  @endif

                  </td>

                  <td>
                   @auth
                    <button type="button" class="btn btn-warning btn-sm btn-flat mb-3" data-toggle="modal" data-target="#data-mahasiswa{{$data->id}}">
                      <i class="fas fa-edit"></i> Edit 
                      </button>

                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus-mahasiswa{{$data->id}}">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                   @else
                   <button type="button" disabled class="btn btn-secondary btn-sm btn-flat mb-3" data-toggle="modal" data-target="#data-mahasiswa{{$data->id}}">
                      <i class="fas fa-edit"></i> Edit 
                      </button>

                      <button disabled class="btn btn-secondary btn-sm btn-flat mb-3"><i class="fas fa-trash"></i> Delete</button>
                   @endauth
                  </td>
              </tr>
              @endforeach
            </tbody>
         	</table>

         </div>


      



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLabel">Tambah Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="post" action="/tambah-mahasiswa">
       	@csrf

       	<div class="grup">
       		<label>Nama</label>
       		<input type="text" name="name" class="form-control">
       		@error('name')
       		<p class="text-danger">{{$message}}</p>
       		@enderror
       	</div>

       	      	<div class="grup">
       		<label>NPM</label>
       		<input type="text" name="npm" class="form-control">
       		@error('npm')
       		<p class="text-danger">{{$message}}</p>
       		@enderror
       	</div>

       	      	<div class="grup">
       		<label>Gender</label>
       		<select name="gender" class="form-control">
       			<option value="">Pilih</option>
       			<option value="L">Laki-Laki</option>
       			<option value="P">Perempuan</option>
       			
       		</select>

       		@error('gender')
       		<p class="text-danger">{{$message}}</p>
       		@enderror
       	</div>

  
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>



 @foreach($mhs as $data)
<div class="modal fade" id="data-mahasiswa{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLabel">Update Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="post" action="/update-mahasiswa/{{$data->id}}">
        @csrf

        <div class="grup">
          <label>Nama</label>
          <input type="text" name="name" value="{{$data->name}}" class="form-control">
          @error('name')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>

                <div class="grup">
          <label>NPM</label>
          <input type="text" name="npm" value="{{$data->npm}}" class="form-control">
          @error('npm')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>

                <div class="grup">
          <label>Gender</label>
          <select name="gender" class="form-control">
            <option value="">Pilih</option>
            <option value="L" @if($data->gender=='L')selected @endif>Laki-Laki</option>
            <option value="P" @if($data->gender=='P')selected @endif>Perempuan</option>
            
          </select>

          @error('gender')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>


            <div class="grup">
          <label>Status</label>
          <select name="status" class="form-control">
            <option value="">Pilih</option>
            <option value="aktif" @if($data->status=='aktif')selected @endif>Aktif</option>
            <option value="cuti" @if($data->status=='cuti')selected @endif>Cuti</option>
            <option value="tidak_ada" @if($data->status=='tidak_ada')selected @endif>Cuti Tidak Lapor</option>
            
          </select>

          @error('status')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>


         <div class="grup">
          <label>Smester</label>
          <select name="semester" class="form-control">
            <option value="">Pilih</option>
            <option value="smt1" @if($data->semester=='smt1')selected @endif>Semester 1</option>
            <option value="smt2" @if($data->semester=='smt2')selected @endif>Semester 2</option>
            <option value="smt3" @if($data->semester=='smt3')selected @endif>Semester 3</option>
            <option value="smt4" @if($data->semester=='smt4')selected @endif>Semester 4</option>
            <option value="smt5" @if($data->semester=='smt5')selected @endif>Semester 5</option>
            <option value="smt6" @if($data->semester=='smt6')selected @endif>Semester 6</option>
            <option value="smt7" @if($data->semester=='smt7')selected @endif>Semester 7</option>
            <option value="smt8" @if($data->semester=='smt8')selected @endif>Semester 8</option>
            
          </select>

          @error('smester')
          <p class="text-danger">{{$message}}</p>
          @enderror
        </div>

  
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endforeach


 @foreach($mhs as $data)
 <div class="modal fade" id="hapus-mahasiswa{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-white bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h5> Apakah Anda Ingin Menghapus? {{$data->name}}</h5> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form method="post" action="/hapus-data-mahasiswa/{{$data->id}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-primary">Yes</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endforeach








          @endsection