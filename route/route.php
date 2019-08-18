<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
/**
 * 后台管理路由
 */

/**
 * 免权限验证路由
 */
Route::group('admin', [
    'login$'=>'admin/Login/login',                                           //登录
    'editPassword'=>'admin/User/editPassword',                              //重置密码
    'logout$'=>'admin/Login/logout',                                         //退出
    'check$'=>'admin/User/check',                                            //验证用户是否存在
    'unlock'=>'admin/Login/unlock',                                        //验证用户是否存在
])->ext('html');
/**
 * 需要权限验证路由
 */
Route::group('admin', [

    //首页
    'index$'=>'admin/Index/index',                                           //首页
    'home'=>'admin/Index/home',                                              //系统信息

    //用户管理
    'userList$'=>'admin/User/userList',                                      //用户列表
    'edit$'=>'admin/User/edit',                                              //添加/编辑用户
    'delete$'=>'admin/User/delete',                                          //删除用户
    'groupList$'=>'admin/User/groupList',                                    //用户组列表
    'editGroup$'=>'admin/User/editGroup',                                    //添加编辑用户组
    'disableGroup$'=>'admin/User/disableGroup',                              //禁用用户组
    'ruleList$'=>'admin/User/ruleList',                                      //用户组规则列表
    'editRule$'=>'admin/User/editRule',                                      //修改用户组规则
       //小程序管理
    'sliderList$'=>'admin/Slider/sliderList',                                   //幻灯片列表
    'edit$'=>'admin/Slider/edit',                                              //添加/编辑幻灯
    'delete$'=>'admin/Slider/delete',                                          //删除幻灯
    'about$'=>'admin/About/about',                                             //删除幻灯
    'uploads$'=>'admin/About/upload',                                           //上传文件
    //产品管理
    'productList$'=>'admin/Product/productList',                                      //用户列表
    'productedit$'=>'admin/Product/edit',                                              //添加/编辑用户
    'productdelete$'=>'admin/Product/delete',                                          //删除用户
    'itemList$'=>'admin/Product/itemList',                                    //用户组列表
    'itemeditItem$'=>'admin/Product/editItem',                                    //添加编辑用户组
    'itemdisableItem$'=>'admin/User/disableItem',                              //禁用用户组
        //门店管理
    'storeList$'=>'admin/store/storeList',                                      //用户列表
    'storeedit$'=>'admin/store/edit',                                              //添加/编辑用户
    'storedelete$'=>'admin/store/delete',                                          //删除用户
    'itemList$'=>'admin/store/itemList',                                    //用户组列表
    'editItem$'=>'admin/store/editItem',                                    //添加编辑用户组
            //客户管理
    'customList$'=>'admin/Custom/customList',                                   //用户列表
    'edit$'=>'admin/Custom/edit',                                              //添加/编辑用户
    'delete$'=>'admin/Custom/delete',                                          //删除用户
    'itemList$'=>'admin/Custom/itemList',                                    //用户组列表
    'editItem$'=>'admin/Custom/editItem',                                    //添加编辑用户组

    //系统管理
    'cleanCache$'=>'admin/System/cleanCache',                                //清除缓存
    'log$'=>'admin/System/loginLog',                                         //登录日志
    'menu$'=>'admin/System/menu',                                            //系统菜单
    'editMenu$'=>'admin/System/editMenu',                                    //编辑菜单
    'deleteMenu$'=>'admin/System/deleteMenu',                                //删除菜单
    'config'=>'admin/System/config',                                         //系统配置
    'siteConfig'=>'admin/System/siteConfig',                                 //站点配置
])->middleware(app\admin\middleware\CheckAuth::class)->ext('html');          //使用中间件验证
/**
 * miss路由
 * 没有定义的路由全部使用该路由
 */
Route::miss('admin/Login/login');
return [
];
