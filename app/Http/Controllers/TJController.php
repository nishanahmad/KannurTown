<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MemberFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Member;
use App\Tj;

class TJController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 	

    public function index($year)
    {
		$list = Tj::where('year',$year)->get();		
		return view('tj.index',compact('list'));
    }
	
    public function create()
    {
		//return view('members.create');
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
		/*
		$member = Member::whereId($id)->firstOrFail();
		return view('members.show', compact('member'));
		*/
    }	
	
    public function edit($id)
    {
		/*
		$member = Member::whereId($id)->firstOrFail();
		$jamathList = Jamath::all();
		return view('members.edit', compact('member','jamathList'));
		*/
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
}