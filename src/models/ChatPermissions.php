<?php

namespace Gest\Telegest\models;

class ChatPermissions {
    private ?bool $can_send_messages = null;
    private ?bool $can_send_media_messages = null;
    private ?bool $can_send_polls = null;
    private ?bool $can_send_other_messages = null;
    private ?bool $can_add_web_page_previews = null;
    private ?bool $can_change_info = null;
    private ?bool $can_invite_users = null;
    private ?bool $can_pin_messages = null;

    public function __construct(array $data) {
        $this->can_send_messages = $data['can_send_messages'] ?? null;
        $this->can_send_media_messages = $data['can_send_media_messages'] ?? null;
        $this->can_send_polls = $data['can_send_polls'] ?? null;
        $this->can_send_other_messages = $data['can_send_other_messages'] ?? null;
        $this->can_add_web_page_previews = $data['can_add_web_page_previews'] ?? null;
        $this->can_change_info = $data['can_change_info'] ?? null;
        $this->can_invite_users = $data['can_invite_users'] ?? null;
        $this->can_pin_messages = $data['can_pin_messages'] ?? null;
    }

    // Magic getter
    public function __get($name) {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        throw new \Exception("Property {$name} does not exist");
    }
}