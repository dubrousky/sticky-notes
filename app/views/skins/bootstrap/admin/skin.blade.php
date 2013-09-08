@extends('skins.bootstrap.admin.layout')

@section('module')
	<section id="admin-skin">
		@foreach ($skins as $skin)
			<div class="row">
				<div class="col-sm-12">
					{{
						HTML::image(url('admin/skin/preview/'.urlencode($skin->key)), NULL, array(
							'class'   => 'img-thumbnail pull-left',
							'width'   => 310,
							'height'  => 190,
						))
					}}

					<h4>
						{{{ $skin->name }}}

						<small>
							{{ Lang::get('admin.version') }}:
							{{{ $skin->version }}}
						</small>
					</h4>

					@if ( ! empty($skin->author))
						<p>
							{{ Lang::get('global.author') }}:
							{{ $skin->author }}
						</p>
					@endif

					<p>{{{ $skin->description }}}</p>

					@if ($site->general->skin == $skin->key)
						<button class="btn btn-success disabled" disabled="disabled">
							<span class="glyphicon glyphicon-ok"></span>
							{{ Lang::get('admin.theme_active') }}
						</button>
					@else
						{{
							link_to(url('admin/skin/set/'.urlencode($skin->key)), Lang::get('admin.use_theme'), array(
								'class' => 'btn btn-primary',
							))
						}}
					@endif
				</div>
			</div>

			<br />
		@endforeach
	</section>
@stop