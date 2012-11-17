@include(locate('melody::widgets.menu'))

<div class="container">
	<div class="row">

		@forelse ($themes as $theme_id => $theme)

		<div class="themes span4 well">
			{{ HTML::image('themes/'.$theme_id.'/screenshot.png') }}
			<h3>{{ $theme->name }}</h3>
			<p>{{ $theme->description }}</p>

			<div>
			@if ($theme_id === $current_theme)
				<button class="btn btn-block btn-warning disabled">{{ __('melody::label.current_theme') }}</button>
			@else
				{{ HTML::link(handles("orchestra::manages/melody.themes/activate/{$type}/{$theme_id}"), __('melody::label.activate_theme'), array('class' => 'btn btn-block btn-primary')) }}</a>
			@endif
			</div>

		</div>

		@empty

		@include(locate('melody::helps.getting-started'))

		@endforelse

	</div>
</div>