@section('melody::primary_menu')
<ul class="nav">
	<li class="{{ URI::is('*/manages/melody.themes/frontend*') ? 'active' : '' }}">
		{{ HTML::link(handles('orchestra::manages/melody.themes/frontend'), 'Frontend') }}
	</li>
	<li class="{{ URI::is('*/manages/melody.themes/backend*') ? 'active' : '' }}">
		{{ HTML::link(handles('orchestra::manages/melody.themes/backend'), 'Backend') }}
	</li>
</ul>
@endsection

<?php

$navbar = new Orchestra\Fluent(array(
	'id'             => 'melody',
	'title'          => 'Theme Manager',
	'url'            => handles('orchestra::manages/melody.themes'),
	'primary_menu'   => Laravel\Section::yield('melody::primary_menu'),
)); ?>

{{ Orchestra\Decorator::navbar($navbar) }}