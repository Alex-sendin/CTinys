<?php

if (!defined('_PS_VERSION_')) {
  exit;
}

function upgrade_module_3_1_8($object)
{
    return $object->upgradeFaqs3_1_8();
}