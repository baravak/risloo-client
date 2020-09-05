<?php

namespace App\Http\Controllers\Dashboard;

use App\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $documents = $this->data->documents = Document::apiIndex($request->all());
        return $this->view($request, 'dashboard.documents.index');
    }

    public function create(Request $request)
    {
        return $this->view($request, 'dashboard.documents.create');
    }
    public function store(Request $request)
    {
        return Document::apiStore($request->all())->response()->json(['redirect' => route('dashboard.documents.index')]);
    }

    public function update(Request $request, $document)
    {
        $response = Document::apiUpdate($document, $request->all());
        if($request->headers->get('data-xhr-base') == 'raw')
        {
            return $this->view($request, 'dashboard.documents.listRaw', ['document' => $response]);
        }
        return $response->response()->json(['redirect' => route('dashboard.documents.index')]);
    }
}
