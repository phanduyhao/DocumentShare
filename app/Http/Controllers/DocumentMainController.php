<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Document;
use App\Models\Favourite;
use App\Models\Rate;
use App\Models\Tag;
use App\Models\User;
use ConvertApi\ConvertApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentMainController extends Controller
{
    public function Index($categorySlug)
    {
        $category = Category::where('slug', $categorySlug)->firstOrFail();
        $documents = Document::withCount(['views', 'downloads'])->where('cate_id', $category->id)->paginate(6);
        $favourites = Favourite::where('user_id',Auth::id())->get();
        return view('document.index', compact('category', 'documents','favourites'), [
            'title' => 'Tài liệu ' . $category->title,
        ]);

    }

    public function uploadPage(){
        $count_docs = Document::count();
        $count_cates = Category::count();
        $cates = Category::all();
        return view('document.upload',compact('cates','count_docs','count_cates'),[
            'title' => 'Upload Tài liệu'
        ]);
    }

    public function upload(Request $request){

        $this->validate($request,[
            'title' => 'required',
            'slug' => 'required|unique:documents',
            'file' => 'required',
        ],[
            'title.required' => 'Vui lòng nhập tiêu đề !',
            'slug.required' => 'Vui lòng nhập slug',
            'slug.unique' => 'Slug này đã có',
            'file.required' => 'Vui lòng upload file',
        ]);
        $cate_more = $request->cate_add;
        $cate = new Category;
        if (!empty($cate_more)) {
            $cate->title = $cate_more;
            $cate->slug = $request->cate_add_slug;
            $cate->save();
        }
        $document = new Document;
        $document->title = $request->title;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileSize = $file->getSize();
            $fileSizeKB = $fileSize / 1024;
            $document->size = round($fileSizeKB, 2) . ' KB';
            $fileName = $file->getClientOriginalName(); // Lấy tên gốc của file
            $fileExtension = $file->getClientOriginalExtension(); // Lấy phần đuôi của file

            // Lưu tệp tin tạm thời
            $tempFilePath = public_path('temp/files/' . $fileName);
            $file->move(public_path('temp/files'), $fileName);

            // Chuyển đổi tệp thành PDF
            ConvertApi::setApiSecret('6QSfRhA7Nr905F3u');
            $result = ConvertApi::convert('pdf', ['File' => $tempFilePath]);

            // Lưu tệp PDF
            $pdfFileName = pathinfo($fileName, PATHINFO_FILENAME);
            $pdfFilePath = public_path('temp/files/' . $pdfFileName);
            $result->getFile()->save($pdfFilePath);
            $document->file = $pdfFileName;
            $destinationPath = public_path('temp/filesOrigin');
            copy($tempFilePath, $destinationPath . '/' . $fileName);
            // Xóa tệp tin tạm thời
            unlink($tempFilePath);

        }
        $document->description = $request->desc;
        $document->slug = $request->slug;
        if($request->score == null){
            $document->score = 0;
        }else{
            $document->score = $request->score;
        }
        $document->source = $request->source;
        $document->type = $fileExtension;
        $document->user_id = Auth::id();
        if (!empty($cate_more)) {
            $document->cate_id = $cate->id;
        }else{
            $document->cate_id = $request->cate_select;
        }
        $document->status = 2;
        $document->save();
        $tag = new Tag;
        $tag->tag_name = $request->tag;
        $tag->document_id = $document->id;
        $tag->cate_id = $request->cate_id;
        $tag->save();


        // Chuyển hướng về trang hiển thị danh sách document hoặc trang khác tùy theo yêu cầu của bạn
        return view('document.up_success',[
            'title' => 'Tải lên thành công!'
        ]);
    }

//    Tất cả tài liệu
    public function allDocs(){
        $favourites = Favourite::where('user_id',Auth::id())->get();
        $docs = Document::where('status',1)->paginate(9);
        return view('document.list_docs',compact('docs','favourites'),[
           'title' => 'Tất cả tài liệu'
        ]);
    }

//    Chi tiết tài liệu
    public function details($slug)
    {
        $document = Document::withCount(['comments','views', 'downloads'])->where('slug', $slug)->first();
        $document_id = $document->id;
        $rate_tb = Rate::where('document_id',$document_id)->get();
        if($document){
            $initialCommentsCount = 10; // Số lượng ban đầu hiển thị
            $loadMoreCommentsCount = 5;
            $comments = Comment::where('document_id', $document_id)->take($initialCommentsCount)->get();

            // Tìm tài liệu dựa trên trường 'slug'
            $cate = Category::find($document->cate_id);
            if($document->cate_id) {
                $cate_title = $cate->title;
            } else {
                $cate_title = "Chưa có danh mục !";
            }
            $user = User::find($document->user_id);
            $username = $user->name;
            $tag = Tag::find($document->tag_id);
            if($document->tag_id) {
                $tag_name = $tag->tag_name;
            } else {
                $tag_name = "Chưa có thẻ tag !";
            }
            $filename = $document->file;

            return view('document.details', compact('filename','document','username','cate_title','tag_name','comments','rate_tb','initialCommentsCount','loadMoreCommentsCount'),[
                'title' => $filename
            ]);
        }
    }

}
