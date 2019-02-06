<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace ZFTest;
use ZFT\User;
class UserTest extends \PHPUnit_Framework_TestCase{
    public function testCanCreateUSerObject(){
        $user = new User();
        $this->assertInstanceOf(User::class, $user);
    }
}

