@section('title')
    Modifier Categorie - SamShop
@endsection

@extends('layout.appadmin')

@section('contenu')
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Création/</span> Modifier catégorie</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Modifier une nouvelle catégorie</h5>
                    </div>
                    <div class="card-body">

                        @if (Session::has('status'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('status')}}
                            </div>
                        @endif

                        @if (count($errors)>0)
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                      {!! Form::open(['action' => 'App\Http\Controllers\CategoryController@updatecategory' , 'method' => 'POST']) !!}
                      {{ csrf_field() }}
                        <div class="row mb-3">
                          {!! Form::hidden('id',$category->id) !!}
                          {!! Form::label('', 'Nom de la catégorie', ['for' => 'cname' , 'class' => 'col-sm-2 col-form-label']) !!}
                          <div class="col-sm-10">
                            {!! Form::text('category_name', $category->category_name, ['class' => 'form-control' , 'id' => 'cname' , 'placeholder' => 'Vêtement']) !!}
                          </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                {!! Form::submit('Modifier', ['class' => 'btn btn-primary']) !!}
                            </div>
                          </div>
                      {!!Form::close()!!}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->
@endsection
