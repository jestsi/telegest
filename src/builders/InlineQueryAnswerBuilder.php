<?php

namespace Gest\Telegest\builders;

use Gest\Telegest\Container;
use Gest\Telegest\interfaces\BuilderInterface;
use Gest\Telegest\interfaces\InlineQueryResultServiceInterface;
use Gest\Telegest\types\InlineQueryResultType;

final class InlineQueryAnswerBuilder implements BuilderInterface
{
    private $results = [];
    private $resultService;
    private $inlineQueryId;

    public function __construct(string $inlineQueryId)
    {
        $this->inlineQueryId = $inlineQueryId;
        $this->resultService = Container::getContainer()->get(InlineQueryResultServiceInterface::class);
    }

    private function addResult(string $type, string $id, array $params = [])
    {
        $result = $this->resultService->createResult($type, $id, $params);
        $this->results[] = $result;
        return $this;
    }

    public function addArticleResult(string $id, string $title, string $messageText, array $additionalParams = [])
    {
        $params = array_merge(['title' => $title, 'input_message_content' => ['message_text' => $messageText]], $additionalParams);
        return $this->addResult(InlineQueryResultType::ARTICLE->value, $id, $params);
    }

    public function addPhotoResult(string $id, string $photoUrl, string $thumbUrl, array $additionalParams = [])
    {
        $params = array_merge(['photo_url' => $photoUrl, 'thumb_url' => $thumbUrl], $additionalParams);
        return $this->addResult(InlineQueryResultType::PHOTO->value, $id, $params);
    }

    public function addGifResult(string $id, string $gifUrl, string $thumbUrl, array $additionalParams = [])
    {
        $params = array_merge(['gif_url' => $gifUrl, 'thumb_url' => $thumbUrl], $additionalParams);
        return $this->addResult(InlineQueryResultType::GIF->value, $id, $params);
    }

    public function addMpeg4GifResult(string $id, string $mpeg4Url, string $thumbUrl, array $additionalParams = [])
    {
        $params = array_merge(['mpeg4_url' => $mpeg4Url, 'thumb_url' => $thumbUrl], $additionalParams);
        return $this->addResult(InlineQueryResultType::MPEG4_GIF->value, $id, $params);
    }

    public function addVideoResult(string $id, string $videoUrl, string $mimeType, string $thumbUrl, string $title, array $additionalParams = [])
    {
        $params = array_merge(['video_url' => $videoUrl, 'mime_type' => $mimeType, 'thumb_url' => $thumbUrl, 'title' => $title], $additionalParams);
        return $this->addResult(InlineQueryResultType::VIDEO->value, $id, $params);
    }

    public function addAudioResult(string $id, string $audioUrl, string $title, array $additionalParams = [])
    {
        $params = array_merge(['audio_url' => $audioUrl, 'title' => $title], $additionalParams);
        return $this->addResult(InlineQueryResultType::AUDIO->value, $id, $params);
    }

    public function addVoiceResult(string $id, string $voiceUrl, string $title, array $additionalParams = [])
    {
        $params = array_merge(['voice_url' => $voiceUrl, 'title' => $title], $additionalParams);
        return $this->addResult(InlineQueryResultType::VOICE->value, $id, $params);
    }

    public function addDocumentResult(string $id, string $title, string $documentUrl, string $mimeType, array $additionalParams = [])
    {
        $params = array_merge(['title' => $title, 'document_url' => $documentUrl, 'mime_type' => $mimeType], $additionalParams);
        return $this->addResult(InlineQueryResultType::DOCUMENT->value, $id, $params);
    }

    public function addLocationResult(string $id, float $latitude, float $longitude, string $title, array $additionalParams = [])
    {
        $params = array_merge(['latitude' => $latitude, 'longitude' => $longitude, 'title' => $title], $additionalParams);
        return $this->addResult(InlineQueryResultType::LOCATION->value, $id, $params);
    }

    public function addVenueResult(string $id, float $latitude, float $longitude, string $title, string $address, array $additionalParams = [])
    {
        $params = array_merge(['latitude' => $latitude, 'longitude' => $longitude, 'title' => $title, 'address' => $address], $additionalParams);
        return $this->addResult(InlineQueryResultType::VENUE->value, $id, $params);
    }

    public function addContactResult(string $id, string $phoneNumber, string $firstName, array $additionalParams = [])
    {
        $params = array_merge(['phone_number' => $phoneNumber, 'first_name' => $firstName], $additionalParams);
        return $this->addResult(InlineQueryResultType::CONTACT->value, $id, $params);
    }

    public function addGameResult(string $id, string $gameShortName, array $additionalParams = [])
    {
        $params = array_merge(['game_short_name' => $gameShortName], $additionalParams);
        return $this->addResult(InlineQueryResultType::GAME->value, $id, $params);
    }

    public function addStickerResult(string $id, string $stickerFileId, array $additionalParams = [])
    {
        $params = array_merge(['sticker_file_id' => $stickerFileId], $additionalParams);
        return $this->addResult(InlineQueryResultType::STICKER->value, $id, $params);
    }
    
    /** 
     * Return built answers for sending
     * @return array answers  
     */
    public function build()
    {
        // FIXME: 
        // TODO: СДЕЛАТЬ ОБЪЕКТ А НЕ ПРОСТО КАКОЙ ТО МАССИВ
        return [
            'inline_query_id' => $this->inlineQueryId,
            'results' => json_encode($this->results),
        ];
    }
}
