<?php

namespace Gest\Telegest\types;

use ReflectionClass;

enum MessageType : string
{
    case TEXT = 'text';
    case AUDIO = 'audio';
    case DOCUMENT = 'document';
    case PHOTO = 'photo';
    case STICKER = 'sticker';
    case VIDEO = 'video';
    case VOICE = 'voice';
    case VIDEO_NOTE = 'video_note';
    case CONTACT = 'contact';
    case LOCATION = 'location';
    case VENUE = 'venue';
    case POLL = 'poll';
    case DICE = 'dice';
    case NEW_CHAT_MEMBERS = 'new_chat_members';
    case LEFT_CHAT_MEMBER = 'left_chat_member';
    case NEW_CHAT_TITLE = 'new_chat_title';
    case NEW_CHAT_PHOTO = 'new_chat_photo';
    case DELETE_CHAT_PHOTO = 'delete_chat_photo';
    case GROUP_CHAT_CREATED = 'group_chat_created';
    case SUPERGROUP_CHAT_CREATED = 'supergroup_chat_created';
    case CHANNEL_CHAT_CREATED = 'channel_chat_created';
    case MIGRATE_TO_CHAT_ID = 'migrate_to_chat_id';
    case MIGRATE_FROM_CHAT_ID = 'migrate_from_chat_id';
    case PINNED_MESSAGE = 'pinned_message';
    case INVOICE = 'invoice';
    case SUCCESSFUL_PAYMENT = 'successful_payment';
    case CONNECTED_WEBSITE = 'connected_website';
    case PASSPORT_DATA = 'passport_data';
}