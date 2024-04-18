<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        $adminRequests = User::where('is_admin', NULL)->get();
        $revisorRequests = User::where('is_revisor', NULL)->get();
        $writerRequests = User::where('is_writer', NULL)->get();

        return view('admin.dashboard',compact('adminRequests','revisorRequests','writerRequests'));
    }

    public function setAdmin(User $user){
        $user->update([
            'is_admin'=>true,
        ]);
        return redirect(route('admin.dashboard'))->with('message','Hai correttamente reso amministratore l\'utente scelto');
    }

    public function setRevisor(User $user){
        $user->update([
            'is_revisor'=>true,
        ]);
        return redirect(route('admin.dashboard'))->with('message','Hai correttamente reso revisore l\'utente scelto');
    }

    public function setWriter(User $user){
        $user->update([
            'is_writer'=>true,
        ]);
        return redirect(route('admin.dashboard'))->with('message','Hai correttamente reso redattore l\'utente scelto');
    }

    public function rejectRole(User $user){
        $user->update([
            'is_admin' => $user->is_admin === NULL ? false : $user->is_admin,
            'is_revisor' => $user->is_revisor === NULL ? false : $user->is_revisor,
            'is_writer' => $user->is_writer === NULL ? false : $user->is_writer,
        ]);
    
        return redirect(route('admin.dashboard'))->with('message','Hai rifiutato la richiesta');
    }



    public function editTag(Request $request, Tag $tag){
        $request->validate([
            'name'=>'required|unique:tags|min:3',
        ]);

        $tag->update([
            'name'=>strtolower($request->name),
        ]);
        return redirect(route('admin.dashboard'))->with('message','Tag modificato correttamente');
    }

    public function deleteTag(Tag $tag){
        foreach($tag->articles as $article){
            $article->tags()->detach($tag);
        }
        $tag->delete();
        return redirect(route('admin.dashboard'))->with('message','Tag eliminato correttamente');
    }

    public function editCategory(Request $request, Category $category){
        $request->validate([
            'name'=>'required|unique:categories|min:3',
        ]);

        $category->update([
            'name'=>strtolower($request->name),
        ]);
        return redirect(route('admin.dashboard'))->with('message','Categoria modificata correttamente');
    }

    public function deleteCategory(Category $category){
        $category->delete();
        return redirect(route('admin.dashboard'))->with('message','Categoria eliminata correttamente');
    }

    public function storeCategory(Request $request){
        $request->validate([
            'name'=>'required|unique:categories|min:3',
        ]);

        Category::create([
            'name'=>$request->name,
        ]);
        return redirect(route('admin.dashboard'))->with('message','Categoria creata correttamente');
    }
}
