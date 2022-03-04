<?php
// routes/web.php
Route::get('/post/store', 'PostControler@store');

//App\Http\Controllers
class PostController extends Controller
{
    public function store(Illuminate\Http\Request $request)
    {

        $this->validate($request, [
            'category_id' => 'required',
            'title' => 'required|max:255|min:4',
            'body' => 'required|min:6'
        ]);
    }
}
