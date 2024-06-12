<?php

namespace Gest\Telegest\models;

use Gest\Telegest\Config;

/**
 * Class representing a message from the Telegram Bot API.
 *
 * @property int $id The unique identifier for the message.
 * @property User|null $from Sender, empty for messages sent to channels.
 * @property int $date Date the message was sent in Unix time.
 * @property Chat $chat Conversation the message belongs to.
 * @property User|null $forward_from For forwarded messages, sender of the original message.
 * @property Chat|null $forward_from_chat For messages forwarded from channels or from anonymous administrators, information about the original sender chat.
 * @property int|null $forward_from_message_id For messages forwarded from channels, identifier of the original message in the channel.
 * @property string|null $forward_signature For messages forwarded from channels, signature of the post author if present.
 * @property string|null $forward_sender_name Sender's name for messages forwarded from users who disallow adding a link to their account in forwarded messages.
 * @property int|null $forward_date For forwarded messages, date the original message was sent in Unix time.
 * @property Message|null $reply_to_message For replies, the original message.
 * @property User|null $via_bot Bot through which the message was sent.
 * @property int|null $edit_date Date the message was last edited in Unix time.
 * @property string|null $media_group_id The unique identifier of a media message group this message belongs to.
 * @property string|null $author_signature Signature of the post author for messages in channels.
 * @property string|null $text For text messages, the actual UTF-8 text of the message.
 * @property array|null $entities For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text.
 * @property array|null $caption_entities For messages with a caption, special entities like usernames, URLs, bot commands, etc. that appear in the caption.
 * @property string|null $caption For messages with a caption, the actual UTF-8 text of the caption.
 * @property array|null $audio Message is an audio file, information about the file.
 * @property array|null $document Message is a general file, information about the file.
 * @property array|null $photo Message is a photo, available sizes of the photo.
 * @property array|null $sticker Message is a sticker, information about the sticker.
 * @property array|null $video Message is a video, information about the video.
 * @property array|null $voice Message is a voice message, information about the file.
 * @property array|null $video_note Message is a video note, information about the video message.
 * @property Contact|null $contact Message is a shared contact, information about the contact.
 * @property Dice|null $dice Message is a dice with random value.
 * @property Game|null $game Message is a game, information about the game.
 * @property Poll|null $poll Message is a native poll, information about the poll.
 * @property Venue|null $venue Message is a venue, information about the venue.
 * @property Location|null $location Message is a shared location, information about the location.
 * @property array|null $new_chat_members New members that were added to the group or supergroup and information about them.
 * @property User|null $left_chat_member A member was removed from the group.
 * @property string|null $new_chat_title A chat title was changed to this value.
 * @property array|null $new_chat_photo A chat photo was changed to this value.
 * @property bool|null $delete_chat_photo Service message: the chat photo was deleted.
 * @property bool|null $group_chat_created Service message: the group has been created.
 * @property bool|null $supergroup_chat_created Service message: the supergroup has been created.
 * @property bool|null $channel_chat_created Service message: the channel has been created.
 * @property int|null $migrate_to_chat_id The group has been migrated to a supergroup with the specified identifier.
 * @property int|null $migrate_from_chat_id The supergroup has been migrated from a group with the specified identifier.
 * @property Message|null $pinned_message Specified message was pinned.
 * @property Invoice|null $invoice Message is an invoice for a payment.
 * @property SuccessfulPayment|null $successful_payment Message is a service message about a successful payment.
 * @property string|null $connected_website The domain name of the website on which the user has logged in.
 * @property PassportData|null $passport_data Telegram Passport data.
 */
class Message extends BaseModel {
    private const CHAT_PROPERY_NAME = 'chat';

    public function __construct(array $data)
    {
        foreach ($data as $key => $value) {       
            $this->properties[$key] = $data[$key] ?? null;
        }

        $chat = $data[self::CHAT_PROPERY_NAME];
        if(!is_null($chat)) 
        {
            $this->properties[self::CHAT_PROPERY_NAME] = new Chat($chat);
        }
        if(array_key_exists('message_id', $this->properties))
        {
            $this->properties['id'] = $this->message_id;
            unset($this->message_id);
        }
    }
}