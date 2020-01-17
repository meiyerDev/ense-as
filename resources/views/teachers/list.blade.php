@extends('layouts.template')

@section('content')
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<div class="breadcome-heading">
		<form role="search" class="sr-input-func">
			<input type="text" placeholder="Search..." class="search-int form-control">
			<a href="#"><i class="fa fa-search"></i></a>
		</form>
	</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<ul class="breadcome-menu">
		<li><a href="#">Inicio</a> <span class="bread-slash">/</span>
		</li>
		<li><span class="bread-blod">Todos los Profesores</span>
		</li>
	</ul>
</div>
<div class="col-sm-12 row">
	@foreach ($teachers as $teacher)
	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
		<div class="hpanel hblue contact-panel contact-panel-cs responsive-mg-b-30">
			<div class="panel-body custom-panel-jw">
				<img alt="logo" class="img-circle m-b" src="{{ asset('assets/img/contact/1.jpg') }}">
				<h3><a href="#">{{ $teacher->firstname }}</a></h3>
				<p class="all-pro-ad">{{ $teacher->curse->grade }} grado sección {{ $teacher->curse->section }}</p>
				<p>
					{{ $teacher->address }}
				</p>
			</div>
			<div class="panel-footer contact-footer">
				<div class="professor-stds-int">
					<div class="professor-stds">
						<div class="contact-stat"><span>Estudiantes: </span> <br><strong>
							@if (!empty($teacher->curse) && !empty($teacher->curse->students))
								{{ count($teacher->curse->students) }}
							@endif
						</strong></div>
					</div>
					<div class="professor-stds">
						<div class="contact-stat"><br>
							<a href="{{ route('teacher.view',$teacher->identity) }}">
								<strong>Ver Profesor</strong>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach
	{{-- <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
		<div class="hpanel hblue contact-panel contact-panel-cs responsive-mg-b-30">
			<div class="panel-body custom-panel-jw">
				<div class="social-media-in">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-pinterest"></i></a>
				</div>
				<img alt="logo" class="img-circle m-b" src="{{ asset('assets/img/contact/2.jpg') }}">
				<h3><a href="">Amir dex</a></h3>
				<p class="all-pro-ad">Pakistan, Los</p>
				<p>
					Lorem ipsum dolor sit amet of, consectetur adipiscing elitable. Vestibulum tincidunt est vitae ultrices accumsan.
				</p>
			</div>
			<div class="panel-footer contact-footer">
				<div class="professor-stds-int">
					<div class="professor-stds">
						<div class="contact-stat"><span>Likes: </span> <strong>956</strong></div>
					</div>
					<div class="professor-stds">
						<div class="contact-stat"><span>Comments: </span> <strong>350</strong></div>
					</div>
					<div class="professor-stds">
						<div class="contact-stat"><span>Views: </span> <strong>450</strong></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
		<div class="hpanel hblue contact-panel contact-panel-cs responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
			<div class="panel-body custom-panel-jw">
				<div class="social-media-in">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-pinterest"></i></a>
				</div>
				<img alt="logo" class="img-circle m-b" src="{{ asset('assets/img/contact/3.jpg') }}">
				<h3><a href="">Alva Adition</a></h3>
				<p class="all-pro-ad">India, Col</p>
				<p>
					Lorem ipsum dolor sit amet of, consectetur adipiscing elitable. Vestibulum tincidunt est vitae ultrices accumsan.
				</p>
			</div>
			<div class="panel-footer contact-footer">
				<div class="professor-stds-int">
					<div class="professor-stds">
						<div class="contact-stat"><span>Likes: </span> <strong>956</strong></div>
					</div>
					<div class="professor-stds">
						<div class="contact-stat"><span>Comments: </span> <strong>350</strong></div>
					</div>
					<div class="professor-stds">
						<div class="contact-stat"><span>Views: </span> <strong>450</strong></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
		<div class="hpanel hblue contact-panel contact-panel-cs res-tablet-mg-t-30 dk-res-t-pro-30">
			<div class="panel-body custom-panel-jw">
				<div class="social-media-in">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-pinterest"></i></a>
				</div>
				<img alt="logo" class="img-circle m-b" src="{{ asset('assets/img/contact/4.jpg') }}">
				<h3><a href="">Sex Dog</a></h3>
				<p class="all-pro-ad">Uk, LA</p>
				<p>
					Lorem ipsum dolor sit amet of, consectetur adipiscing elitable. Vestibulum tincidunt est vitae ultrices accumsan.
				</p>
			</div>
			<div class="panel-footer contact-footer">
				<div class="professor-stds-int">
					<div class="professor-stds">
						<div class="contact-stat"><span>Likes: </span> <strong>956</strong></div>
					</div>
					<div class="professor-stds">
						<div class="contact-stat"><span>Comments: </span> <strong>350</strong></div>
					</div>
					<div class="professor-stds">
						<div class="contact-stat"><span>Views: </span> <strong>450</strong></div>
					</div>
				</div>
			</div>
		</div>
	</div> --}}
</div>
@endsection