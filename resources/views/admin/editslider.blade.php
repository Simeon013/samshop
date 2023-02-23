@section('title')
    Modifier Slider - SamShop
@endsection

@extends('layout.appadmin')

@section('contenu')
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Création/</span> Modifier slider</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Modifier un nouveau slider</h5>
                    </div>
                    <div class="card-body">

                        @if (Session::has('status'))
                            <div class="alert alert-success">
                                {{Session::get('status')}}
                            </div>
                        @endif

                        @if (count($errors)>0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                      {!! Form::open(['action' => 'App\Http\Controllers\SliderController@updateslider' , 'method' => 'POST'  , 'enctype' => 'multipart/form-data']) !!}
                      {{ csrf_field() }}

                        <div class="row mb-3">
                            {!! Form::hidden('id', $slider->id) !!}
                            {!! Form::label('', 'Description one', ['for' => 'description' , 'class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('description1', $slider->description1, ['class' => 'form-control' , 'id' => 'description' , 'placeholder' => 'Premiere description du slider']) !!}
                            </div>
                        </div>

                        <div class="row mb-3">
                          {!! Form::label('', 'Description two', ['for' => 'description' , 'class' => 'col-sm-2 col-form-label']) !!}
                          <div class="col-sm-10">
                            {!! Form::text('description2', $slider->description2, ['class' => 'form-control' , 'id' => 'description' , 'placeholder' => 'Premiere description du slider']) !!}
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
