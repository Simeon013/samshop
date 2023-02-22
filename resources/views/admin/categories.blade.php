@section('title')
    Listes des categories - SamShop
@endsection

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
                        <a href="{{URL::to('/addcategory')}}" class="btn rounded-pill btn-outline-primary">
                            <span class="tf-icons bx bx-edit-alt"></span>&nbsp; Ajouter une catégorie
                        </a>
                    </small>
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
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1</strong></td>
                        <td>Vetements</td>
                        {{-- <td>
                          <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              class="avatar avatar-xs pull-up"
                              title="Lilian Fuller"
                            >
                              <img src="backoffice/assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              class="avatar avatar-xs pull-up"
                              title="Sophia Wilkerson"
                            >
                              <img src="backoffice/assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                            </li>
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              class="avatar avatar-xs pull-up"
                              title="Christina Parker"
                            >
                              <img src="backoffice/assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                            </li>
                          </ul>
                        </td> --}}
                        {{-- <td><span class="badge bg-label-primary me-1">Active</span></td> --}}
                        <div class="dropdown">
                            <td>
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);">
                                        <i class="bx bx-edit-alt me-1"></i> Editer
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0);">
                                        <i class="bx bx-trash me-1"></i> Suprimer
                                    </a>
                                </div>
                            </td>
                        </div>
                      </tr>
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
