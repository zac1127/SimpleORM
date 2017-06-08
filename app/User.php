<?php

namespace ZacBranson\SimplePHP;

use ZacBranson\Core\Database\Model;

class User extends Model
{
  public function getUserById($id)
  {
    return $this->find($id);
  }

  public function numberOfUsers()
  {
    return $this->all()->count();
  }

  public function getUserbyAttrubute($attribute, $name)
  {
    return $this->where($attribute, $name)->run();
  }
}
