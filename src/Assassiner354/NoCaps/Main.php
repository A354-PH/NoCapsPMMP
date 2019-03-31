<?php

namespace Assassiner354\NoCaps;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;

class Main extends PluginBase implements Listener {
  
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
