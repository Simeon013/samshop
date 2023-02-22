@section('title')
    Ajouter Categorie - SamShop
@endsection

@extends('layout.appadmin')

@section('contenu')
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Création/</span> Ajouter catégorie</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Ajouter une nouvelle catégorie</h5>
                    </div>
                    <div class="card-body">
                      {!! Form::open(['action' => 'App\Http\Controllers\CategoryController@savecategory' , 'method' => 'POST']) !!}
                      {{ csrf_field() }}
                        <div class="row mb-3">
                          {!! Form::label('', 'Nom de la catégorie', ['for' => 'cname' , 'class' => 'col-sm-2 col-form-label']) !!}
                          <div class="col-sm-10">
                            {!! Form::text('category_name', '', ['class' => 'form-control' , 'id' => 'cname' , 'placeholder' => 'Vêtement']) !!}
                          </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                {!! Form::submit('Ajouter', ['class' => 'btn btn-primary']) !!}
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
