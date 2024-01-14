<?php

namespace App\Enums;

enum StateType: string
{
    case NEW = 'new';
    case ACTIVE = 'active';
    case ARCHIVED = 'archived';
}
