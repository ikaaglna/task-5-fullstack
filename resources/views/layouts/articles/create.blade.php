@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <section class="content p-2">
            <section class="card p-2">
                <div class="row p-3">
                    <div class="col-12">
                        <div style="font-size:12px; margin-top:-10px">Master Data / <span><a
                                    href="{{ Route('komponenBiaya.index') }}">Komponen Biaya</a></span> / Tambah Komponen
                            Biaya</div>
                        <h1>Tambah Komponen Biaya</h1>
                    </div>
                </div>
            </section>
            <section class="card p-4 mt-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-body">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form action="{{ Route('komponenBiaya.store') }}" method="post">
                                                @csrf
                                                <div class="mb-3 row">
                                                    <label for=""
                                                        class="col-lg-2 col-md-10 col-sm-12 col-form-label">Nama
                                                        Komponen</label>
                                                    <div class="col-lg-8 col-md-10 col-sm-12">
                                                        <input type="text"
                                                            class="form-control @error('namaKomponen') is-invalid @enderror"
                                                            id="namaKomponen" name="namaKomponen"
                                                            value="{{ old('namaKomponen') }}" autofocus>
                                                        @error('namaKomponen')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for=""
                                                        class="col-lg-2 col-md-10 col-sm-12 col-form-label">COA</label>
                                                    <div class="col-lg-8 col-md-10 col-sm-12">
                                                        <select class="form-select" name="coa" id="coa">
                                                            <option>Pilih COA Pendapatan</option>
                                                            @foreach ($coaPendapatan as $data)
                                                            @if (old('coa') == $data['nama'])
                                                            <option value="{{ $data['nama'] }} selected">
                                                                {{ $data['nama'] }}
                                                            </option>
                                                            @else
                                                            <option value="{{ $data['nama'] }}">
                                                                {{ $data['nama'] }}
                                                            </option>
                                                            @endif
                                                            @endforeach

                                                        </select>
                                                         @error('coa')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for=""
                                                        class="col-lg-2 col-md-10 col-sm-12 col-form-label">Satuan</label>
                                                    <div class="col-lg-8 col-md-10 col-sm-12">
                                                        <select class="form-select @error('satuan') is-invalid @enderror"
                                                            aria-label=".form-select-sm example" id="satuan"
                                                            name="satuan">
                                                            <option value="" selected>Pilih Satuan</option>
                                                            <option value="Semester">Semester</option>
                                                            <option value="Course">Course</option>
                                                            <option value="Kredit">Kredit</option>
                                                            <option value="Event">Event</option>
                                                        </select>
                                                        @error('satuan')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="mb-4 row">
                                                    <label for=""
                                                        class="col-lg-2 col-md-10 col-sm-12 col-form-label">Keterangan</label>
                                                    <div class="col-lg-8 col-md-10 col-sm-12">
                                                        <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan"
                                                            rows="5"></textarea>
                                                        @error('keterangan')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-primary mx-2"
                                                    style="float:right">Simpan</button>
                                                <a href="{{ route('komponenBiaya.index') }}" class=" btn btn-danger"
                                                    style="float:right">Batal</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </section>
    </div>
@endsection
