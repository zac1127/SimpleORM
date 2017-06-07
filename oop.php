<?php

use ZacBranson\SimpleORM\User;


var_dump(User::all()->order_by("id", "desc")->limit(2)->run());
