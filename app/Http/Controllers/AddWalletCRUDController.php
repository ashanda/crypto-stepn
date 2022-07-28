<?php

namespace App\Http\Controllers;
use App\Models\UserCryptoWallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddWalletCRUDController extends Controller
{
 public function index()
{
$data['usercryptowallets'] = UserCryptoWallet::where('uid','=',Auth::user()->uid)->orderBy('id','desc')->paginate(5);
return view('user.usercryptowallets.index', $data);
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
return view('user.usercryptowallets.create');
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
$request->validate([
'currency_type' => 'required',
'network' => 'required',
'wallet_address' => 'required'
]);
$usercryptowallet = new UserCryptoWallet;
$usercryptowallet->uid = Auth::user()->uid;
$usercryptowallet->currency_type = $request->currency_type;
$usercryptowallet->network = $request->network;
$usercryptowallet->wallet_address = $request->wallet_address;
$usercryptowallet->save();
return redirect()->route('add_wallet.index')
->with('success','UserCryptoWallet has been created successfully.');
}
/**
* Display the specified resource.
*
* @param  \App\usercryptowallet  $usercryptowallet
* @return \Illuminate\Http\Response
*/
public function show(UserCryptoWallet $usercryptowallet)
{
return view('usercryptowallets.show',compact('usercryptowallet'));
} 
/**
* Show the form for editing the specified resource.
*
* @param  \App\UserCryptoWallet  $usercryptowallet
* @return \Illuminate\Http\Response
*/
public function edit(UserCryptoWallet $usercryptowallet)
{
return view('user.usercryptowallets.edit',compact('usercryptowallet'));
}
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  \App\usercryptowallet  $usercryptowallet
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
$request->validate([
    'currency_type' => 'required',
    'network' => 'required',
    'wallet_address' => 'required'
]);
$usercryptowallet = UserCryptoWallet::find($id);
$usercryptowallet->currency_type = $request->currency_type;
$usercryptowallet->network = $request->network;
$usercryptowallet->wallet_address = $request->wallet_address;
$usercryptowallet->save();
return redirect()->route('add_wallet.index')
->with('success','UserCryptoWallet Has Been updated successfully');
}
/**
* Remove the specified resource from storage.
*
* @param  \App\UserCryptoWallet  $usercryptowallet
* @return \Illuminate\Http\Response
*/
public function destroy($usercryptowallet)
{
DB::delete('delete from user_crypto_wallets where id = ?',$usercryptowallet);    
return redirect()->route('add_wallet.index')
->with('success','UserCryptoWallet has been deleted successfully');
}

}
