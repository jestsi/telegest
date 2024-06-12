<?php

namespace Gest\Telegest\types;

enum InlineQueryResultType : string
{
    case ARTICLE = 'article';
    case PHOTO = 'photo';
    case GIF = 'gif';
    case MPEG4_GIF = 'mpeg4_gif';
    case VIDEO = 'video';
    case AUDIO = 'audio';
    case VOICE = 'voice';
    case DOCUMENT = 'document';
    case LOCATION = 'location';
    case VENUE = 'venue';
    case CONTACT = 'contact';
    case GAME = 'game';
    case STICKER = 'sticker';
}