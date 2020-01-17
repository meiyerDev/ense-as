@extends('layouts.template')

@section('my_css')
<link rel="stylesheet" href="{{ asset('assets/css/datapicker/datepicker3.css') }}">
@endsection

@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="product-payment-inner-st">
    <ul id="myTabedu1" class="tab-review-design">
      <li class="active"><a href="#description">Basic Information</a></li>
    </ul>
    <div id="myTabContent" class="tab-content custom-product-edit">
      <div class="product-tab-list tab-pane fade active in" id="description">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="review-content-section">
              <div id="dropzone1" class="pro-ad">
                <form action="" method="POST">
                  @csrf
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group">
                        <label for="identity" class="form-control-label">Cédula de Identidad</label>
                        <input
                          name="identity"
                          id="identity"
                          type="text"
                          class="form-control"
                          placeholder="Cédula de Identidad"
                          required=""
                          value="{{ old('identity') }}"
                        >
                      </div>
                      <div class="form-group">
                        <label for="firstname" class="form-control-label">Nombre Completo</label>
                        <input
                          name="firstname"
                          id="firstname"
                          type="text"
                          class="form-control"
                          placeholder="Nombre Completo"
                          required=""
                          value="{{ old('firstname') }}"
                        >
                      </div>
                      <div class="form-group">
                        <label for="gender" class="form-control-label">Género</label>
                        <select
                          name="gender"
                          id="gender"
                          class="form-control"
                        >
                          <option value="none" disabled="">Seleccionar Género</option>
                          <option
                            value="F"
                            @if (old('gender') == 'F')
                              selected=""
                            @endif
                          >Mujer</option>
                          <option
                            value="M"
                            @if (old('gender') == 'M')
                              selected=""
                            @endif
                          >Hombre</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="finish" class="form-control-label">Fecha de Nacimiento</label>
                        <input
                          name="finish"
                          id="finish"
                          type="text"
                          class="form-control"
                          placeholder="Fecha de Nacimiento"
                          required=""
                          value="{{ old('finish') }}"
                        >
                      </div>
                      <div class="form-group">
                        <label for="mobileno" class="form-control-label">Número de Teléfono</label>
                        <input
                          name="mobileno"
                          id="mobileno"
                          type="text"
                          class="form-control"
                          placeholder="Número Telefónico."
                          required=""
                          value="{{ old('mobileno') }}"
                        >
                      </div>
                      <div class="form-group">
                        <label for="address" class="form-control-label">Dirección</label>
                        <textarea
                          name="address"
                          id="address"
                          class="form-control"
                          cols="30"
                          rows="10"
                          required=""
                        >{{ old('address') }}</textarea>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group">
                        <label for="imageico" class="form-control-label">Imagen de Perfil (opcional)</label>
                        <input
                          name="imageico"
                          id="imageico"
                          class="form-control"
                          type="file"
                          value="{{ old('imageico') }}"
                        />
                      </div>
                      <div class="form-group">
                        <label for="curse" class="form-control-label">Curso</label>
                        <select
                          name="curse_id"
                          id="curse"
                          class="form-control"
                          required=""
                        >
                          <option value="none" selected="" disabled="">Seleccionar Curso</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="email" class="form-control-label">Correo Electrónico</label>
                        <input
                          type="text"
                          class="form-control"
                          name="email"
                          id="email"
                          placeholder="Correo Electrónico."
                          required=""
                          value="{{ old('email') }}"
                        >
                      </div>
                      <div class="form-group">
                        <label for="password" class="form-control-label">Contraseña</label>
                        <input
                          name="password"
                          id="password"
                          type="password"
                          class="form-control"
                          placeholder="Password"
                          required=""
                        >
                      </div>
                      <div class="form-group">
                        <label for="confarmpassword" class="form-control-label">Repetir Contraseña</label>
                        <input
                          name="confarmpassword"
                          id="confarmpassword"
                          type="password"
                          class="form-control"
                          placeholder="Confirm Password"
                          required=""
                        >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 text-center">
                      <button type="submit" class="btn btn-lg col-sm-12 btn-primary waves-effect waves-light" id="submitForm">Guardar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('my_js')
<script src="{{ asset('assets/js/datapicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('js/teachers/addTeacher.js') }}"></script>
@endsection