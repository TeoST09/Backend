<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{asset('css/das.css')}}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" href="{{asset('Media/logo.png')}}" type="image/png')}}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
						StarMax
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
            

            <div class="container-items">
			<div class="item">
				<figure>
                <img src="{{ asset('Media/netflix.png') }}" alt="Producto">
				</figure>
				<div class="info-product">
					<h2>Netflix</h2>
					<p class="price">10,000</p>
					<button>Añadir al carrito</button>
				</div>
			</div>

			<div class="item">
				<figure>
                <img src="{{ asset('Media/plex.png') }}" alt="Producto">
				</figure>
				<div class="info-product">
					<h2>Plex</h2>
					<p class="price">7,000</p>
					<button>Añadir al carrito</button>
				</div>
			</div>
            
			<div class="item">
				<figure>
					 <img src="{{ asset('Media/HBO_MAX.png') }}"
						alt="producto"
					/>
				</figure>
				<div class="info-product">
					<h2>Max</h2>
					<p class="price">3,500</p>
					<button>Añadir al carrito</button>
				</div>
			</div>
			<div class="item">
				<figure>
					 <img src="{{ asset('Media/paramount.png') }}"    
						alt="producto"
					/>
				</figure>
				<div class="info-product">
					<h2>Paramount</h2>
					<p class="price">8,000</p>
					<button>Añadir al carrito</button>
				</div>
			</div>
			<div class="item">
				<figure>
						 <img src="{{ asset('Media/disney.png') }}"
						alt="producto"
					/>
				</figure>
				<div class="info-product">
					<h2>disney</h2>
					<p class="price">10,000</p>
					<button>Añadir al carrito</button>
				</div>
			</div>
			<div class="item">
				<figure>
					 <img src="{{ asset('Media/primevideo.png') }}"
						alt="producto"
					/>
				</figure>
				<div class="info-product">
					<h2>Prime Video</h2>
					<p class="price">6,000</p>
					<button>Añadir al carrito</button>
				</div>
			</div>
		</div>
            </main>
        </div>
    </body>
</html>
