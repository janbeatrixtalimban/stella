<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\ImageGallery;


class ImageGalleryController extends Controller
{

    public function index()
    {
    	$images = ImageGallery::get();
    	return view('image-gallery',compact('images'));
    }

    public function viewindex()
    {
    	$images = ImageGallery::get();
    	return view('imagegalleryview',compact('images'));
    }


    public function upload(Request $request)
    {
        /*
    	$this->validate($request, [
    		'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $input['image']);
*/
        $image_array = $request->file('image');
        $array_len = count($image_array);

        //$input['title'] = $request->title;

        for (
            $i=0; $i<$array_len; $i++
        )
        {
            $image_ext = $image_array[$i]->GetClientOriginalExtension();
            $new_image_name = rand(123456,999999999).".".$image_ext;

            $destination_path = public_path('/images');
            $image_array[$i]->move($destination_path,$new_image_name);

            $input['image'] = $new_image_name;
            $input['title'] = $request->title;
        //$request->image->move(public_path('images'), $input['image']);
        ImageGallery::create($input);
        }
       
        //ImageGallery::create($input);


    	return back()
            ->with('success', 'Images uploaded successfully' );
            //echo $array_len; gumagana siya nakukuha niya kung ilan 'Images Uploaded successfully.
    }


    public function destroy($id)
    {
    	ImageGallery::find($id)->delete();
    	return back()
    		->with('success','Image removed successfully.');	
    }
}