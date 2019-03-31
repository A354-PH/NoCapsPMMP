<?php

namespace NoCaps;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;

class Main extends PluginBase implements Listener {
  
  public function onEnable() {
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->getLogger()->info("NoCaps has been enabled! A plugin ported from NukkitX");
  }
  
  public function onChat(PlayerChatEvent $event) {
    $player = $event->getPlayer();
    if(!$player->hasPermission("nocaps.avoidchecking")) {
      $msg = $event->getMessage();
      $msg = strtolower($msg);
      $event->setMessage($msg);
    }
  }
}
