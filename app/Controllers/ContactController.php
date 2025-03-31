<?php

namespace App\Controllers;
use App\Models\ContactModel;
use CodeIgniter\Controller;

class ContactController extends BaseController
{
    public function sendMessage()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'name'    => 'required|min_length[2]',
            'email'   => 'required|valid_email',
            'subject' => 'required|min_length[3]',
            'message' => 'required|min_length[5]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/contact')->withInput()->with('errors', $validation->getErrors());
        }

        $model = new ContactModel();

        $data = [
            'name'    => $this->request->getPost('name'),
            'email'   => $this->request->getPost('email'),
            'subject' => $this->request->getPost('subject'),
            'message' => $this->request->getPost('message'),
        ];

        $model->save($data);

        return redirect()->to('/contact')->with('success', '✅ Your message has been sent!');
    }
}
