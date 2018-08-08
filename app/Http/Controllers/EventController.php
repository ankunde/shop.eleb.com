<?php

namespace App\Http\Controllers;

use App\Model\Event;
use App\Model\EventMember;
use App\Model\EventPrizes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
            'except'=>[]
        ]);
    }
    /**
     * 活动列表
     */
    public function index(){
            $event = Event::all();
            $content = view('event.index',compact('event'));
            return $content;
    }
    /**
     * 查看活动
     */
    public function show(Request $request,Event $event){
            $content = view('event.show',compact('event'));
            return $content;
    }
    /**
     * 报名活动
     */
    public function status(Request $request,Event $event)
    {
        //>>1.开启Redis,并且报名
        $signup_num = Redis::incr('signup_num');
        //>>2.查询报名的活动
        $event = Event::where('id',$event->id)->first();
        //>>2.判断报名人数是否超过上限
        if($signup_num>$event->signup_num){
            Redis::decr('signup_num');
            return redirect()->back()->with('danger','该活动人数已达上限');
        }
        //>>2.查询当家商户id
        $user_id = Auth::user()->id;
        //>>3.判断活动人数
        if($event->signup_num<=0){
            return redirect()->back()->with('danger','该活动人数已达上限');
        }
        //>>4.查询改用户是否已经参加过该活动
//        $eventmember = DB::select("select count(*) from event_members where events_id=? and member_id=?",[$event->id,$user_id]);
        $eventmember = DB::table('event_members')
            ->select(DB::raw (" * "))
            ->where('events_id',$event->id)
            ->where('member_id',$user_id)
            ->first();

        if($eventmember){
            return redirect()->back()->with('danger','您以参加该活动,无需重复参加');
        }
        //>>5.报名此活动
        DB::transaction(function () use($event,$user_id) {
                //>>6.跟改活动表人数
                $event->update([
                    'signup_num'=>$event->signup_num-1
                ]);
                //>>7.添加报名表
                EventMember::create([
                    'events_id'=>$event->id,
                    'member_id'=>$user_id
                ]);
        });
        return redirect()->route('event.index')->with('success','报名活动成功');
    }
    /**
     * 查看开奖结果
     */
    public function lottery(Request $request,Event $event){
        $event_id = $event->id;//当前活动id
        $eventprizes = EventPrizes::where('events_id',$event_id)->get();
        return view('event.lottery',compact('eventprizes'));
    }
}
