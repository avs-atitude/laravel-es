<?php

namespace App\Http\Controllers;

use App\Articles\ArticlesRepository;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    private $repository;

    public function __construct(ArticlesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $articles = $this->repository->search((string) $request->get('q'));

        return view('articles.index', [
            'articles' => $articles,
        ]);
    }
}
