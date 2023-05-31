@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Dashboard') }}</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            {{ __('You are logged in!') }}
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <section class="content p-2">
        <section class="card p-2">
          <div class="row p-3">
            <div class="col-12">
              <h1>List Articles</h1>
              <a href="" class="btn btn-primary mt-1" style="float:right;"><i class="fa-solid fa-plus"></i> Add
                Article</a>
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
                        <table id="tableAll" class="table table-hover table-striped" style="width:100%">
                          <thead>
                            <th>No.</th>
                            <th style="width: 800px">Title</th>
                            <th>Action</th>
                          </thead>
                          <tbody>

                            <tr>
                              <td></td>
                              <td></td>
                              <td>
                                <a href="" class=" btn btn-success btn-sm mx-2">Detail</i></a>
                                <a href="" class=" btn btn-warning btn-sm">Edit</a>
                                <form action="" method="POST" class="d-inline">
                                  @csrf
                                  @method('delete')
                                  <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Ingin Hapus Data?')">Delete</button>
                                </form>
                              </td>
                            </tr>
                          </tbody>
                        </table>
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
  </div>
@endsection
