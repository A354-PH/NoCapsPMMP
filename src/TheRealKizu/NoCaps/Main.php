<?php

namespace TheRealKizu\NoCaps;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener {
  
    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
  
    public function onChat(PlayerChatEvent $event) {
        $player = $event->getPlayer();
            if (!$player->hasPermission("nocaps.avoidchecking")) {
                $germanLetters = [
                    "Ä",
                    "Ö",
                    "Ü",
                    "ẞ"
                ];
                $msg = $event->getMessage();
                $event->setMessage(strtolower($msg));
                if (strpos((string)$germanLetters, $msg)) {
                    $player->sendMessage(TextFormat::RED . "German Letter's are disabled for now!");
                    $event->setCancelled();
                }
            }
        }
    }
