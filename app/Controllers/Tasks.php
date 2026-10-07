<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;

class Tasks extends BaseController
{
    protected $taskModel;
    protected $userModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
        $this->userModel = new UserModel();
    }

    private function guard() { if (!session()->get('logged_in')) return redirect()->to('/login')->with('error', 'Please log in to manage tasks.'); return null; }
    private function show($view,$data) { return view('layout/header',$data).view($view,$data).view('layout/footer'); }
    public function newTask() { if($r=$this->guard()) return $r; return $this->show('tasks/form',['title'=>'New Task','task'=>['title'=>'','status'=>'pending','task_date'=>date('Y-m-d')],'errors'=>[],'action'=>site_url('tasks/create'),'button'=>'Create Task']); }
    public function create() { if($r=$this->guard()) return $r; $rules=['title'=>'required|max_length[150]','task_date'=>'required|valid_date[Y-m-d]','status'=>'required|in_list[pending,in progress,completed]']; if(!$this->validate($rules)) return $this->show('tasks/form',['title'=>'New Task','task'=>$this->request->getPost(),'errors'=>$this->validator->getErrors(),'action'=>site_url('tasks/create'),'button'=>'Create Task']); $this->taskModel->insert(['title'=>trim($this->request->getPost('title')),'status'=>$this->request->getPost('status'),'task_date'=>$this->request->getPost('task_date'),'created_at'=>date('Y-m-d H:i:s'),'is_archived'=>0]); return redirect()->to('/tasks')->with('success','Task created.'); }
    public function edit($id) { if($r=$this->guard()) return $r; $task=$this->taskModel->where('is_archived',0)->find($id); if(!$task) return redirect()->to('/tasks')->with('error','Task not found.'); return $this->show('tasks/form',['title'=>'Edit Task','task'=>$task,'errors'=>[],'action'=>site_url('tasks/'.$id.'/update'),'button'=>'Save Changes']); }
    public function update($id) { if($r=$this->guard()) return $r; $task=$this->taskModel->where('is_archived',0)->find($id); if(!$task) return redirect()->to('/tasks')->with('error','Task not found.'); $rules=['title'=>'required|max_length[150]','task_date'=>'required|valid_date[Y-m-d]','status'=>'required|in_list[pending,in progress,completed]']; if(!$this->validate($rules)) return $this->show('tasks/form',['title'=>'Edit Task','task'=>array_merge($task,$this->request->getPost()),'errors'=>$this->validator->getErrors(),'action'=>site_url('tasks/'.$id.'/update'),'button'=>'Save Changes']); $this->taskModel->update($id,['title'=>trim($this->request->getPost('title')),'status'=>$this->request->getPost('status'),'task_date'=>$this->request->getPost('task_date')]); return redirect()->to('/tasks')->with('success','Task updated.'); }
    public function delete($id) { if($r=$this->guard()) return $r; $task=$this->taskModel->where('is_archived',0)->find($id); if(!$task) return redirect()->to('/tasks')->with('error','Task not found.'); $this->taskModel->update($id,['is_archived'=>1]); return redirect()->to('/tasks')->with('success','Task archived.'); }
    public function index()
    {
        $today = date('Y-m-d');

        $data = [
            'title' => "Today's Tasks",
            'today' => $today,
            'tasks' => $this->taskModel
                ->where('task_date', $today)->where('is_archived', 0)
                ->orderBy('id', 'ASC')
                ->findAll()
        ];

        return view('layout/header', $data)
            . view('tasks/today', $data)
            . view('layout/footer');
    }

    public function taskList()
    {
        $data = [
            'title' => 'Complete Task List',
            'tasks' => $this->taskModel
                ->where('is_archived', 0)->orderBy('task_date', 'ASC')
                ->orderBy('id', 'ASC')
                ->findAll()
        ];

        return view('layout/header', $data)
            . view('tasks/list', $data)
            . view('layout/footer');
    }

    public function profile()
    {
        $data = [
            'title' => 'User Profile',
            'user' => $this->userModel->first()
        ];

        return view('layout/header', $data)
            . view('tasks/profile', $data)
            . view('layout/footer');
    }

        public function about()
    {
        $data = [
            'title' => 'About the System'
        ];

        return view('layout/header', $data)
            . view('tasks/about', $data)
            . view('layout/footer');
    }
}