<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MemberFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Member;
use App\Jamath;
use App\Subscription;
use App\AnnualRate;

class MembersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 	

    public function index()
    {
/* 		if(Auth::user()->admin)
			$members = Member::all();
		else
			$members = Member::where('jamath_id',Auth::user()->jamath_id)->get();
		$jamaths = Member::with('jamath');		
		return view('members.index',compact('members','jamaths')); */
    }
	
    public function create()
    {
		return view('members.create');
    }
	
    public function insert(MemberFormRequest $request)
    {
/*         $member = new Member(array(
			'code' => $request->get('code'),		
            'name' => $request->get('name'),
			'address1' => $request->get('address1'),			
			'address2' => $request->get('address2'),
			'place' => $request->get('place'),
			'district' => $request->get('district'),
			'pin_code' => $request->get('pin_code'),
			'rms' => $request->get('rms'),
			'landline' => $request->get('landline'),
			'mobile' => $request->get('mobile'),
			'email' => $request->get('email'),			
			'ref_name' => $request->get('ref_name'),			
			'ref_phone' => $request->get('ref_phone'),			
			'jamath_id' => $request->get('jamath_id')
        ));
			
		$member->save();

        return redirect()->back()->with('status', 'Member has been created!');
 */    }
	
    public function show($id)
    {

    }	
	
    public function edit($id)
    {
		$member = Member::whereId($id)->firstOrFail();
		$jamathList = Jamath::all();
		return view('members.edit', compact('member','jamathList'));
    }		
	
    public function update($id , MemberFormRequest $request)
    {
/* 		$member = Member::whereId($id)->firstOrFail();
		$member->code = $request->get('code');
		$member->name = $request->get('name');
		$member->address1 = $request->get('address1');
		$member->address2 = $request->get('address2');
		$member->place = $request->get('place');
		$member->district = $request->get('district');
		$member->pin_code = $request->get('pin_code');
		$member->rms = $request->get('rms');
		$member->landline = $request->get('landline');
		$member->mobile = $request->get('mobile');
		$member->email = $request->get('email');			
		$member->ref_name = $request->get('ref_name');
		$member->ref_phone = $request->get('ref_phone');
		$member->jamath_id = $request->get('jamath_id');		

		$member->save();
		return redirect()->back()->with('status', 'Member has been successfully updated!'); */
    }			
	
    public function destroy($id)
    {
		/*
		$member = Member::whereId($id)->firstOrFail();
		$member -> delete();
		return redirect('members/index');
		*/
    }	

    public function assign($familyId,$memberId)
    {
		$member = Member::whereId($memberId)->firstOrFail();
		$member -> family_id = $familyId;
		$member -> save();
    }						
}