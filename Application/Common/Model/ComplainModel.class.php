<?php
namespace Common\Model;
use Think\Model;

class ComplainModel extends Model{

    public function insertComplain($data){

        $data['create_time'] = time();

        return $this->data($data)->add();
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
        return $this->where($wh)->order('complain_id')->select();
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
