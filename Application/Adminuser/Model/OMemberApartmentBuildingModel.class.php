<?php
namespace Adminuser\Model;
use Think\Model;

class OMemberApartmentModel extends Model{

    public function insertMemberApartment($data){
        if ($this->create($data)) {
            return $this->add();
        } else {
            return false;
        }
    }

    public function cancelMemberApartment($memberId, $apartmentId){
        $now = time();
        $this->where([
            'member_id' => $memberId,
            'apartment_id' => $apartmentId,
            'status'=> ['lt', 3],
        ])->data([
            'status'=> 3,
            'cancel_time' => $now,
        ])->save();
    }

    public function getMember($memberId, $cabinetId=NULL){
        $wh = ['o_member_apartment.member_id' => $memberId];
        if($cabinetId) {
            $wh = array_merge($wh, [
                'o_apartment_cabinet.cabinet_id' => $cabinetId,
            ]);
        }
        $wh = array_merge($wh, [
            'o_member_apartment.status' => 1,
            'o_member_apartment.approve_status' => 1,
        ]);
        return $this
            ->field('
                o_member_apartment.*,
                member_profile.*,
                member.phone,
                o_apartment.*,
                o_building.*,
                o_room.*,
                o_member_apartment.price as price
            ')
            ->join('member_profile on member_profile.member_id = o_member_apartment.member_id')
            ->join('member on member.member_id = o_member_apartment.member_id')
            ->join('o_apartment on o_member_apartment.apartment_id = o_apartment.apartment_id')
            ->join('o_apartment_cabinet on o_member_apartment.apartment_id = o_apartment_cabinet.apartment_id')
            ->join('o_building on o_member_apartment.building_id = o_building.building_id')
            ->join('o_room on o_member_apartment.room_id = o_room.room_id')
            ->where($wh)->find();
    }

    public function hasBind($memberId, $apartmentId){
        return $this->where([
            'member_id' => $memberId,
            'apartment_id' => $apartmentId,
            'status' => ['neq', 3],
            //'cancel_time' => ['exp', 'is null'],
            'cancel_time' => 0,
        ])->count() > 0;
    }

    public function getMemberApartmentList($wh = array()){
        return $this->field('
            o_member_apartment.*,
            member_profile.*,
            o_apartment.*,
            o_building.*,
            o_room.*,
            o_member_apartment.price as price
            ')
            ->join('member_profile on member_profile.member_id = o_member_apartment.member_id')
            ->join('o_apartment on o_member_apartment.apartment_id = o_apartment.apartment_id')
            ->join('o_building on o_member_apartment.building_id = o_building.building_id')
            ->join('o_room on o_member_apartment.room_id = o_room.room_id')
            ->where($wh)->select();
    }

    /** 
     * o_member_apartment.charge_day 1 ~ 31
     * o_member_apartment.last_charge_time

        //如果上一次charge的时间在今天之前
        if last_charge_time < (time() - time()%86400 - 1)
            //一个月的最后一天
            if date('j') == date('t')
                charge now
            //非一个月的最后一天，但是 charge_day
            else if date('j') == charge_day
                charge now

     */
    public function getToChargeList() {

        $now = time();
        $todayDay = date('j');
        $monthDayCount = date('t');
        
        $wh = [
            'last_charge_time' => [
                ['lt', $now - $now/86400 - 1],
                ['exp', 'is null'],
                'or'
            ],
            'status' => ['neq', 3],
            'cancel_time' => 0,
        ];

        if($todayDay === $monthDayCount) {
            $wh['charge_day'] = ['gte', $todayDay];
        } else {
            $wh['charge_day'] = $todayDay;
        }

        return $this->where($wh)->select();
    }   

    public function updateMemberApartment($wh, $upd) {
        return $this->where($wh)->data($upd)->save();
    }
    public function insertMember($data){
       if ($this->create($data)) {
            return $this->add();
        } else {
            return false;
        }
    }
    public function getBodyList($where = array()){
        return $this->where($where)->select();
    }
	public function getMember($wh){
        return $this->where($wh)->find();
    }
    public function getMemberList($wh){
        return $this->where($wh)->order('member_id')->select();
    }
	
	public function deleteMember($wh){
        return $this->where($wh)->delete();
    }
	
	public function updateMember($wh, $data){
        return $this->data($data)->where($wh)->save();
    }
	
    public function getCabinetList($where = array()){
        return $this->where($where)->select();
    }
}
