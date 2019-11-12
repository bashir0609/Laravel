Easy Method
---
```
use Illuminate\Support\Facades\Storage;

public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'image' => 'sometimes|file|image|max:5000',
        ]);

        $tech = new Tech;
        $tech->title = request()->title;
        if (request()->hasFile('image')) {  
            $tech->image = request()->image->store('public/images');
        }
        $tech->save();

        return redirect('/tech');
    }
    
<img src="{{ Storage::url($tech->image) }}" class="w-100">        // in views
```

Unauthenticated User
------------------
```
    public function store()
        request()->validate([
           'title' => 'required',
           'featured' => 'required|image'
        ]);
        //change image name
        $featured = request()->featured;
        $originalName = $featured->getClientOriginalName();
        $featured_new_name = 'featured' . time() . $originamName;
        //save image to a directory
        $featured->move('uploads/featured', $featured_new_name);
        
        //create post
        $post = Post::create([
            'title' => request()->title,
            'featured' => 'uploads/featured' . $featured_new_name,
        ]);
    // In view
    <img src="{{ url( $post_>featured ) }}">
```
```
public function store()
{
    if(request-has('avater')){
        $avateruploaded = $request->file('avater');
        $avatername = time() . '.' . $avateruploaded->getclientoriginalextension();
        $avaterpath = public_path('/images/');
        $avateruploaded->move($avaterpath, $avatername);
        
        return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'avater' => '/images/' .$avatername,
        ])
    }
}
```
```
public function addproductinsert(Request $request)
    {
        $request->validate([
            'product_name'=> 'required',
            'product_description'=> 'required',
            'product_price'=> 'required|numeric',
            'product_quantity'=> 'required',
            'alert_quantity'=> 'required',
        ]);
        $last_inserted_id = Product::insertGetId([
            'product_name'=>$request->product_name,
            'product_description'=>$request->product_description,
            'product_price'=>$request->product_price,
            'product_quantity'=>$request->product_quantity,
            'alert_quantity'=>$request->alert_quantity,
        ]);
        if($request->hasFile('product_image')){
            $photo_to_upload = $request->product_image;
            $filename = $last_inserted_id.".".$photo_to_upload->getClientOriginalExtension();
            $path = base_path('public/uploads/product_photos/' . $filename );
            Image::make($photo_to_upload)->resize(400,450)->save( $path );
            Product::find($last_inserted_id)->update([
                'product_image' => $filename 
            ]);
        }
        return back()->with('status', 'Product Added Successfully!');
```
```
public function store()
    {
        $customer = Customer::create($this->validateRequest());
        $this->storeImage($customer);
        return redirect('customers');
    }
private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',
            'image' => 'sometimes|file|image|max:5000',
        ]);
    }
private function storeImage($customer)
    {
        if (request()->has('image')) {
            $customer->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);
            $image = Image::make(public_path('storage/' . $customer->image))->fit(300, 300, null, 'top-left');
            $image->save();
        }
    }

```
```
public function store()
    {
       request()->validate([
            'fileUpload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
       if ($files = $request->file('fileUpload')) {
           $destinationPath = 'public/image/'; // upload path
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
        }
        return Redirect::to("image")->withSuccess('Great! Image has been successfully uploaded.');
 
    }
```
```
public function store()
    {
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);
        return back()->with('success','You have successfully upload image.');
    }
```
```
public function store()
    {
       request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
       if ($files = $request->file('image')) {
           $destinationPath = 'public/image/'; // upload path
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
           $insert['image'] = "$profileImage";
        }
        $check = Image::insertGetId($insert);
 
        return Redirect::to("image")
        ->withSuccess('Great! Image has been successfully uploaded.');
 
    }
```
```
function imageUpload(Request $request) {

   if ($request->hasFile('input_img')) {  //check the file present or not
       $image = $request->file('input_img'); //get the file
       $name = "//what every you want concatenate".'.'.$image->getClientOriginalExtension(); //get the  file extention
       $destinationPath = public_path('/images'); //public path folder dir
       $image->move($destinationPath, $name);  //mve to destination you mentioned 
       $image->save(); //
   }
}
```
```
public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'url' => 'required',
            'logo' => 'required'
        ]);
 
        $website = new Website;
 
        $website->title = $request->input('title');
 
        $website->url = $request->input('url');
 
        $website->logo = $this->uploadFile('logo', public_path('uploads/'), $request)["filename"];
 
        $website->save();
 
        return redirect()->route('websites.index');
    }
    //In Views
    @if($website->logo != "")
        <img src="{{ url('uploads/' . $website->logo) }}" width="150" />
    @endif
```

Authenticated User
------------------
```
public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required|image'
        ]);
        $imagePath = request('image')->store('uploads', 'public');
        
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);
        
        return redirect('/profile/'.auth()->user()->id);
    }
```
