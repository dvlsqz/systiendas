<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator, Str, Config;

use App\Http\Models\Category;

class CategoriesController extends Controller
{
    public function __Construct(){
    	$this->middleware('auth');
        $this->middleware('IsAdmin');
        $this->middleware('UserStatus');
        $this->middleware('Permissions');
    }

    public function getHome($module){
    	$cats = Category::where('module', $module)->where('parent', '0')->orderBy('order', 'Asc')->get();
    	$data = ['cats' => $cats, 'module' => $module];
    	return view('admin.categories.home', $data);
    }

    public function postCategoryAdd(Request $request, $module){
    	$rules = [
    		'name' => 'required',
    		'icon' => 'required',
    	];
    	$messagess = [
    		'name.required' => 'Se requiere un nombre para la categoría.',
            'icon.required' => 'Se require un ícono para la categoría.'
    	];

    	$validator = Validator::make($request->all(), $rules, $messagess);
    	if($validator->fails()):
    		return back()->withErrors($validator)->with('messages', 'Se ha producido un error.')->with('typealert', 'danger');
        else: 
            $path = '/'.date('Y-m-d');
            $fileExt = trim($request->file('icon')->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disks.uploads.root');
            $name = Str::slug(str_replace($fileExt, ' ',$request->file('icon')->getClientOriginalName()));
            $filename = rand(1,999).'-'.$name.'.'.$fileExt;

    		$c = new Category;
    		$c->module = $module;
            $c->parent = $request->input('parent');
    		$c->name = e($request->input('name'));
            $c->slug = Str::slug($request->input('name'));
            $c->file_path = date('Y-m-d');
            $c->icon = $filename;
            
            if($c->save()):
                if($request->hasFile('icon')):
                    $fl = $request->icon->storeAs($path, $filename, 'uploads');
                endif;

                return back()->with('messages', 'Creado y guardado con exito!.')
                    ->with('typealert', 'success');
    		endif;
    	endif;
    }

    public function getCategoryEdit($id){
        $cat = Category::find($id);
        $data = ['cat' => $cat];
        return view('admin.categories.edit', $data);
    }

    public function postCategoryEdit(Request $request, $id){
        $rules = [
            'name' => 'required',
        ];
        $messagess = [
            'name.required' => 'Se requiere un nombre para la categoría.'
        ];

        $validator = Validator::make($request->all(), $rules, $messagess);
        if($validator->fails()):
            return back()->withErrors($validator)->with('messages', 'Se ha producido un error.')
                ->with('typealert', 'danger');
        else:
            

            $c = Category::find($id);
            $c->name = e($request->input('name'));
            $c->slug = Str::slug($request->input('name'));
            if($request->hasFile('icon')):
                $actual_icon = $c->icon;
                $actual_file_path = $c->file_path;

                $path = '/'.date('Y-m-d');
                $fileExt = trim($request->file('icon')->getClientOriginalExtension());
                $upload_path = Config::get('filesystems.disks.uploads.root');
                $name = Str::slug(str_replace($fileExt, ' ',$request->file('icon')->getClientOriginalName()));
                $filename = rand(1,999).'-'.$name.'.'.$fileExt;
                $fl = $request->icon->storeAs($path, $filename, 'uploads');

                $c->file_path = date('Y-m-d');
                $c->icon = $filename;

                if(!is_null($actual_icon)):
                    unlink($upload_path.'/'.$actual_file_path.'/'.$actual_icon);
                endif;
            endif;
            $c->order = $request->input('order');
            if($c->save()):

                return back()->with('messages', 'Actualizado y guardado con exito!.')
                    ->with('typealert', 'success');
            endif;
        endif;
    }

    public function getSubCategories($id){
        $cat = Category::findOrFail($id);

        $data = ['cat' => $cat];
    	return view('admin.categories.subs_categories', $data);
    }

    public function getCategoryDelete($id){
        $c = Category::find($id);
        if($c->delete()):
            return back()->with('messages', 'Borrado con exito!.')
                ->with('typealert', 'success');
        endif;
    }
}
