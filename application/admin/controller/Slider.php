<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/18
 * Time: 15:05
 */

namespace app\admin\controller;

use app\admin\model\AuthGroup;
use app\admin\model\AuthGroupAccess;
use app\admin\model\AuthRule;
use app\admin\service\UserService;
use app\admin\service\AuthGroupService;
use app\admin\model\User as UserModel;

class Slider extends Common
{
    /**
     * 用户列表
     * @return mixed
     * @throws \think\exception\DbException
     * @author 原点 <467490186@qq.com>
     */
    public function sliderList()
    {
        if ($this->request->isAjax()) {
            $data = [
                'key' => $this->request->get('key', '', 'trim'),
                'limit' => $this->request->get('limit', 10, 'intval'),
            ];
            $list = UserModel::withSearch(['id'], ['id' => $data['key']])              
                ->paginate($data['limit'], false, ['query' => $data]);
            $user_date = [];
            foreach ($list as $key => $val) {
                $user_date[$key] = $val;
                $user_date[$key]['title'] = $val->group_titles;
            }
            return show($user_date, 0, '', ['count' => $list->total()]);
        }
        return $this->fetch();
    }

    /**
     * 添加、编辑用户
     * @return mixed
     * @author 原点 <467490186@qq.com>
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function edit()
    {
        if ($this->request->isPost()) {
            $data = $this->request->post();
            if ($data['id']) {
                //编辑
                $res = UserService::edit($data);
                return $res;
            } else {
                //添加
                $data = UserService::add($data);
                return $data;
            }
        } else {
            $uid = $this->request->get('id', 0, 'intval');
            if ($uid) {
                $list = UserModel::where('id', '=', $id)->find();
                $list['group_id'] = AuthGroupAccess::where('id', '=', $id)->column('group_id');
                $this->assign('list', $list);
            }
            $grouplist = AuthGroup::column('id,title');
            $this->assign('grouplist', $grouplist);
            return $this->fetch();
        }
    }


    /**
     * 删除用户
     * @author 原点 <467490186@qq.com>
     */
    public function delete()
    {
        $id = $this->request->param('uid', 0, 'intval');
        if ($id) {
            if ($uid != 1) {
                $res = UserService::delete($uid);
                return $res;
            } else {
                $this->error('至少保留一张幻灯');
            }
        } else {
            $this->error('参数错误');
        }
    }

   
}