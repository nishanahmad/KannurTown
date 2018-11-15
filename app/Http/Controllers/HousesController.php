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
		return view('houses.create');
    }
	
    public function store(Request $request)
    {
         $house = new House(array(
            'name' => $request->get('name'),
			'address' => $request->get('address')
			//'test' => 'hello'
        ));
		
		try{
			$house->save();
			return redirect('houses/'.$house->id)->with('success', 'House succesfully created !!!');			
		}	
		catch(\Exception $e){
			return redirect()-> back() ->with('error', 'Some error happened. Please contact admin with the following message : '.$e->getMessage());			
		}
    }
	
    public function show($id)
    {
		$house = House::whereId($id)->firstOrFail();
		$members = $house -> members() -> sortBy('order');
		foreach($members as $member)
		{
			$families[$member -> family_id][] = $member;
		}
		if(isset($families))
		{
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
		}

		return view('houses.show', compact('house','members','families'));
    }	
	
    public function edit($id)
    {
		/*
		$member = Member::whereId($id)->firstOrFail();
		$jamathList = Jamath::all();
		return view('members.edit', compact('member','jamathList'));
		*/
    }		
	
    public function update($id , $request)
    {
		echo 'Hello';
    }			

	public function updateName(Request $request)
	{
		$house = House::whereId($request -> id)->firstOrFail();
		$house -> name = $request->name;
		try{
			$house -> save();
			$response = array('status' => 'success');			
		}
		catch(Exception $e){
			$response = array('status' => 'fail');			
		}

		return response()->json($response); 
	}	
	
	public function updateAddress(Request $request)
	{
		$house = House::whereId($request -> id)->firstOrFail();
		$house -> address = $request->address;
		try{
			$house -> save();
			$response = array('status' => 'success');			
		}
		catch(Exception $e){
			$response = array('status' => 'fail');			
		}

		return response()->json($response); 
	}		
	
    public function destroy($id)
    {
		$members = Member::where('house_id', $id)->get();
		if($members -> count() > 0)
			return redirect()->back()->with('error', 'Members found for this house. Unable to perform delete operation!');
		else
		{
			$house = House::whereId($id)->firstOrFail();
			$houseName = $house -> name;
			$house -> delete();
			return redirect('houses')->with('status', $houseName . ' was deleted successfully !!!');
		}
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