<?php
class TasksController extends BaseController {

	public function home()
	{
		$tasks = Task::all();
		return View::make('home', compact('tasks'));
	}

	public function create()
	{
		return View::make('create');
	}

	public function edit($task)
	{
		return View::make('edit', compact('task'));
	}

	public function delete($task)
	{
		return View::make('delete', compact('task'));
	}

	public function show($id)
	{
		$task = Task::find($id);

		return View::make('task', compact('task'));
	}

	public function saveCreate()
	{
		$data = Input::all();

		$rules = array(
			'title'=> 'required',
			'body'=> 'required'
		);

		$validator = Validator::make($data, $rules);

		if ($validator->passes()) {
			$task = new Task;
			$task->title = Input::get('title');
			$task->body = Input::get('body');
			$task->save();

			return Redirect::action('TasksController@home');
		}

		return Redirect::action('TasksController@create');
	}

	public function doEdit()
	{
		$task = Task::findOrFail(Input::get('id'));
		$task->title = Input::get('title');
		$task->body = Input::get('body');
		$task->done = Input::get('done');
		$task->save();

		return Redirect::action('TasksController@home');
	}

	public function doDelete()
	{
		$task = Task::findOrFail(Input::get('id'));
		$task->delete();

		return Redirect::action('TasksController@home');
	}
}