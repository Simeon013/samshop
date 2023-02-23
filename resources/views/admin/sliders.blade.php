@section('title')
    Listes des sliders - SamShop
@endsection

{!! Form::hidden('',$increment=1) !!}

@extends('layout.appadmin')

@section('contenu')
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Affichage /</span> Sliders</h4>

              <!-- Hoverable Table rows -->
              <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Liste des sliders</h5>
                    <small class="text-muted float-end">
                        <a href="{{URL::to('/addslider')}}" class="btn rounded-pill btn-outline-primary">
                            <span class="tf-icons bx bx-edit-alt"></span>&nbsp; Ajouter un slider
                        </a>
                    </small>
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
                </div>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover" id="order-listing">
                    <thead>
                      <tr>
                        <th>Order #</th>
                        <th>Image</th>
                        <th>Description one</th>
                        <th>Description two</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    @foreach ($sliders as $slider)
                    <tbody class="table-border-bottom-0">
                        <tr>
                          <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$increment}}</strong></td>
                          <td>
                              <img src="/storage/slider_images/{{$slider->slider_image}}" class=" rounded-circle avatar pull-up" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{$slider->slider_name}}">
                          </td>
                          <td>{{$slider->description1}}</td>
                          <td>{{$slider->description2}}</td>
                          <td>
                              @if ($slider->status)
                                  <span class="badge bg-label-success rounded-pill me-1">Activé</span>
                              @else
                                  <span class="badge bg-label-warning rounded-pill me-1">Desactivé</span>
                              @endif
                          </td>
                          <div class="dropdown">
                              <td>
                                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                  <i class="bx bx-dots-vertical-rounded"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                      <a class="dropdown-item" onclick="window.location ='{{URL('/editslider/'.$slider->id)}}'">
                                          <i class="bx bx-edit-alt me-1"></i> Editer
                                      </a>
                                      <a class="dropdown-item" href="{{('/deleteslider/'.$slider->id)}}" id="delete">
                                          <i class="bx bx-trash me-1"></i> Suprimer
                                      </a>
                                      @if ($slider->status == 1)
                                      <a class="dropdown-item" onclick="window.location ='{{URL('/desactiverslider/'.$slider->id)}}'">
                                          <i class="bx bx-x me-1"></i> Désactiver
                                      </a>
                                      @else
                                      <a class="dropdown-item" onclick="window.location ='{{URL('/activerslider/'.$slider->id)}}'">
                                          <i class="bx bx-check me-1"></i> Activer
                                      </a>
                                      @endif
                                  </div>
                              </td>
                          </div>
                        </tr>
                        {!! Form::hidden('', $increment= $increment+1) !!}
                      </tbody>
                    @endforeach
                  </table>
                </div>
              </div>
              <!--/ Hoverable Table rows -->

              <hr class="my-5" />

            </div>
            <!-- / Content -->

@endsection

@section('scripts')
    <script src="backoffice/assets/vendor/js/data-table.js"></script>
@endsection
