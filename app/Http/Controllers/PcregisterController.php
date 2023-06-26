<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pcregister;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Uuid;
use BaconQrCode\Encoder\Encoder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use TCPDF;
use Illuminate\Http\Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;



class PcregisterController extends Controller
{
    public function create()
    {
        return view('Home.addpc');
    }

    public function store(Request $request)
    {
        // Get the all data  from the form
    $data = 'userId: ' . $request->user_id . ', ' .
        'username: ' . $request->username . ', ' .
        'description: ' . $request->description . ', ' .
        'pc_name: ' . $request->pc_name . ', ' .
        'serial_number: ' . $request->serial_number;
            // Generate QRcode
    $barcode = $data;
    
        $request->validate([
            'user_id' => 'required|unique:pcregisters',
            'username' => 'required',
            'description' => 'required',
            'pc_name' => 'required',
            'serial_number' => 'required|unique:pcregisters',
             'photo' => 'required', 
        ]
        , [
            'user_id.required' => 'The User ID field is required.',
            'user_id.unique' => 'The User ID has already been taken.',
            'username.required' => 'The Username field is required.',
            'description.required' => 'The Description field is required.',
            'pc_name.required' => 'The PC Name field is required.',
            'serial_number.required' => 'The Serial Number field is required.',
            'serial_number.unique' => 'The Serial Number has already been taken.',
        ]);
        $pcregister = new pcregister();
        $pcregister->user_id = $request->user_id;
        $pcregister->username = $request->username;
        $pcregister->description = $request->description;
        $pcregister->pc_name = $request->pc_name;
        $pcregister->serial_number = $request->serial_number;

        // Handle photo upload 
        $img = $request->photo;
        $folderPath = "uploads/";
        
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';
        
        $file = $folderPath . $fileName;
        Storage::put($file, $image_base64);
        $pcregister->photo = $file;
        // dd('Image uploaded successfully: '.$fileName);
        $pcregister->barcode = $barcode;
        $pcregister->save();
            // Generate barcode PDF
    $pdf = new TCPDF();
    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 12);
    $style = array('N'); // Create an array with the style value

    $pdf->write2DBarcode($barcode, 'QRCODE,L', 10, 10, 50, 50, $style);
    $pdfContent = $pdf->Output('', 'S');
       // Save barcode PDF to file path
       $filePath = 'barcode.pdf';
       Storage::put($filePath, $pdfContent);
        alert::success('added succcess fully','pc is register cessfully');
        // qrcode png image
        $qrCodeData = QrCode::format('png')->size(400)->generate("fuad");
        $qrCodeData = base64_encode($qrCodeData);

         // Save barcode png to file path
    //    $filePath = 'barcode.png';
    //    Storage::put($qrCodeData, $pdfContent);
    //     alert::success('added succcess fully','pc is register cessfully');
        // return redirect()->route('pcregisters.index')->with('success', 'Data saved successfully.');
        // return redirect()->back();
        return view('home.successpc', ['qrCodeData' => $qrCodeData]);
        // return view('home.successpc', ['barcode' => $barcode, 'filePath' => $filePath]);
    }
        public function downloadQRCode()
    {
        $qrCodeData = QrCode::format('png')->size(400)->generate("fuad");
        $imageData = base64_encode($qrCodeData);

        $headers = [
            'Content-Type' => 'image/png',
            'Content-Disposition' => 'attachment; filename="qr_code.png"',
        ];

        return Response::make($qrCodeData, 200, $headers);
    }
public function download (Request $request){
    $test = 'barcode.pdf';
    $file = Storage::download($test);

    return $file;
    
}
    public function index()
    {
        $pcregisters = pcregister::all();
        return view('Home.showpc', compact('pcregisters'));
    }
    public function searchbyqr(){
        return view('auth.scanQrcode');
    }
    public function qr_result(Request $request){
        $result =0;
        $data = $request->getContent();
        if ($request->data) {
            $user = pcregister::where('barcode',$request->data)->first();
            if ($user) {
                return view('home.search_result', ['user' => $user]);
                $result =1;
             }else{
                 $result =0;
                 return redirect()->back();
             }
        }
        return $result;

    }
    
public function search()
{
    return view('home.search');
    
}
public function searchUser(Request $request)
{
    $userId = $request->input('user_id');
    // $user = pcregister::find($userId);
    $user = pcregister::where('user_id',$userId)->first();

    if ($user) {
        return view('home.search_result', ['user' => $user]);
    } else {
        Alert::warning('Error', 'User not found');
        alert::success('added succcess fully','pc is register cessfully');
        return redirect()->back();
    }
}
public function delete_pcregister($id)
{
    $pcregister = pcregister::find($id);
    
    if ($pcregister) {
        $pcregister->delete();
        return redirect()->back();
    } else {
        return back()->with('error', 'PC Register not found.');
    }
}
public function edit_pcregister($id){
    $pcregister = pcregister::find($id);
    return view('home.updatepc',['pcregister'=>$pcregister]);
}
public function update(Request $request){
    
     $pcregister = pcregister::find($request->id);
     $pcregister->user_id = $request->user_id;
     $pcregister->username = $request->username;
     $pcregister->description = $request->description;
     $pcregister->pc_name = $request->pc_name;
     $pcregister->serial_number = $request->serial_number;
     if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos');
            $pcregister->photo = $photoPath;
        }
     $pcregister->save();
     alert::success('update succcess fully','pc is register scessfully updated');
     return redirect('index');
}

  
}
