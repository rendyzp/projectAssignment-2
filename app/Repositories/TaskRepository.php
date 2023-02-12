<?php

namespace App\Repositories;

use App\Models\Task;
use App\Models\Subtask;
use App\Helpers\MongoModel;
use Illuminate\Http\Request;
use Mockery\Matcher\Subset;

class TaskRepository
{
	protected $model;

	public function __construct(Task $model)
	{
		$this->model = $model;
	}

	/**
	 * Untuk menampilkan semua task
	 */
	public function showTasks()
	{
		return $this->model->all();
	}

	/**
	 * Untuk mendapatkan task bedasarkan id
	 *  */
	public function show($id)
	{
		$task = $this->model->find(['_id' => $id]);
		return $task;
	}

	/**
	 * Untuk membuat task
	 */
	public function createTask(Request $request)
	{
		$task = new $this->model;
		$task->title = $request->title;
		$task->assigned = $request->assigned;
		$task->description = $request->description;
		$task->created_at = now();
		$task->save();
	}

	/**
	 *Untuk edit task
	 */
	public function updateTask(Request $request, $id)
	{
		$task = $this->model->find($id);
		$task->title = $request->title;
		$task->assigned = $request->assigned;
		$task->description = $request->description;
		$task->save();
	}

	/**
	 * Untuk menghapus task
	 */
	public function deleteTask($id)
	{
		$this->model->find($id)->delete();
	}

	/**
	 * Untuk menugaskan pengguna ke sebuah task yang telah dibuat
	 */
	public function assignTask(Request $request, $id)
	{
		$task = $this->model->find($id);
		$task->assigned = $request->assigned;
		$task->save();
	}

	/**
	 * Untuk menghapus pengguna yang telah diassign
	 */
	public function unassignTask($id)
	{
		$task = $this->model->find($id);
		$task->assigned = null;
		$task->save();
	}

	/**
	 * Untuk menambahkan subtask didalam task
	 */

	public function addSubtask(Request $request, $id)
	{
		$task = Task::findOrFail($id);
		$subtask = Subtask::create([
			'task_id' => $task->id,
			'title' => $request->title,
		]);

		return $subtask;
	}

	/**
	 * Untuk menghapus subtask didalam task
	 */
	public function deleteSubtask($id)
	{
		$subtask = Subtask::findOrFail($id);
		$subtask->delete();

		return $subtask;
	}
}
