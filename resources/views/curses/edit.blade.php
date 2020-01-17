@extends('layouts.template')

@section('my_css')
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
                <form action="{{ route('curses.send.edit',$curse->id) }}" method="POST">
                  @csrf
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="form-group col-sm-6">
                        <label for="grade" class="form-control-label">Grado</label>
                        <input
                          name="grade"
                          id="grade"
                          type="text"
                          class="form-control"
                          placeholder="Grado"
                          required=""
                          value="{{ $curse->grade }}"
                        >
                      </div>
                      <div class="form-group col-sm-6">
                        <label for="section" class="form-control-label">Sección</label>
                        <input
                          name="section"
                          id="section"
                          type="text"
                          class="form-control"
                          placeholder="Sección"
                          required=""
                          value="{{ $curse->section }}"
                        >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 text-center">
                      <button type="submit" class="btn btn-lg col-sm-12 btn-primary waves-effect waves-light" id="submitForm">Editar</button>
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
@endsection