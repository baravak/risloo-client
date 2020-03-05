<?php
namespace App\Http\Controllers\Dashbaord;

use Illuminate\Http\Request;
use App\Document;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $this->data['documents'] = Document::apiIndex($request->all(['order', 'sort', 'status', 'type', 'gender']));
        return view('dashboard.documents.index', $this->data);
    }

    public function create(Request $request)
    {
        return view('dashboard.documents.create', $this->data);
    }

    public function store(Request $request)
    {
        return Document::apiStore($request->except('_method'))->response()->json([
            'redirect' => route('dashboard.documents.create')
        ]);
    }

    public function edit(Request $request, $document)
    {
        $this->data['document'] = Document::apiShow($document);
        return view('dashboard.documents.create', $this->data);
    }
    public function update(Request $request, $document)
    {
        return Document::apiUpdate($document, $request->except('_method'))->response()->json(['redirect' => route('dashboard.documents.edit', ['id'=>$document])]);
    }
}
