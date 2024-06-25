<?php

namespace App\Controllers;

use App\Models\ComicModel;

class Comics extends BaseController
{
    protected $ComicModel;
    public function __construct()
    {
        $this->ComicModel = new ComicModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Comics List',
            'comic' => $this->ComicModel->getComic()
        ];

        return view('comics/index', $data);
    }

    public function detail($slug)
    {

        $data = [
            'title' => 'Comic Detail',
            'comic' => $this->ComicModel->getComic($slug)
        ];

        // if comic not found
        if (empty($data['comic'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find comic with name ' . $slug);
        }
        return view('comics/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add New Comic',
            'validation' => \Config\Services::validation()
        ];
        return view('comics/create', $data);
    }

    public function save()
    {

        if (!$this->validate([
            'title' => [
                'rules' => 'required|is_unique[comic.title]',
                'errors' => [
                    'required' => '{field} cannot be empty',
                    'is_unique' => '{field} is already taken'
                ]
            ],
            'author' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} cannot be empty'
                ]
            ],
            'publisher' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} cannot be empty'
                ]
            ],
            'cover' => [
                'rules' => 'max_size[cover,1024]|mime_in[cover,image/jpg,image/jpeg,image/webp,image/png]|is_image[cover]',
                'errors' => [
                    'max_size' => 'File too big',
                    'mime_in' => 'File must be an image type',
                    'is_image' => 'Invalid file type'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/comics/create')->withInput()->with('validation', ['validation' => $validation]);
            return redirect()->to('/comics/create')->withInput();
        }

        $cover = $this->request->getFile('cover');
        if($cover->getError() == 4){
            $coverName = 'default.jpg';
        } else {
            $cover->move('img');
            $coverName = $cover->getName();
        }
        

        $slug = url_title($this->request->getVar('title'), '-', true);

        $this->ComicModel->save([
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'author' => $this->request->getVar('author'),
            'publisher' => $this->request->getVar('publisher'),
            'cover' => $coverName,
        ]);

        session()->setFlashdata('success', 'New comic has been added');

        return redirect()->to('/comics');
    }

    public function delete($id)
    {

        $comic = $this->ComicModel->find($id);
        if ($comic['cover'] != 'default.jpg') {
            unlink('img/' . $comic['cover']);
        }

        $this->ComicModel->delete($id);
        session()->setFlashdata('success', 'Comic has been deleted');
        return redirect()->to('/comics');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Edit Comic',
            'validation' => \Config\Services::validation(),
            'comic' => $this->ComicModel->getComic($slug)
        ];
        return view('comics/edit', $data);
    }

    public function update($id)
    {
        $oldComic = $this->ComicModel->getComic($this->request->getVar('slug'));
        if ($oldComic['title'] == $this->request->getVar('title')) {
            $rules_title = 'required';
        } else {
            $rules_title = 'required|is_unique[comic.title]';
        }

        if (!$this->validate([
            'title' => [
                'rules' => $rules_title,
                'errors' => [
                    'required' => '{field} cannot be empty',
                    'is_unique' => '{field} is already taken'
                ]
            ],
            'author' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} cannot be empty'
                ]
            ],
            'publisher' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} cannot be empty'
                ]
            ],
            'cover' => [
                'rules' => 'max_size[cover,1024]|mime_in[cover,image/jpg,image/jpeg,image/webp,image/png]|is_image[cover]',
                'errors' => [
                    'max_size' => 'File too big',
                    'mime_in' => 'File must be an image type',
                    'is_image' => 'Invalid file type'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/comics/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $cover = $this->request->getFile('cover');

        if ($cover->getError() == 4) {
            $coverName = $this->request->getVar('oldCover');
        } else {
            $cover->move('img');
            $coverName = $cover->getName();
            if ($this->request->getVar('oldCover') != 'default.jpg') {
                unlink('img/' . $this->request->getVar('oldCover'));
            }
        }

        $slug = url_title($this->request->getVar('title'), '-', true);

        $this->ComicModel->save([
            'id' => $id,
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'author' => $this->request->getVar('author'),
            'publisher' => $this->request->getVar('publisher'),
            'cover' => $coverName,
        ]);

        session()->setFlashdata('success', 'Comic has been updated');

        return redirect()->to('/comics');
    }
}
