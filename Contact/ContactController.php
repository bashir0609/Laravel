use Illuminate\Support\Mail;

public fuction create()
{
  return view('contact.create');
}
public function store()
{
  $data = request()->valudate([
    'name' => 'required',
    'email' => 'required|email',
    'message' => 'required',
  ]);
  
  Mail::to('test@test.com')->send(new ContactMail($data));
  
  Return redirect('contact')->with('message', 'Thanks for your message, We will be in touch.');
  
}
