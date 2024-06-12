<?php

namespace Gest\Telegest\models;

use Gest\Telegest\Config;

class Chat extends BaseModel {
    private string $type;
    private ?string $title = null;
    private ?bool $is_forum = null;
    private ?ChatPhoto $photo = null;
    private ?string $bio = null;
    private ?bool $has_private_forwards = null;
    private ?string $description = null;
    private ?string $invite_link = null;
    private ?array $pinned_message = null; // This would be a Message object in a complete implementation
    private ?ChatPermissions $permissions = null;
    private ?int $slow_mode_delay = null;
    private ?int $message_auto_delete_time = null;
    private ?bool $has_protected_content = null;
    private ?string $sticker_set_name = null;
    private ?bool $can_set_sticker_set = null;
    private ?int $linked_chat_id = null;
    private ?Location $location = null;
    private ?User $user = null;

    public function __construct(array $data) {
        $this->type = $data['type'];
        $this->title = $data['title'] ?? null;
        $this->is_forum = $data['is_forum'] ?? null;
        $this->photo = isset($data['photo']) ? new ChatPhoto($data['photo']) : null;
        $this->bio = $data['bio'] ?? null;
        $this->has_private_forwards = $data['has_private_forwards'] ?? null;
        $this->description = $data['description'] ?? null;
        $this->invite_link = $data['invite_link'] ?? null;
        $this->pinned_message = $data['pinned_message'] ?? null; // Needs proper implementation
        $this->permissions = isset($data['permissions']) ? new ChatPermissions($data['permissions']) : null;
        $this->slow_mode_delay = $data['slow_mode_delay'] ?? null;
        $this->message_auto_delete_time = $data['message_auto_delete_time'] ?? null;
        $this->has_protected_content = $data['has_protected_content'] ?? null;
        $this->sticker_set_name = $data['sticker_set_name'] ?? null;
        $this->can_set_sticker_set = $data['can_set_sticker_set'] ?? null;
        $this->linked_chat_id = $data['linked_chat_id'] ?? null;
        $this->location = isset($data['location']) ? new Location($data['location']) : null;
        $this->user = new User($data);
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        throw new \Exception("Property {$name} does not exist");
    }
}