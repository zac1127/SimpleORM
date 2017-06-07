<?php

namespace ZacBranson\SimpleORM;

class User extends Model
{
  public function getUser($id)
  {
    return $this->find($id);
  }
}
