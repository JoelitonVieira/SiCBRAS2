<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class QuestõesController extends Controller
{
    public function index()
    {
        if (! Gate::allows('questõe_access')) {
            return abort(401);
        }
        return view('admin.questões.index');
    }
}
