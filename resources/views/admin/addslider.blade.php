@section('title')
    Ajouter Slider - SamShop
@endsection

@extends('layout.appadmin')

@section('contenu')
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Création/</span> Ajouter slider</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Ajouter un nouveau slider</h5>
                    </div>
                    <div class="card-body">
                      {!! Form::open(['action' => 'App\Http\Controllers\SliderController@saveslider' , 'method' => 'POST']) !!}
                      {{ csrf_field() }}

                        <div class="row mb-3">
                          {!! Form::label('', 'Description one', ['for' => 'description' , 'class' => 'col-sm-2 col-form-label']) !!}
                          <div class="col-sm-10">
                            {!! Form::text('description1', '', ['class' => 'form-control' , 'id' => 'description' , 'placeholder' => 'Premiere description du slider']) !!}
                          </div>
                        </div>

                        <div class="row mb-3">
                          {!! Form::label('', 'Description two', ['for' => 'description' , 'class' => 'col-sm-2 col-form-label']) !!}
                          <div class="col-sm-10">
                            {!! Form::text('description2', '', ['class' => 'form-control' , 'id' => 'description' , 'placeholder' => 'Premiere description du slider']) !!}
                          </div>
                        </div>

                        <div class="row mb-3">
                          {!! Form::label('', 'Image', ['for' => 'simage' , 'class' => 'col-sm-2 col-form-label']) !!}
                          <div class="col-sm-10">
                            {!! Form::file('slider_image', ['class' => 'form-control' , 'id' => 'simage' ]) !!}
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
