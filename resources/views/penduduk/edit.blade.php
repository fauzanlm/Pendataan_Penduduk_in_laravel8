@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="shadow card">
                <div class="shadow card-header">Edit Data | Project Penduduk</div>

                <div class="card-body">
                    <form class="row-g-3" action="{{ route('admin.update', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="container">

                        
                        <div class="">
                            <label for="">NIK</label><br>
                            <input value="{{ $data->nik }}" class="shadow form-control @error('nik') is-invalid @enderror" type="number" id="" required placeholder="masukkan nik..." name="nik">
                            @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror      
                        </div>
                        <div class="row align-items-start mt-2">
                            <div class="col">
                                <div class="">
                                    <label for="">Nama</label><br>
                                    <input value="{{ $data->nama }}" class="shadow form-control @error('nama') is-invalid @enderror" type="text" id="nama" required placeholder="masukkan nama..." name="nama">
                                    @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror    
                                </div>
                            </div>

                            <div class="col">
                                <div class="">
                                    <label for="">Jenis Kelamin</label><br>
                                    <select placeholder="masukkan jk..." name="jk" id="jk" :value="old('jk')" class="shadow form-control @error('jk') is-invalid @enderror" required>
                                        <option selected disable>{{ $data->jk }}</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    @error('jk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror      
                                </div>
                            </div>
                        </div>
                    <div class="row align-items-start mt-2">
                        <div class="col">

                            <div class="">
                                <label for="">Jalan</label><br>
                                <textarea class="shadow form-control @error('jln') is-invalid @enderror" id="jln" required placeholder="masukkan jln..." name="jln" rows="4">{{ $data->jln }}</textarea>
                                @error('jln')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror      
                            </div>
                        </div>
                        <div class="col">

                            <div class="">
                                <label for="">RT/RW</label><br>
                                <input value="{{ $data->rt_rw }}" class="shadow form-control @error('rt_rw') is-invalid @enderror" type="text" id="rt_rw" required placeholder="masukkan rt_rw..." name="rt_rw">
                                @error('rt_rw')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror      
                            </div>
                            
                            <div class="">
                                <label for="">Desa</label><br>
                                <input value="{{ $data->desa }}" class="shadow form-control @error('desa') is-invalid @enderror" type="text" id="desa" required placeholder="masukkan desa..." name="desa">
                                @error('desa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror      
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-start mt-2">
                        <div class="col">
                            
                            <div class="">
                                <label for="">Kecamatan</label><br>
                                <input value="{{ $data->kecamatan }}" class="shadow form-control @error('kecamatan') is-invalid @enderror" type="text" id="kecamatan" required placeholder="masukkan kecamatan..." name="kecamatan">
                                @error('kecamatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror      
                            </div>
                        </div>
                        <div class="col">
                            
                            <div class="">
                                <label for="">Kabupaten/Kota</label><br>
                                <input value="{{ $data->kab_kota }}" class="shadow form-control @error('kab_kota') is-invalid @enderror" type="text" id="kab_kota" required placeholder="masukkan kab_kota..." name="kab_kota">
                                @error('kab_kota')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror      
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="row align-items-start mt-2">
                        <div class="col">
                            
                            <div class="">
                                <label for="">Agama</label>
                                <select placeholder="masukkan agama..." name="agama" id="agama" :value="old('agama')" class="shadow form-control @error('agama') is-invalid @enderror" required>
                                    <option selected disable>{{ $data->agama }}</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Protestan">Protestan</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                                @error('agama')
                                <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror      
                        </div>
                    </div>
                    <div class="col">
                        
                        <div class="">
                            <label for="">Pekerjaan</label><br>
                            <input value="{{ $data->pekerjaan }}" class="shadow form-control @error('pekerjaan') is-invalid @enderror" type="text" id="pekerjaan" required placeholder="masukkan pekerjaan..." name="pekerjaan">
                            @error('pekerjaan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror      
                        </div>
                    </div>
                </div>
                
                <div class="">
                    <label for="">Pas Foto</label><br>
                        <input value="{{ $data->pas_foto }}" class="shadow form-control @error('pas_foto') is-invalid @enderror" type="file" id="pas_foto" placeholder="masukkan pas_foto..." name="pas_foto">
                        @error('pas_foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror      
                    </div>
                    
                    <div class="mt-2">
                        <button type="submit" class="mt-1 shadow float-end btn btn-success mb-2">Update</button>
                        <a href="{{ route('home') }}" class="shadow float-end mx-2 mt-1 btn btn-warning">Kembali</a>
                    </div>
                
                </div>
                
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
    
@endsection