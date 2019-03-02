@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					TODOを追加
				</div>

				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')   

					<!-- New Todo Form -->
					<form action="/todo" method="POST" class="form-horizontal">
						{{ csrf_field() }}

						<!-- Todo Name -->
						<div class="form-group">
							<label for="task-name" class="col-sm-3 control-label">フォーム</label>

							<div class="col-sm-6">
								<input type="text" name="name" id="todo-name" class="form-control" value="{{ old('todo') }}">
							</div>
						</div>

						<!-- Add Todo Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-plus"></i>TODOを追加する
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<!-- Todos -->

			@if (count($todos) > 0)
				<div class="panel panel-default">
					<div class="panel-heading">
						TODOリスト
					</div>

					<div class="panel-body">
						<table class="table table-striped task-table">
							<thead>
								<th>TODO</th>
								<th>&nbsp;</th>
							</thead>
							<tbody>
								@foreach ($todos as $todo)
									<tr>
										<td class="table-text"><div>{{ $todo->title }}</div></td>

										<!-- Task Delete Button -->
										<td>
											<form action="/todo/{{ $todo->id }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}

												<button type="submit" class="btn btn-danger">
													<i class="fa fa-trash"></i>削除
												</button>
											</form>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@endif

		</div>
	</div>
@endsection