<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class FileUploadController extends Controller
{
    public function index()
    {
        return view('admin.file-upload.index');
    }
 
    public function fileUpload(Request $request)
    {
        $this->validate($request, [
             'name' => 'required',
             'content' => 'required'
        ]);
 
       $content = $request->content;
       $dom = new \DomDocument();
       $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
       $imageFile = $dom->getElementsByTagName('imageFile');
 
       foreach($imageFile as $item => $image){
           $data = $img->getAttribute('src');
           list($type, $data) = explode(';', $data);
           list(, $data)      = explode(',', $data);
           $imgeData = base64_decode($data);
           $image_name= "/upload/" . time().$item.'.png';
           $path = public_path() . $image_name;
           file_put_contents($path, $imgeData);
           
           $image->removeAttribute('src');
           $image->setAttribute('src', $image_name);
        }
 
       $content = $dom->saveHTML();
       $fileUpload = new Employee;
       $fileUpload->name = $request->name;
       $fileUpload->content = $content;
       $fileUpload->save();
 
       dd($content);
    }
}