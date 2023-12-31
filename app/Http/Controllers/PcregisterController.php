<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pcregister;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Uuid;
use Picqer\Barcode\BarcodeGeneratorPNG;
use BaconQrCode\Encoder\Encoder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use TCPDF;
use Illuminate\Http\Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;


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
        $Register_BY=Auth::user()->security_id;
        $pcregister = new pcregister();
        $pcregister->Register_BY = $Register_BY;
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
        
        // $file = $folderPath . $fileName;
        // Storage::put($file, $image_base64);
        // $pcregister->photo = $file;

        $file = public_path('data/' . $fileName);
        file_put_contents($file, $image_base64);

        $pcregister->photo = 'data/' . $fileName;
        // dd('Image uploaded successfully: '.$fileName);

        // Generate barcode
    
        
         // Generate QRcode
         $qrCodeData = QrCode::format('png')->size(400)->generate($pcregister->user_id);
         //save qrcode  to file path
    


         // Generate barcode
     // Replace with your barcode data
    $barcodeGenerator = new BarcodeGeneratorPNG();
    $barcodeImage = $barcodeGenerator->getBarcode($pcregister->user_id, $barcodeGenerator::TYPE_CODE_128);
 
$userId = $pcregister->username;
$barcodeFilePath = storage_path('barcode/' . $userId . '.png');
    file_put_contents($barcodeFilePath, $barcodeImage);



// Save QR code to a file
    $qrCodeFilePath = storage_path('qrcode/'.$userId.'.png');
    file_put_contents($qrCodeFilePath, $qrCodeData);
    // Save barcode to a file
        // $barcodeFilePath = storage_path('barcode/barcode.png');
        // file_put_contents($barcodeFilePath, $barcodeImage);
        $pcregister->barcode = $barcode;
        $pcregister->save();
            // Generate barcode PDF
    $pdf = new TCPDF();
    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 12);
    $style = array('N'); // Create an array with the style value
    $barcode = '123456789';
    $pdf->write1DBarcode($barcode, 'C39', '', '', 80, 25, 0.4, $style, 'N');
    $pdfContent = $pdf->Output('', 'S');
       // Save barcode PDF to file path
    //    $filePath = 'barcode.pdf';
    //    Storage::put($filePath, $pdfContent);
    //     alert::success('added succcess fully','pc is register cessfully');
        // qrcode png image


        //  Save barcode png to file path
    //    $filePath = 'barcode.png';
    //    Storage::put($filePath, $qrCodeData);
    //     alert::success('added succcess fully','pc is register cessfully');
        // return redirect()->route('pcregisters.index')->with('success', 'Data saved successfully.');
        // return redirect()->back();
        // return view('home.successpc', ['qrCodeData' => $qrCodeData]);
        
        $pcregisters=pcregister::all();
      
        session()->flash('success', 'PC is registered successfully');
        return view('home.successpc', ['pcregisters' => $pcregisters,'barcode' => $barcode, 'qrCodeData' => $qrCodeFilePath]);
    
        // session()->flash('error', 'Failed to register PC');
        // return view('home.successpc', ['barcode' => $barcode,])->with('user', $user);
    
    }
        public function downloadQRCode(Request $request)
    {
        $userId = $request->input('username');
        $filePath = storage_path('qrcode/' . $userId . '.png');
        
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            // Handle the scenario when the QR code file does not exist
            return redirect()->back()->with('message', 'QR code file not found.');
        }
    }
    public function downloadBothCode(Request $request)
    {
        $pcregisters=pcregister::all();
        return view('home.successpc', ['pcregisters' => $pcregisters,]);
    
    
    }

    public function downloadBarCode(Request $request)
    {
        $userId = $request->input('username');
        $filePath = storage_path('barcode/' . $userId . '.png');
        
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            // Handle the scenario when the QR code file does not exist
            return redirect()->back()->with('message', 'QR code file not found.');
        }
    
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
        $data = $request->input('data');
        $user = pcregister::where('user_id', $data)->first();
    
        if ($user) {

            
            $userDetails = [
                'userid' => $user->user_id,
                'name' => $user->username,
                'serial' => $user->serial_number,
                'description'=>$user->description,
                'pc_name'=>$user->pc_name,
                'photo'=>$user->photo,
            ];
    
            return response()->json([
                'userExists' => true,
                'userDetails' => $userDetails
            ]);
        } else {
            return response()->json([
                'userExists' => false
            ]);
        }

    }
    
public function search()
{
    return view('home.search_pc');
    
}
public function searchUser(Request $request)
{
    $userId = $request->input('user_id');
    // $user = pcregister::find($userId);
    $user = pcregister::where('user_id',$userId)->first();

    if ($user) {
        // alert::success('user found','user are correctly found');
        return view('home.search_result', ['user' => $user]);
       
    } else {
        // alert::success('user found','user are correctly found');
        // alert::success('no data','user not found');
        return view('home.search');
    
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


public function searchUpdate(Request $request)
 {
    $userId = $request->input('user_id');
    $pcregister = pcregister::where('user_id', $userId)->first();

    if ($pcregister) {
        return view('home.updatepc', ['pcregister'=>$pcregister]);
    } else {
        return redirect()->back()->with('error', 'User not found.');
    }
 }
 
 public function alldownload(){
    $pcregisters=pcregister::all();
    return view('home.successpc', ['pcregisters' => $pcregisters,]);
 } 


 public function searchBarcode(Request $request)
 {
    $userId = $request->input('user_id');
    // $user = pcregister::find($userId);
    $user = pcregister::where('user_id',$userId)->first();

    if ($user) {
        return view('home.download', ['user' => $user]);
    } else {
        
        return view('home.search',);
    }


 }
  
}
