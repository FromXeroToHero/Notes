<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NoteModel;
use App\Models\DataModel;
use CodeIgniter\I18n\Time;

class NoteController extends BaseController
{

    public function index()
    {
        helper(['cookie']);
        if (is_null(get_cookie('username'))) {
            return redirect()->to('/');
        }
        $noteModel = new NoteModel();
        $data['notes'] = $noteModel->where('user_id', $_COOKIE['userid'])->orderBy('date', 'DESC')->findAll();

        return view('notes', $data);
    }

    public function save()
    {
        helper(['cookie']);
        if (is_null(get_cookie('username'))) {
            return redirect()->to('/');
        }
        helper(['form', 'url']);
        $noteModel = new NoteModel();
        $url1 = $this->do_upload();
        $url = $stipped = substr($url1, 1);

        $data = [
            'title'     =>  $this->request->getVar('title'),
            'text'      =>  $this->request->getVar('text'),
            'user_id'   =>  $_COOKIE['userid'],
            'image'     =>  $url,
        ];
        $save = $noteModel->insert($data);

        return redirect()->to('/notes');
    }

    private function do_upload() {
        $type = explode('.', $_FILES["image"]["name"]);
        $type = $type[count($type) - 1];
        $url = "./img/".uniqid(rand()).'.'.$type;

        if (in_array($type, array("jpg", "jpeg", "gif", "png")))
            if(is_uploaded_file($_FILES["image"]["tmp_name"]))
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $url))
                    return $url;
        return "";
    }

    public function delete()
    {
        helper(['cookie']);
        if (is_null(get_cookie('username'))) {
            return redirect()->to('/');
        }
        $noteId = $this->request->getGet('id');
        $noteModel = new NoteModel();
        $noteModel->where('id', $noteId)->delete();

        return redirect()->to('/notes');
    }

    public function search() {
        helper(['cookie']);
        if (is_null(get_cookie('username'))) {
            return redirect()->to('/');
        }
        $search = $this->request->getVar('searchQuery');
        $noteModel = new NoteModel();
        $noteModel->like('title', $search);$noteModel->orLike('text', $search);
        $query = $noteModel->get();
        $q = $query->getResultArray();
        $data['notes'] = $q;

        return view('notes', $data);
    }

    public function edit($id) {
        helper(['cookie']);
        if (is_null(get_cookie('username'))) {
            return redirect()->to('/');
        }
        $noteModel = new NoteModel();
        
        $data['note'] = $noteModel->where('id', $id)->first();
        $data['notes'] = $noteModel->where('user_id', $_COOKIE['userid'])->orderBy('date', 'ASC')->findAll();
        $data['is_edit'] = true;

        return view('notes', $data);
    }

    public function update($id) {
        

        $noteModel = new NoteModel();
        $note_title = $this->request->getVar('title');
        $note_text = $this->request->getVar('text');

        $data = array(
            'title' => $note_title,
            'text' => $note_text
        );

        if (!empty($_FILES['image']['name'])) {
            $image_url = $this->do_upload();
            if ($image_url) {
                $data['image'] = $image_url;
            }
        }

        if ($noteModel->update($id, $data)) {
            return redirect()->to('/notes');
        } else {
            return redirect()->to('/notes');
        }
    }

    public function logout()
    {
        helper(['cookie']);

        setcookie('username', '', time() - 3600, '/');
        setcookie('userid', '', time() - 3600, '/');
        
        session()->destroy();

        return redirect()->to('/index.php');
    }
}
