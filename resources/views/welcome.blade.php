@extends('layouts.base')

@section('content')
<link rel="stylesheet" href="/css/landing.css">
<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
	<header class="masthead mb-auto">
		<div class="inner">
			<h3 class="masthead-brand">Cover</h3>
			<nav class="nav nav-masthead justify-content-center">
				<a class="nav-link active" href="#">Here</a>
				<a class="nav-link" href="/login">Login</a>
				<a class="nav-link" href="/register">Register</a>
			</nav>
		</div>
	</header>
	<main role="main" class="inner cover">
		<h1 class="cover-heading">Epic</h1>
		<p class="lead">To use Slaplayer you must either login or register</p>
		<p class="lead">
			<a href="#" class="btn btn-primary">Login</a>
			<a href="#" class="btn btn-primary">Register</a>
		</p>
	</main>

	<footer class="mastfoot mt-auto">
		<div class="inner">
			<p>Footer</p>
		</div>
	</footer>
</div>
@endsection