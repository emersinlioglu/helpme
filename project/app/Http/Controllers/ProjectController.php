<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Category;
use App\Donation;
use App\Project;
use App\ProjectImage;
use App\SectionTitles;
use App\Settings;
use App\Subscribers;
use App\UserProfile;
use App\Country;
use App\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $language = SectionTitles::findOrFail(1);
        $projects = Project::orderBy('id','desc')->get();
        return view('admin.project.list',compact('projects','language'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $categories = Category::all();
        $categories = [];
        return view('admin.project.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Project;
        $data->fill($request->all());

        $data->save();

        return redirect('admin/project')->with('message','New Project Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        $projectImages = ProjectImage::all();
        return view('admin.project.details',compact('project', 'projectImages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $projectImages = $project->projectImages;
        return view('admin.project.edit',compact('project','projectImages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->update($request->all());

        return redirect('admin/project')->with('message','Project Updated Successfully.');;
    }

    public function title()
    {
        $languages = SectionTitles::findOrFail(1);
        return view('admin.campaign-title',compact('languages'));
    }

    public function titles(Request $request)
    {
        $service = SectionTitles::findOrFail(1);
        $data['pricing_title'] = $request->pricing_title;
        $data['pricing_text'] = $request->pricing_text;
        $data['newcamp_title'] = $request->newcamp_title;
        $data['newcamp_text'] = $request->newcamp_text;
        $service->update($data);
        return redirect('admin/campaign/titles')->with('message','Campaign Section Title & Text Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campaign = Campaign::findOrFail($id);
        unlink('assets/images/campaign/'.$campaign->feature_image);
        $campaign->delete();

        return redirect('admin/campaign')->with('message','Campaign Deleted Successfully.');
    }


    public function pending()
    {
        $campaigns = Campaign::where('status','pending')
                ->where('admin_aproved','no')
                ->get();
        return view('admin.campaignpending',compact('campaigns'));
    }

    public function pendingview($id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('admin.viewpending',compact('campaign'));
    }


    public function accept($id)
    {
        $campaign = Campaign::findOrFail($id);

        $message = "Your Submitted Campaign Has Been Accepted Successfully.";
        mail($campaign->createdby->email,"Your Campaign Has Been Accepted",$message);

        $data['admin_aproved'] = "yes";
        $data['status'] = "running";
        $campaign->update($data);

        return redirect('admin/campaign/pending')->with('message','Campaign Approved Successfully.');
    }

    public function reject($id)
    {
        $campaign = Campaign::findOrFail($id);

        $reason = Input::get('reason');
        $message = "Reason: ".$reason;
        mail($campaign->createdby->email,"Your Campaign Has Been Rejected",$message);

        $data['admin_aproved'] = "no";
        $data['status'] = "reject";
        $campaign->update($data);

        return redirect('admin/campaign/pending')->with('message','Campaign Rejected Successfully.');
    }

    public function hardreject($id)
    {
        $campaign = Campaign::findOrFail($id);

        $reason = Input::get('reason');
        $message = "Reason: ".$reason;
        mail($campaign->createdby->email,"Your Campaign Has Been Rejected",$message);

        $campaign->delete();
        return redirect('admin/campaign/pending')->with('message','Campaign Rejected & Deleted Successfully.');
    }


    public function close($id)
    {
        $campaign = Campaign::findOrFail($id);
        $data['status'] = "closed";
        $campaign->update($data);

        return redirect('admin/campaign')->with('message','Campaign Closed Successfully.');
    }

    public function open($id)
    {
        $campaign = Campaign::findOrFail($id);
        if ($campaign->admin_aproved=="yes"){
            $data['status'] = "running";
        }else{
            $data['status'] = "pending";
        }
        $campaign->update($data);

        return redirect('admin/campaign')->with('message','Campaign Opened Successfully.');
    }

    public function withdraw($id)
    {
        $campaign = Campaign::findOrFail($id);
        $countries = Country::all();
        return view('admin.withdrawfund',compact('campaign','countries'));
    }

    public function withdraws(Request $request,$id)
    {
        $from = UserProfile::findOrFail(Auth::user()->id);

        $campaign = Campaign::findOrFail($id);

        $withdrawcharge = Settings::findOrFail(1);
        $wcharge = $withdrawcharge->withdraw_charge;

        if($request->amount > 0){

            $charge = ($wcharge / 100) * $request->amount;
            $charge = number_format((float)$charge,2,'.','');

            $amount = $request->amount - $charge;
            $amount = number_format((float)$amount,2,'.','');

            if ($campaign->available_fund >= $request->amount){

                $balance1['available_fund'] = $campaign->available_fund - $request->amount;
                $campaign->update($balance1);

                $newwithdraw = new Withdraw();
                $newwithdraw['campid'] = $id;
                $newwithdraw['method'] = $request->methods;
                $newwithdraw['acc_email'] = $request->acc_email;
//                $newwithdraw['acc_phone'] = $request->acc_phone;
                $newwithdraw['iban'] = $request->iban;
                $newwithdraw['country'] = $request->acc_country;
                $newwithdraw['acc_name'] = $request->acc_name;
                $newwithdraw['address'] = $request->address;
                $newwithdraw['swift'] = $request->swift;
//                $newwithdraw['reference'] = $request->reference;
                $newwithdraw['amount'] = $amount;
                $newwithdraw['fee'] = $charge;
                $newwithdraw->save();

                return redirect()->back()->with('message','Withdraw Request Sent Successfully.');

            }else{
                return redirect()->back()->with('error','Insufficient Balance.')->withInput();
            }
        }
        return redirect()->back()->with('error','Please enter a valid amount.')->withInput();
    }

    public function delete($id)
    {
        Withdraw::where('campid',$id)->delete();
        Donation::where('campid',$id)->delete();
        $campaign = Campaign::findOrFail($id);
        unlink('assets/images/campaign/'.$campaign->feature_image);
        $campaign->delete();

        return redirect('admin/campaign')->with('message','Campaign Deleted Successfully.');
    }
}
