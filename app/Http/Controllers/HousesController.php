<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\House;
use App\Member;

use Illuminate\Http\Request;

class HousesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 	
	
    public function index()
    {
		$houses = House::all();
		$members = Member::where('order',1) -> get();
		$houseMap = array();
		foreach($members as $member)
		{
			if(isset($houseMap[$member -> house_id]))
				$houseMap[$member -> house_id] = $houseMap[$member -> house_id] .', '.$member->name;
			else
				$houseMap[$member -> house_id] = $member->name;
		}
		
		return view('houses.index',compact('houses','houseMap')); 
    }    
	
    public function create()
    {
		return view('members.create');
    }
	
    public function insert(MemberFormRequest $request)
    {
/*         $member = new Member(array(
			'code' => $request->get('code'),		
            'name' => $request->get('name')
        ));
			
		$member->save();

        return redirect()->back()->with('status', 'Member has been created!');
 */    }
	
    public function show($id)
    {
		$house = House::whereId($id)->firstOrFail();
		$members = $house -> members() -> sortBy('order');
		foreach($members as $member)
		{
			$families[$member -> family_id][] = $member;
		}
		ksort($families);
		foreach($families as $id => $members)
		{
			$order = 1;
			foreach($members as $member)
			{
				$member -> order = $order;
				$member -> save();
				$order++;						
			}			
		}				
		return view('houses.show', compact('house','members','families'));
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
	
    public function assign($id)
    {
		$house = House::whereId($id)->firstOrFail();
		$members = $house -> members() -> sortBy('order');
		foreach($members as $member)
		{
			$families[$member -> family_id][] = $member;
		}
		ksort($families);
		return view('houses.assign', compact('house','members','families'));
    }				
}