<?php

use ZacBranson\SimpleORM\User;

$user = new User;
dd($user->getUserbyAttrubute("name", "Zachary Branson"));
