<?php

namespace ZacBranson\SimplePHP;

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
