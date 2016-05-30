@if ($breadcrumbs)
	<ol class="breadcrumb" style="background-color:inherit">
		@foreach ($breadcrumbs as $breadcrumb)
			@if ($breadcrumb->url && !$breadcrumb->last)
				<li><a href="{{{ $breadcrumb->url }}}">{{{ $breadcrumb->title }}}</a></li>
			@else
				<li class="active">{{{ $breadcrumb->title }}}</li>
			@endif
		@endforeach
	</ol>
@endif
