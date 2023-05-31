@extends('layouts.main')
@section('content')
  <div class="container-fluid">
    <section class="content p-2">
      <section class="card p-2">
        <div class="row p-3">
          <div class="col-12">
            <h1>Create Article</h1>
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
                      <form action="" method="post">
                        @csrf
                        <div class="mb-3 row">
                          <label for="" class="col-lg-2 col-md-10 col-sm-12 col-form-label">Title</label>
                          <div class="col-lg-8 col-md-10 col-sm-12">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                              name="title" value="{{ old('title') }}" autofocus>
                            @error('title')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>

                        <div class="mb-3 row">
                          <label for="" class="col-lg-2 col-md-10 col-sm-12 col-form-label">Image</label>
                          <div class="col-lg-8 col-md-10 col-sm-12">
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                              name="image" required accept="image/*"
                              onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                            @error('image')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>

                        <div class="mb-3">
                          <img src="" id="output" width="500" style="margin-left: 200px;">
                        </div>

                        <div class="mb-4 row">
                          <label for="" class="col-lg-2 col-md-10 col-sm-12 col-form-label">Content</label>
                          <div class="col-lg-8 col-md-10 col-sm-12">
                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5"></textarea>
                            @error('content')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>

                        <button type="submit" class="btn btn-primary mx-2" style="float:right">Save</button>
                        <a href="" class=" btn btn-danger" style="float:right">Cancle</a>
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
