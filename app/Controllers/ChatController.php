<?php

namespace App\Controllers;

use App\Models\ChatModel;

class ChatController extends BaseController
{
    public function fetch()
    {
        $chatModel = new ChatModel();
        $messages = $chatModel->orderBy('created_at', 'ASC')->findAll();
        return $this->response->setJSON($messages);
    }

    public function send()
    {
        $chatModel = new ChatModel();

        $data = [
            'sender_name' => $this->request->getPost('sender_name'),
            'message' => $this->request->getPost('message'),
        ];

        if ($chatModel->save($data)) {
            return $this->response->setJSON(['status' => 'success']);
        } else {
            return $this->response->setJSON(['status' => 'error'], 400);
        }
    }
}
