<?php

if (!defined('_PS_VERSION_')) {
  exit;
}

function upgrade_module_3_0_1($object)
{
  return $object->upgradeFaqs3_0_1();
}