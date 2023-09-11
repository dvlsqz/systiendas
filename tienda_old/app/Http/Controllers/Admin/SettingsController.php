<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');
        $this->middleware('IsAdmin');
        $this->middleware('UserStatus');
        $this->middleware('Permissions');
    }

    public function getHome(){
        return view('admin.settings.settings');
    }

    public function postHome(Request $request){
        $app_projecct_path = 'c:/xampp/htdocs/tienda_app/config';
        if(!file_exists(config_path().'/cms.php')):
            fopen(config_path().'/cms.php', 'w');
        endif;

        $file = fopen(config_path().'/cms.php', 'w');

        fwrite($file, '<?php '.PHP_EOL);
        fwrite($file, 'return [ '.PHP_EOL);
        foreach($request->except(['_token']) as $key => $value):
            if(is_null($value)):
                fwrite($file, '\''.$key.'\' => \'\','.PHP_EOL);
            else:
                fwrite($file, '\''.$key.'\' => \''.$value.'\','.PHP_EOL);
            endif;
            
        endforeach;
        fwrite($file, '] '.PHP_EOL);
        fwrite($file, '?> '.PHP_EOL);
        fclose($file);

        copy(config_path().'/cms.php', $app_projecct_path.'/cms.php');

        return back()->with('messages', 'Las configuraciones fueron guardadas con exito!.')
                ->with('typealert', 'success');
    }
}
