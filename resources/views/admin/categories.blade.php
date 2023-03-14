@section('title')
    Listes des categories - SamShop
@endsection

{!! Form::hidden('',$increment=1) !!}

@extends('layout.appadmin')

@section('contenu')
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Affichage /</span> Catégories</h4>

              <!-- Hoverable Table rows -->
              <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Liste des catégories</h5>
                    <small class="text-muted float-end">
                        <a href="{{route('addcategory')}}" class="btn rounded-pill btn-outline-primary">
                            <span class="tf-icons bx bx-edit-alt"></span>&nbsp; Ajouter une catégorie
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
                        <th>Nom de la catégorie</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($categories as $category)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$increment}}</strong></td>
                            <td>{{$category->category_name}}</td>
                            <div class="dropdown">
                                <td>
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" id="edit" onclick="window.location ='{{route('editcategory', $category->id)}}'">
                                            <i class="bx bx-edit-alt me-1"></i> Editer
                                        </a>
                                        <a class="dropdown-item" href="{{route('deletecategory',$category->id)}}" id="delete">
                                            <i class="bx bx-trash me-1"></i> Suprimer
                                        </a>
                                    </div>
                                </td>
                            </div>
                          </tr>
                          {!! Form::hidden('', $increment= $increment+1) !!}
                        @endforeach
                    </tbody>
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
