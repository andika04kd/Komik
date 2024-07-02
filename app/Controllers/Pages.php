<?php

namespace App\Controllers;

use App\Models\ComicModel;

class Pages extends BaseController
{

    protected $ComicModel;
    public function __construct()
    {
      $this->ComicModel = new ComicModel();
    }
    public function index()
    {
        $data = [
          'title' => 'Home',
        ];
        return view('pages/home', $data);
    }

    public function about() 
    {
        $data = [
          'title' => 'About',
        ];
        return view('pages/about', $data);
    }
    public function contact() 
    {
        $data = [
          'title' => 'Contact',
        ];
        return view('pages/contact', $data);
    }

    public function comics()
    {
    $keyword = $this->request->getVar('keyword');
    $currentPage = $this->request->getVar('page_comic') ? $this->request->getVar('page_comic') : 1;


    if ($keyword) {
      $this->ComicModel->like('title', $keyword)
        ->orLike('author', $keyword)
        ->orLike('publisher', $keyword);
    }

    $data = [
      'title' => 'Comics List',
      'comic' => $this->ComicModel->paginate(5, 'comic'),
      'pager' => $this->ComicModel->pager,
      'keyword' => $keyword,
      'currentPage' => $currentPage
    ];

    return view('users/index', $data);
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
    return view('users/detail', $data);
  }

  public function preview()
  {
    // Ambil keyword pencarian dari GET request
    $keyword = $this->request->getVar('keyword');

    // Lakukan pencarian berdasarkan keyword, misalnya menggunakan model
    $results = $this->ComicModel->searchByTitle($keyword);

    // Kembalikan hasil dalam bentuk JSON
    return $this->response->setJSON($results);
  }

  // public function detail($id)
  // {
  //   // Ambil detail komik berdasarkan $id
  //   $comic = $this->comic_model->find($id);

  //   // Tampilkan view detail komik
  //   return view('comics/detail', ['comic' => $comic]);
  // }

    
}
