<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\TaskRepository;

class TaskService
{
	protected $taskRepository;

	public function __construct(TaskRepository $taskRepository)
	{
		$this->taskRepository = $taskRepository;
	}

	/**
	 * Logic menampilkan semua task
	 */
	public function showTasks()
	{
		return $this->taskRepository->showTasks();
	}

	/**
	 * Logic mendapatkan task bedasarkan id
	 *  */
	public function show($id)
	{
		return $this->taskRepository->show($id);
	}

	/**
	 * Logic membuat task
	 */
	public function createTask(Request $request)
	{
		$this->taskRepository->createTask($request);
	}

	/**
	 *Logic edit task
	 */
	public function updateTask(Request $request, $id)
	{
		$this->taskRepository->updateTask($request, $id);
	}

	/**
	 * Logic menghapus task
	 */
	public function deleteTask($id)
	{
		$this->taskRepository->deleteTask($id);
	}

	/**
	 * Logic menugaskan pengguna ke sebuah task yang telah dibuat
	 */
	public function assignTask(Request $request, $id)
	{
		$this->taskRepository->assignTask($request, $id);
	}

	/**
	 * Logic menghapus pengguna yang telah diassign
	 */
	public function unassignTask($id)
	{
		$this->taskRepository->unassignTask($id);
	}

	/**
	 * Logic menambahkan subtask didalam task
	 */
	public function addSubtask(Request $request, $id)
	{
		$this->taskRepository->addSubtask($request, $id);
	}

	/**
	 * Logic menghapus subtask didalam task
	 */
	public function deleteSubtask($id)
	{
		$this->taskRepository->deleteSubtask($id);
	}
}
