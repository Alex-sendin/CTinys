<?php

if (!defined('_PS_VERSION_')) {
  exit;
}

function upgrade_module_3_0_4($object)
{
    return $object->upgradeFaqs3_0_4();
}