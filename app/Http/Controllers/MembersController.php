<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MemberFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Member;

class MembersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 	

    public function index()
    {
		
		$jamaths = Member::with('jamath');		
		return view('members.index',compact('members','jamaths')); 
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
        ));
			
		$member->save();

        return redirect()->back()->with('status', 'Member has been created!');
 */    }
	
    public function show($id)
    {
		$member = Member::whereId($id)->firstOrFail();
		return view('members.show', compact('member'));
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

    public function assign($memberId,$familyId)
    {
		$member = Member::whereId($memberId)->firstOrFail();
		$member -> family_id = $familyId;
		$member -> save();
    }						
	
    public function reorder($memberId,$order)
    {
		$member = Member::whereId($memberId)->firstOrFail();
		
		$members = Member::where('order','>=', $order)
					->where('house_id',$member -> house_id)
					->where('family_id',$member -> family_id)
					->get();			
		foreach($members as $mem)
		{
			$mem -> order = $mem -> order + 1;
			$mem -> save();
		}
		
		$member -> order = $order;
		$member -> save();
    }							
}