<?php

namespace Gest\Telegest\builders;

use Gest\Telegest\interfaces\BuilderInterface;
use Gest\Telegest\types\InlineQueryResultType;

final class InlineQueryAnswerBuilder implements BuilderInterface
{
    private array $results = [];
    private string $inlineQueryId;

    public function __construct(string $inlineQueryId)
    {
        $this->inlineQueryId = $inlineQueryId;
    }

    public function addArticleResult(string $id, string $title, string $messageText, array $additionalParams = [])
    {
        $result = [
            'type' => InlineQueryResultType::ARTICLE->value,
            'id' => $id,
            'title' => $title,
            'input_message_content' => [
                'message_text' => $messageText,
            ]
        ];
        $this->results[] = array_merge($result, $additionalParams);
        return $this;
    }

    public function addPhotoResult(string $id, string $photoUrl, string $thumbUrl, array $additionalParams = [])
    {
        $result = [
            'type' => InlineQueryResultType::PHOTO->value,
            'id' => $id,
            'photo_url' => $photoUrl,
            'thumb_url' => $thumbUrl,
        ];

        $this->results[] = array_merge($result, $additionalParams);
        return $this;
    }

    public function addGifResult(string $id, string $gifUrl, string $thumbUrl, array $additionalParams = [])
    {
        $result = [
            'type' => InlineQueryResultType::GIF->value,
            'id' => $id,
            'gif_url' => $gifUrl,
            'thumb_url' => $thumbUrl,
        ];

        $this->results[] = array_merge($result, $additionalParams);
        return $this;
    }

    public function addMpeg4GifResult(string $id, string $mpeg4Url, string $thumbUrl, array $additionalParams = [])
    {
        $result = [
            'type' => InlineQueryResultType::MPEG4_GIF->value,
            'id' => $id,
            'mpeg4_url' => $mpeg4Url,
            'thumb_url' => $thumbUrl,
        ];

        $this->results[] = array_merge($result, $additionalParams);
        return $this;
    }

    public function addVideoResult(string $id, string $videoUrl, string $mimeType, string $thumbUrl, string $title, array $additionalParams = [])
    {
        $result = [
            'type' => InlineQueryResultType::VIDEO->value,
            'id' => $id,
            'video_url' => $videoUrl,
            'mime_type' => $mimeType,
            'thumb_url' => $thumbUrl,
            'title' => $title,
        ];

        $this->results[] = array_merge($result, $additionalParams);
        return $this;
    }

    public function addAudioResult(string $id, string $audioUrl, string $title, array $additionalParams = [])
    {
        $result = [
            'type' => InlineQueryResultType::AUDIO->value,
            'id' => $id,
            'audio_url' => $audioUrl,
            'title' => $title,
        ];

        $this->results[] = array_merge($result, $additionalParams);
        return $this;
    }

    public function addVoiceResult(string $id, string $voiceUrl, string $title, array $additionalParams = [])
    {
        $result = [
            'type' => InlineQueryResultType::VOICE->value,
            'id' => $id,
            'voice_url' => $voiceUrl,
            'title' => $title,
        ];

        $this->results[] = array_merge($result, $additionalParams);
        return $this;
    }

    public function addDocumentResult(string $id, string $title, string $documentUrl, string $mimeType, array $additionalParams = [])
    {
        $result = [
            'type' => InlineQueryResultType::DOCUMENT->value,
            'id' => $id,
            'title' => $title,
            'document_url' => $documentUrl,
            'mime_type' => $mimeType,
        ];

        $this->results[] = array_merge($result, $additionalParams);
        return $this;
    }

    public function addLocationResult(string $id, float $latitude, float $longitude, string $title, array $additionalParams = [])
    {
        $result = [
            'type' => InlineQueryResultType::LOCATION->value,
            'id' => $id,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'title' => $title,
        ];

        $this->results[] = array_merge($result, $additionalParams);
        return $this;
    }

    public function addVenueResult(string $id, float $latitude, float $longitude, string $title, string $address, array $additionalParams = [])
    {
        $result = [
            'type' => InlineQueryResultType::VENUE->value,
            'id' => $id,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'title' => $title,
            'address' => $address,
        ];

        $this->results[] = array_merge($result, $additionalParams);
        return $this;
    }

    public function addContactResult(string $id, string $phoneNumber, string $firstName, array $additionalParams = [])
    {
        $result = [
            'type' => InlineQueryResultType::CONTACT->value,
            'id' => $id,
            'phone_number' => $phoneNumber,
            'first_name' => $firstName,
        ];

        $this->results[] = array_merge($result, $additionalParams);
        return $this;
    }

    public function addGameResult(string $id, string $gameShortName, array $additionalParams = [])
    {
        $result = [
            'type' => InlineQueryResultType::GAME->value,
            'id' => $id,
            'game_short_name' => $gameShortName,
        ];

        $this->results[] = array_merge($result, $additionalParams);
        return $this;
    }

    public function addStickerResult(string $id, string $stickerFileId, array $additionalParams = [])
    {
        $result = [
            'type' => InlineQueryResultType::STICKER->value,
            'id' => $id,
            'sticker_file_id' => $stickerFileId,
        ];

        $this->results[] = array_merge($result, $additionalParams);
        return $this;
    }

    /** 
     * Return built answers for sending
     * @return array answers  
     */
    public function build()
    {
        return [
            'inline_query_id' => $this->inlineQueryId,
            'results' => json_encode($this->results),
        ];
    }
}
