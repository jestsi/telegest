<?php

namespace Gest\Telegest\core;

use Gest\Telegest\interfaces\ObserverInterface;
use Gest\Telegest\interfaces\SubjectInterface;
use Gest\Telegest\types\UpdateType;

class UpdateSubject implements SubjectInterface
{
    protected const EVERY_NOTIFY_EVENT_GROUP_NAME = "*";

    protected $_observers = [];
    protected $_data;

    public function __construct()
    {
        $this->_observers = [];
        $this->initGroupForEveryEvents();
    }

    protected function initEventGroup(string $event = self::EVERY_NOTIFY_EVENT_GROUP_NAME): void
    {
        if (!isset($this->_observers[$event])) {
            $this->_observers[$event] = [];
        }
    }

    protected function getEventObservers(string $event = self::EVERY_NOTIFY_EVENT_GROUP_NAME): array
    {
        $this->initGroupForEveryEvents();
        $this->initEventGroup($event);
        $group = $this->_observers[$event];
        $all = $this->_observers[self::EVERY_NOTIFY_EVENT_GROUP_NAME];

        return array_merge($group, $all);
    }

    protected function initGroupForEveryEvents() : void
    {
        if (!isset($this->_observers[self::EVERY_NOTIFY_EVENT_GROUP_NAME]))
            $this->_observers[self::EVERY_NOTIFY_EVENT_GROUP_NAME] = [];
    }

    public function attach(ObserverInterface $observer, string $event = self::EVERY_NOTIFY_EVENT_GROUP_NAME): void
    {
        $this->initEventGroup($event);

        $this->_observers[$event][] = $observer;
    }

    public function detach(ObserverInterface $observer, string $event = self::EVERY_NOTIFY_EVENT_GROUP_NAME): void
    {
        foreach ($this->getEventObservers($event) as $key => $s) {
            if ($s === $observer) {
                unset($this->_observers[$event][$key]);
            }
        }
    }

    public function attachCallable(UpdateType $updateType, callable $callable)
    {
        $callableRef = &$callable;
        $observer = new class($callableRef) implements ObserverInterface {
            private $callable;

            public function __construct(callable &$callable)
            {
                $this->callable = $callable;    
            }

            public function update(SubjectInterface $subject, $data) {
                $callableRef = &$this->callable;
                $callableRef($data);
            }
        };
        $this->attach($observer, $updateType->value);
    }

    public function detachCallable(callable $callable)
    {
        foreach ($this->_observers as $eventName => $eventObservers) {
            foreach ($eventObservers as $key => $observer) {
                if ($observer instanceof \Closure || $observer instanceof $callable) {
                    unset($this->_observers[$eventName][$key]);
                }
            }
        }
    }

    public function notify(string $event = self::EVERY_NOTIFY_EVENT_GROUP_NAME, $data = null): void
    {
        foreach ($this->getEventObservers($event) as $observer) {
            $observer->update($this, $data);
        }
    }
}