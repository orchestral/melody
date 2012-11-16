<div class="navbar">
  <div class="navbar-inner">

  		<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target="#cellonav">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		
		{{ HTML::link(handles('orchestra::manages/melody.themes'), 'Themes Manager', array('class' => 'brand')) }}

		<div id="cellonav" class="collapse nav-collapse">
		  	<ul class="nav">
				<li class="{{ URI::is('*/manages/melody.themes/frontend*') ? 'active' : '' }}">
					{{ HTML::link(handles('orchestra::manages/melody.themes/frontend'), 'Frontend') }}
				</li>
				<li class="{{ URI::is('*/manages/melody.themes/backend*') ? 'active' : '' }}">
					{{ HTML::link(handles('orchestra::manages/melody.themes/backend'), 'Backend') }}
				</li>
			</ul>
		</div>
	</div>
</div>