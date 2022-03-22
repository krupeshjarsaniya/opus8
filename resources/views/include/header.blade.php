<header class="remedy-headerbar">
	<div class="container">
		<div class="row ">
			@if (Auth::check())

				<div class="col-lg-12  ">
					<a href="{{ url('/agent') }}" class="remedy-logo-block"><img src="{{ asset('assets/images/remedy-logo.png')}}" alt="remedy"></a>
				</div>
				<div class="col-lg-12  text-center btn-logout ">
						<nav class=" navbar nav-color navbar-light navbar-expand-sm justify-content-center sticky-top">
							<button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nbar">
							<span class="navbar-toggler-icon text-white"></span>
							</button>
							<div class="collapse navbar-collapse justify-content-center" id="nbar">	
							<ul class="navbar-nav text-center">
						      <li class="nav-item active ml-lg-2 mx-5 my-1 m-lg-0 m-md-1">
						        <a href="{{ route('bill.chart') }}" class="remedy-agent-btn nav-link text-white">Bill Chart</a>
						      </li>
						      <li class="nav-item active ml-lg-2 mx-5 my-1 m-lg-0 m-md-1">
						         <a href="{{ route('bill.form') }}" class="remedy-agent-btn nav-link text-white" >Bill Form</a>
						      </li>
						      <li class="nav-item active ml-lg-2 mx-5 my-1 m-lg-0 m-md-1">
						       <a href="{{ route('psls') }}" class="remedy-agent-btn nav-link text-white">Psls</a>
						      </li>
						      <li class="nav-item active ml-lg-2 mx-5 my-1 m-lg-0 m-md-1">
						       <a href="{{ route('industry') }}" class="remedy-agent-btn nav-link text-white">Industry</a>
						      </li>
						      <li class="nav-item active ml-lg-2 mx-5 my-1 m-lg-0 m-md-1">
						       <a href="{{ route('signup') }}" class="remedy-agent-btn nav-link text-white">Signup Form</a>
						      </li>
						      <li class="nav-item active ml-lg-2 mx-5 my-1 m-lg-0 m-md-1">
						       <a href="{{ route('signup.chart') }}" class="remedy-agent-btn nav-link text-white">Signup Chart</a>
						      </li>
						      <li class="nav-item active ml-lg-2 mx-5 my-1 m-lg-0 m-md-1">
						       <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="remedy-agent-btn nav-link text-white">Logout</a>
						        <form id="logout-form" action="{{ route('logout') }}" method="POST">
									@csrf
								</form>
						      </li>
						    </ul>
							
							</div>
						</nav>
				</div>
			@else
				<a href="{{ url('/') }}" class="remedy-logo-block"><img src="{{ asset('assets/images/remedy-logo.png')}}" alt="remedy"></a>
			@endif

		</div>
	</div>
</header>