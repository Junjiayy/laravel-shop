<?php
/**
 * Created by PhpStorm.
 * User: reliy
 * Date: 2018/7/5
 * Time: 上午12:47
 */

/**
 * 根据当前的路由名获得一个格式化的css类名
 * @return string
 */
function route_class() {
    return str_replace('.','-',Route::currentRouteName());
}