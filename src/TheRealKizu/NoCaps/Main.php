<?php

namespace TheRealKizu\NoCaps;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;

class Main extends PluginBase implements Listener {

    public $germanLetters = [];
  
    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
  
    public function onChat(PlayerChatEvent $event) {
        $player = $event->getPlayer();
            if(!$player->hasPermission("nocaps.avoidchecking")) {
                $msg = $event->getMessage();
                $event->setMessage(strtolower($msg));
            }
        }
    }
