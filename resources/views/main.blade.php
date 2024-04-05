<!doctype html>
<html class="fixed">

    @include('head')

	<body>
		<section class="body">
            @yield('content')
		</section>
        
        @include('scripts')
		@yield('pagescripts')
		@livewireScripts
	</body>
</html>