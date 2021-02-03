<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Vendor;
use App\Models\Product;
use View;

class AppController extends Controller
{
    public $prefix_view = "auth.pages.";
    public $prefix_route = "auth.";
    public $prefix_lang = "auth.";

    private $upload_path = "./upload/";

    public function __construct() {
        
        View::share([
            'prefix_view' => $this->prefix_view,
            'prefix_route' => $this->prefix_route,
            'prefix_lang' => $this->prefix_lang
        ]);
    }

    /**
     * dashboard
     */
    public function dashboard(Request $request) {
        $name = $request->segment(2);
        $title = 'Dashboard';
        return view($this->prefix_view . 'dashboard', compact('name', 'title'));
    }

    /**
     * index
     */
    public function index(Request $request) {
        $name = $request->segment(3);
        $subname = $request->segment(4);
        $title = trans($this->prefix_lang . $name . '.title.list');
        return view($this->prefix_view . $name . '.index', compact('title', 'name', 'subname'));
    }

    /**
     * search
     */
    public function search(Request $request) {
        $name = $request->segment(3);
        $subname = $request->segment(4);
        $items = null;
        $paging = null;
        $title = trans($this->prefix_lang . $name . '.title.list');
        $prefix_lang = $this->prefix_lang;

        $searchNameValue = $request->input('search_name');
        $searchStatusValue = $request->input('search_status');
        $wheres = [];
        if($searchNameValue) {
            $wheres[] = ['name', 'LIKE', '%' . $searchNameValue . '%'];
        }

        if($searchStatusValue > -1) {
            $wheres[] = ['status', '=', $searchStatusValue];
        }

        switch($name) {
            case 'categories':
                $data = Category::where($wheres)->paginate(5);
                break;
            case 'vendors':
                $data = Vendor::where($wheres)->paginate(5);
                break;
        }
        
        if(count($data)) {
            $items = $data;
            $paging = $items->toArray();
        }

        return view($this->prefix_view . $name . '.list', compact('items', 'title', 'name', 'subname', 'paging'));
    }

    /**
     * remove
     */
    public function remove(Request $request) {
        $name = $request->segment(3);
        $remove_ids = $request->input('remove_ids');
        switch($name) {
            case 'categories':
                Category::destroy($remove_ids);
                break;
            case 'vendors':
                Vendor::destroy($remove_ids);
                break;
        }
        return response()->json();
    }

    /**
     * form (create/update)
     */
    public function form(Request $request) {
        $name = $request->segment(3);
        $action = $request->segment(4);
        $id = $request->segment(5);
        // $items = null;
        $title = trans($this->prefix_lang . $name . '.title.' . $action);
        $prefix_lang = $this->prefix_lang;
        
        $object = null;
        $object = $this->getObject($id, $name, $action);

        if($request->isMethod('post')) {
            switch($name) {
                case 'categories':
                        $rules = [
                            'name' => 'required|max:150',
                        ];
            
                        $validator = $request->validate($rules);

                        $object->id         = $this->createRandomId();
                        $object->name       = $request->input('name');
                        $object->slug       = $this->createSlug($request->input('name'));
                        $object->parent_id  = $request->input('parent_id');
                        $object->status     = $request->input('status') ? 1 : 0;

                    break;
                    
                case 'vendors':
                        $rules = [
                            'name' => 'required|max:150',
                            'link' => 'max:150'
                        ];

                        $validator = $request->validate($rules);

                        $object->id         = $this->createRandomId();
                        $object->name       = $request->input('name');
                        $object->slug       = $this->createSlug($request->input('name'));
                        $object->logo       = $this->uploadFile($request);
                        $object->link       = $request->input('link');
                        $object->status     = $request->input('status') ? 1 : 0;

                    break;
                case 'products':
                    break;
            }

            if($object->save()) {
                $alert = $action == 'update' ? $this->getLang('alert.update_success') : $this->getLang('alert.create_success');
                return redirect(route($this->prefix_route . 'index', ['name' => $name]))->with('alert_success', $alert);
            }
        }

        return view($this->prefix_view . $name . '.form', compact('title', 'name', 'action', 'prefix_lang', 'object'));
    }

    private function uploadFile(Request $request) {
        if(!$request->hasFile('upload_input')) {
            return '';
        }

        $file = $request->file('upload_input');
        $path = $file->move($this->upload_path, $file->getClientOriginalName());
        return $path;
    }

    private function getObject($id, $name, $action) {
        $object = null;
        switch($name) {
            case 'categories':
                if($action == 'update') {
                    $object = Category::find($id);
                } else if($action == 'create') {
                    $object = new Category();
                }
            break;
                
            case 'vendors':
                if($action == 'update') {
                    $object = Vendor::find($id);
                } else if($action == 'create') {
                    $object = new Vendor();
                }
            break;
        }

        return $object;
    }

    private function getLang($key) {
        return trans($this->prefix_lang . $key); 
    }

    private function createRandomId($length = 16) {
        return Str::random($length);
    }

    private function createSlug($str) {
        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd' => 'đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D' => 'Đ',
            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );
        foreach ($unicode as $nonUnicode => $uni) {
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }
        $kq = str_replace("'", "''", $str);
        
        return $this->url_title(strtolower($kq)) . '.' . time();
    }
    
    private function url_title($str, $separator = '-', $lowercase = FALSE)
    {
        if ($separator === 'dash')
        {
            $separator = '-';
        }
        elseif ($separator === 'underscore')
        {
            $separator = '_';
        }
        
        $q_separator = preg_quote($separator, '#');
        
        $trans = array(
            '&.+?;'			=> '',
            '[^\w\d _-]'		=> '',
            '\s+'			=> $separator,
            '('.$q_separator.')+'	=> $separator
        );
        
        $str = strip_tags($str);
        foreach ($trans as $key => $val)
        {
            $str = preg_replace('#'.$key.'#i'.(true ? 'u' : ''), $val, $str);
        }
        
        if ($lowercase === TRUE)
        {
            $str = strtolower($str);
        }
        
        return trim(trim($str, $separator));
    }
}
