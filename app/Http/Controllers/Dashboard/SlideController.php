<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Slides;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SlideController extends Controller
{
    public function __construct()
    {
        $this->middleware('dashboards');
    }
    public function index(Request $request)
    {
        $limit = 10;
        if ($request->session()->has('limit')) {
            $limit = $request->session()->get('limit');
        }
        if ($request->session()->has('sort-slide')) {
            $sort = $request->session()->get('sort-slide');
            $sorts = $request->session()->get('sort-slides');

            $lists = Slides::orderBy($sort, $sorts)->paginate($limit);
        } else {
            $lists = Slides::orderBy('id', 'desc')->paginate($limit);
        }
        if ($request->ajax) {
            return view('dashboards.ajax.body-table-slide', ['lists' => $lists]);
        }
        return view('dashboards.slide.index', ['title' => 'Slide', 'lists' => $lists, 'category' => Categories::all()]);
    }
    public function post_add(Request $request)
    {
        if ($request) {
            $validator = Validator::make($request->all(), [
                'title' => 'required|min:6|max:50',
                'sub_title' => 'max:50',
                'link' => 'required|max:250',
                'category_id' => 'required|exists:categories,id',
                'image' => 'required',
            ], [
                'title.required' => 'Chưa nhập tiêu đề.',
                'title.min' => 'Tiêu đề phải lớn hơn 6 ký tự.',
                'title.max' => 'Tiêu đề không lớn hơn 50 ký tự.',
                'sub_title.max' => 'Tiêu đề con không lớn hơn 50 ký tự.',
                'link.required' => 'Chưa nhập link',
                'link.max' => 'Link không vượt quá 250 ký tự.',
                'category_id.required' => 'Chưa chọn danh mục.',
                'category_id.exists' => 'Danh mục không hợp lệ.',
                'image.required' => 'Chưa chọn ảnh.',
            ]);
            if ($validator->fails()) {
                return response()->json(array('status' => 0, 'errors' => $validator->errors()), 200);
            }
            $slide = new Slides();
            $slide->title = $request->title;
            $slide->sub_title = $request->sub_title;
            $slide->link = $request->link;
            $slide->category_id = $request->category_id;
            if ($request->image) {
                $image = $request->image;
                list($type, $image) = explode(';', $image);
                list(, $image)      = explode(',', $image);
                $image = base64_decode($image);
                $image_name = getToken() . time() . '.png';
                $path = 'images/slide/' . $image_name;
                file_put_contents(public_path($path), $image);
                $slide->image = $path;
            }
            $slide->save();
            return response()->json(array('status' => 1, 'id' => $slide->id, 'msg' => 'Thêm slide thành công!'), 200);
        }
        return response()->json(array('status' => -1, 'msg' => 'Không có dữ liệu gửi lên!'), 200);
    }
    public function post_change(Request $request)
    {
        if ($request->id) {
            $slide = Slides::find($request->id);
            if ($slide) {
                $slide->status = $request->status;
                $slide->save();
                return 1;
            }
            return -1;
        }
        return 0;
    }
    public function post_delete(Request $request)
    {
        if ($request->id) {
            $slide = Slides::find($request->id);
            if ($slide) {
                if ($slide->image) {
                    try {
                        unlink(public_path($slide->image));
                        //code...
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
                }
                $slide->delete();
                return 1;
            }
            return -1;
        }
        return 0;
    }
    public function post_deletes(Request $request)
    {
        if ($request->ids) {
            foreach ($request->ids as $id) {
                $slide = Slides::find($id);
                if ($slide) {
                    if ($slide->image) {
                        try {
                            unlink(public_path($slide->image));
                        } catch (\Throwable $th) {
                            //throw $th;
                        }
                    }
                    $slide->delete();
                }
            }
            return 1;
        }
        return 0;
    }
    public function get_edit(Request $request)
    {
        if ($request->id) {
            $slider = Slides::find($request->id);
            if ($slider)
                return view('dashboards.slide.edit', ['title' => 'Sửa user', 'slider' => $slider, 'category' => Categories::all()]);
            return redirect(route('user'));
        }
        return redirect(route('user'));
    }
    public function post_edit($id, Request $request)
    {
        if ($request->title) {
            $sliders = Slides::find($request->id);
            if ($sliders) {
                $validator = Validator::make($request->all(), [
                    'title' => 'required|min:6|max:50',
                    'sub_title' => 'max:50',
                    'link' => 'required|max:250',
                    'category_id' => 'required|exists:categories,id',
                    'image' => 'required',
                ], [
                    'title.required' => 'Chưa nhập tiêu đề.',
                    'title.min' => 'Tiêu đề phải lớn hơn 6 ký tự.',
                    'title.max' => 'Tiêu đề không lớn hơn 50 ký tự.',
                    'sub_title.max' => 'Tiêu đề con không lớn hơn 50 ký tự.',
                    'link.required' => 'Chưa nhập link',
                    'link.max' => 'Link không vượt quá 250 ký tự.',
                    'category_id.required' => 'Chưa chọn danh mục.',
                    'category_id.exists' => 'Danh mục không hợp lệ.',
                    'image.required' => 'Chưa chọn ảnh.',
                ]);
                if ($validator->fails()) {
                    return response()->json(array('status' => 0, 'errors' => $validator->errors()), 200);
                }
                if ($request->image) {
                    $image = $request->image;
                    list($type, $image) = explode(';', $image);
                    list(, $image)      = explode(',', $image);
                    $image = base64_decode($image);
                    $image_name = getToken() . time() . '.png';
                    $path = 'images/slide/' . $image_name;
                    file_put_contents(public_path($path), $image);
                    $images = $path;
                }
                Slides::find($id)->update([
                    'title' => $request->title,
                    'sub_title' => $request->sub_title,
                    'link' => $request->link,
                    'category_id' => $request->category_id,
                    'image' => $images,
                ]);

                return redirect()->route('slide');
            }
            return response()->json(array('status' => -1, 'msg' => 'Không tìm thấy slide!'), 200);
        }

        return 0;
    }
}
