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
        $documents = Document::withCount('downloads')->where('cate_id', $category->id)->paginate(6);
        $favourites = Favourite::where('user_id',Auth::id())->get();
        $tags = Tag::where('cate_id', $category->id)->take(6)->get();
        $doc_hots = Document::where('status',1)->where('score','>',0)->take(3)->get();

        return view('document.index', compact('category', 'documents','favourites','tags','doc_hots'), [
            'title' => 'Tài liệu ' . $category->title,
        ]);
    }

    public function uploadPage(){
        $count_docs = Document::count();
        $count_cates = Category::count();
        $count_tags = Tag::count();
        $cates = Category::all();
        return view('document.upload',compact('cates','count_docs','count_cates','count_tags'),[
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
        $tag->slug = $request->tag_slug;
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
        $docs = Document::withCount('downloads')->where('status',1)->paginate(9);
        $tags = Tag::take(10)->get();
        $doc_hots = Document::where('status',1)->where('score','>',0)->take(6)->get();
        return view('document.list_docs',compact('docs','favourites','tags','doc_hots'),[
           'title' => 'Tất cả tài liệu'
        ]);
    }

//    Chi tiết tài liệu
    public function details($slug)
    {
        $doc_news = Document::where('status',1)
            ->orderBy('id', 'desc')
            ->take(6)
            ->get();
        $document = Document::withCount(['comments', 'downloads'])->where('slug', $slug)->first();
        $document_id = $document->id;
        $rate_tb = Rate::where('document_id',$document_id)->get();
        if($document){
            $initialCommentsCount = 2; // Số lượng ban đầu hiển thị
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

            $filename = $document->file;
            $tags = Tag::where('document_id',$document_id)->get();
            return view('document.details', compact('filename','document','username','cate_title','comments','rate_tb','initialCommentsCount','loadMoreCommentsCount','tags','doc_news'),[
                'title' => $filename
            ]);
        }
    }

//    hiển thị thêm bình luận
    public function loadComments(Request $request)
    {
        $document_id = $request->input('document_id');
        $offset = $request->input('offset'); // Số lượng bình luận hiện tại
        $loadMoreCommentsCount = $request->input('loadMoreCommentsCount'); // Số lượng bình luận muốn load thêm

        // Lấy thêm bình luận bằng cách sử dụng offset và số lượng muốn load
        $comments = Comment::where('document_id', $document_id)
            ->skip($offset)
            ->take($loadMoreCommentsCount)
            ->get();
        foreach ($comments as $comment) {
            $comment->load('user'); // Load dữ liệu người bình luận
            $comment->avatar = $comment->user->avatar; // Lưu avatar vào thuộc tính mới
            $comment->name = $comment->user->name;
        }

        return response()->json(['comments' => $comments]);
    }
}
