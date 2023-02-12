<?php

namespace App\Http\Controller;

use App\Services\TaskService;
use App\Helpers\MongoModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
	protected $taskService;

	public function __construct(TaskService $taskService)
	{
		$this->taskService = $taskService;
	}

	/**
	 * Menampilkan semua tasks
	 */
	public function showTasks()
	{
		$tasks = $this->taskService->showTasks();

		return response()->json($tasks);
	}

	/**
	 * Mendapatkan task bedasarkan id
	 *  */
	public function show($id)
	{
		$tasks = $this->taskService->show($id);

		return response()->json($tasks);
	}

	/**
	 * Membuat task
	 */
	public function createTask(Request $request)
	{
		$this->taskService->createTask($request);

		return response()->json(['message' => 'Task success create']);
	}

	/**
	 *Edit task
	 */
	public function updateTask(Request $request, $id)
	{
		$this->taskService->updateTask($request, $id);

		return response()->json(['message' => 'Task success update']);
	}

	/**
	 * Hapus task
	 */
	public function deleteTask($id)
	{
		$this->taskService->deleteTask($id);

		return response()->json(['message' => 'Task success delete']);
	}

	/**
	 * Menugaskan pengguna ke sebuah task yang telah dibuat
	 */
	public function assignTask(Request $request, $id)
	{
		$this->taskService->assignTask($request, $id);

		return response()->json(['message' => 'Task success assign']);
	}

	/**
	 * Menghapus pengguna yang telah diassign
	 */
	public function unassignTask($id)
	{
		$this->taskService->unassignTask($id);

		return response()->json(['message' => 'Task success unassign']);
	}

	/**
	 * Menambahkan subtask didalam task
	 */
	public function addSubtask(Request $request, $id)
	{
		$this->taskService->addSubtask($request, $id);

		return response()->json(['message' => 'Subtask success add']);
	}

	/**
	 * Menghapus subtask didalam task
	 */
	public function deleteSubtask($id)
	{
		$this->taskService->deleteSubtask($id);

		return response()->json(['message' => 'Subtask success delete']);
	}
}
