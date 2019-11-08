Unauthenticated User
------------------
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
