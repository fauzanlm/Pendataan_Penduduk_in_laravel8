@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Home | Project CRUD') }}</div>

                <div class="card-body">
                @if (Auth::user()->role == 'admin')
                    <a href="{{ route('admin.create') }}" class="btn btn-primary">Tambah Data</a>
                    @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @elseif(session('status-danger'))
                    <div class="alert alert-danger">
                        {{ session('status-danger') }}
                    </div>
                    @endif
                @endif

                    <table id="example" style="width:100%;" class="display">
                        <thead>
                            <tr class="align-center">
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Agama</th>
                                <th>Pekerjaan</th>
                                <th>Foto</th>
                                @if (Auth::user()->role == 'admin')
                                    <th>Aksi</th>
                                    <th></th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $dt)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dt->nik }}</td>
                                <td>{{ $dt->nama }}</td>
                                <td>{{ $dt->jk }}</td>
                                <td>{{ $dt->jln }}, RT {{ $dt->rt_rw }}, desa {{ $dt->desa }}, kec {{ $dt->kecamatan }}, Kabupaten/kota {{ $dt->kab_kota }}</td>
                                <td>{{ $dt->agama }}</td>
                                <td>{{ $dt->pekerjaan }}</td>
                                <td>
                                        <img src="{{ asset('images/'.$dt->pas_foto) }}" alt="" width="125px">
                                    
                                </td>
                                @if (Auth::user()->role == 'admin')
                                    <td>
                                        <a class="btn btn-info" href="{{ route('admin.edit', $dt->id) }}">Edit</a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('admin.destroy', $dt->id) }}">
                                            @csrf
                                            @method('delete')
                    
                                            <button type="submit" onclick="return confirm('Apakah yakin akan menghapus seluruh data {{ $dt->nama }}')" class="btn btn-danger">Hapus</button>
                                        </form>
                                    
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
