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
                          value="{{ old('identity') }}"
                        >
                      </div>
                      <div class="form-group">
                        <label for="firstname" class="form-control-label">Nombres</label>
                        <input
                          name="firstname"
                          id="firstname"
                          type="text"
                          class="form-control"
                          placeholder="Nombres"
                          required=""
                          value="{{ old('firstname') }}"
                        >
                      </div>
                      <div class="form-group">
                        <label for="lastname" class="form-control-label">Apellidos</label>
                        <input
                          name="lastname"
                          id="lastname"
                          type="text"
                          class="form-control"
                          placeholder="Apellidos"
                          required=""
                          value="{{ old('lastname') }}"
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
                            value="Femenino"
                            @if (old('gender') == 'Femenino')
                              selected=""
                            @endif
                          >Mujer</option>
                          <option
                            value="Masculino"
                            @if (old('gender') == 'Masculino')
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
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group">
                        <label for="representant" class="form-control-label">Nombre del Representante</label>
                        <input
                          name="representant"
                          id="representant"
                          class="form-control"
                          type="text"
                          placeholder="Ingrese Nombre del Representante"
                          required=""
                          value="{{ old('representant') }}"
                        />
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

                      @if (\Auth::user()->type === 'director' || \Auth::user()->type === 'admin')
                      <div class="form-group">
                        <label for="curse" class="form-control-label">Curso</label>
                        <select
                          name="curse_id"
                          id="curse"
                          class="form-control"
                          required=""
                        >studentAdd
                          <option value="none" selected="" disabled="">Seleccionar Curso</option>
                          @foreach ($curses as $curse)
                          <option value="{{ $curse->id }}" @if ($curse->id == old('curse_id')) selected="" @endif>{{ $curse->grade }} Grado Sección {{ $curse->section }}</option>
                          @endforeach
                        </select>
                      </div>
                      @endif
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
<script>
  $(document).ready( () => {

  $('#finish').datepicker({
    format: "dd-mm-yyyy",
    endDate: "today",
    startView: 2,
    language: "es",
    autoclose: true,
    todayHighlight: true
  });

  $.ajax({
    url : `/admin/ajax/curse/all`,
    method : 'GET',
    success : response => {
      if (response.length > 0) {
        $.each(response,(r,curse)=>{
          $('select[name="curse_id"]').append(`<option value="${curse.id}">${curse.grade} grado - sección ${curse.section}</option>`)
        })
      }else{
        Swal.fire({
          type: 'warning',
          title: 'Error',
          text: 'Debe Cargar Al menos Un Curso.',
        }).then(result => {
          window.location = `/home`; 
        });
      }
    },
    error: e => {
      Swal.fire({
        type: 'error',
        title: 'Error',
        text: 'Ha fallado la Conexión, por favor Recargue la pagina.',
      }).then(result => {
        window.location.reload();
      });
    }
  })
})
</script>
@endsection