<?php $capacity = App\User::capacity(); ?>

@extends('layouts.master')
@section('title')
	Lantern &dash; Go out. Discover your city.
@endsection

@section('page_title')
	<h1>Go out. Discover your city.</h1>
@endsection

@section('content')
		<div class="row">
			<div class="content col-md-offset-2 col-md-8">
				<p>Introducing a new way to enjoy your city's nightlife.<br />Get in line to gain access to exclusive deals.</p>
				<p>{{ $capacity }}</p>
			</div>
		</div>
		<div class="row">

			<!-- mobile number -->
			<form action="/user" method="POST">

				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="mobile-number col-md-8 col-md-offset-2">
					<div class="input-group">
						<input type="tel" name="phone" class="form-control" placeholder="Mobile Number" maxlength="15" style="font-size: 18px; font-weight: 500;">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit" style="font-size: 18px; font-weight: 500;">Get Invited</button>
						</span>
					</div>
				</div>
			</form>

			<!-- city table -->
			<div class="city-table col-md-8 col-md-offset-2">
				<div class="city-row">
					<div class="city col-md-6">
						<p>San Antonio, TX</p>
					</div>
					<div class="active col-md-6">
						<p class="small">30% Spots Left</p>
						<div id="progress-bar-container-78205" class="progress-bar">
						</div>
					</div>
				</div>
				<div class="city-row">
					<div class="city col-md-6">
						<p>Austin, TX</p>
					</div>
					<div class="active col-md-6">
						<p class="small">Coming Soon</p>
						<div id="progress-bar-container-78701"></div>
					</div>
				</div>
			</div>
		</div>
@endsection

@section('scripts')
	<script src="/js/nanobar.min.js"></script>
	<script>
		var options = {
		  	id: 'progress-bar-78205',
		  	classname: '',
		  	target: document.getElementById('progress-bar-container-78205')
		};

		var nanobar = new Nanobar( options );

		// move bar
		setTimeout(function() {
			nanobar.go( 30 ); // size bar 30%
		}, 1000);
		
		// nanobar.go( 76 ); // size bar 76%

		// size bar 100% and and finish
		// nanobar.go(90);
	</script>
@endsection