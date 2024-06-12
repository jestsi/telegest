<?php

namespace Gest\Telegest\types;

enum UpdateType : string
{
    case ALL = '*';
    case Message = 'message';
    case InlineQuery = 'inline_query';
}