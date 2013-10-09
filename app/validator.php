<?php

Validator::extend('check_password', function($attribute, $value, $parameters)
{
  return User::getUser()->checkPassword($value);

});

/* EOF */
