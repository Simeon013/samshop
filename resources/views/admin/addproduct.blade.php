@section('title')
    Ajouter Produit - SamShop
@endsection

@extends('layout.appadmin')

@section('contenu')
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Création/</span> Ajouter produit</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Ajouter un nouveau produit</h5>
                    </div>
                    <div class="card-body">
                      {!! Form::open(['action' => 'App\Http\Controllers\ProductController@saveproduct' , 'method' => 'POST']) !!}
                      {{ csrf_field() }}

                        <div class="row mb-3">
                          {!! Form::label('', 'Nom du produit', ['for' => 'pname' , 'class' => 'col-sm-2 col-form-label']) !!}
                          <div class="col-sm-10">
                            {!! Form::text('product_name', '', ['class' => 'form-control' , 'id' => 'pname' , 'placeholder' => 'Pull']) !!}
                          </div>
                        </div>

                        <div class="row mb-3">
                          {!! Form::label('', 'Prix du produit', ['for' => 'price' , 'class' => 'col-sm-2 col-form-label']) !!}
                          <div class="col-sm-10">
                            {{-- <span class="input-group-text">$</span> --}}
                            {!! Form::number('product_price', '', ['class' => 'form-control' , 'id' => 'price' , 'placeholder' => '1500']) !!}
                            {{-- <span class="input-group-text">.00</span> --}}
                          </div>
                        </div>

                        <div class="row mb-3">
                          {!! Form::label('', 'Catégorie', ['for' => 'cname' , 'class' => 'col-sm-2 col-form-label']) !!}
                          <div class="col-sm-10">
                            {{-- {!! Form::text('category_name', '', ['class' => 'form-control' , 'id' => 'cname' , 'placeholder' => 'Vêtement']) !!} --}}
                          </div>
                        </div>
                        <div class="row mb-3">
                          {!! Form::label('', 'Image', ['for' => 'pimage' , 'class' => 'col-sm-2 col-form-label']) !!}
                          <div class="col-sm-10">
                            {!! Form::file('product_image', ['class' => 'form-control' , 'id' => 'pimage' ]) !!}
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
