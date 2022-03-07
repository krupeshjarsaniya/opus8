<header class="remedy-headerbar">
	<div class="container">
		<div class="row align-item-center">
			@if (Auth::check())
				<a href="{{ url('/agent') }}" class="remedy-logo-block"><img src="{{ asset('assets/images/remedy-logo.png')}}" alt="remedy"></a>
				<div class="text-right btn-logout">
					<a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="remedy-agent-btn">Logout</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST">
						@csrf
					</form>
				</div>
			@else
				<a href="{{ url('/') }}" class="remedy-logo-block"><img src="{{ asset('assets/images/remedy-logo.png')}}" alt="remedy"></a>
			@endif

		</div>
	</div>
</header>