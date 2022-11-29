<?php

/**
 * Create info
 * User: khanhnp
 * Time: 2022/09/15 11:37pm
 */

namespace App\Http\Utils;

class RoleUtils{
    // user permissions
    const ROLE_ADMIN = 0;
    const ROLE_BCN_KHOA = 1;
    const ROLE_QLSV = 2;
    const ROLE_CVHT = 3;
    const ROLE_STUDENT = 4;

    public static function getRoleName($role_flg){
        switch($role_flg){
            case self::ROLE_ADMIN:
                return "Admin";
                break;
            case self::ROLE_BCN_KHOA:
                return "Chủ nhiệm Khoa";
                break;
            case self::ROLE_QLSV:
                return "QL Sinh viên";
                break;
            case self::ROLE_CVHT:
                return "Cố vấn học tập";
                break;
            case self::ROLE_STUDENT:
                return "Sinh viên";
                break;
        }
    }
}
