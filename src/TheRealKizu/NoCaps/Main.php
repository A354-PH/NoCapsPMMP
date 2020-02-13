<?php

/**
 *  Copyright (C) 2019-2020 TheRealKizu
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program. If not, see <https://www.gnu.org/licenses/>.
 */

namespace TheRealKizu\NoCaps;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener {

    private static $instance;

    public function onLoad() {
        self::$instance = $this;
    }

    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        //$this->getLogger()->info("NoCapsPMMP is now enabled! Made by (@TheRealKizu)");
    }

    /**
     * @param PlayerChatEvent $event
     */
    public function onChat(PlayerChatEvent $event) {
        $player = $event->getPlayer();
        if (!$player->hasPermission("nocaps.avoidchecking")) {
            $msg = $event->getMessage();
            $event->setMessage(mb_strtolower($msg, "UTF-8"));
        }
    }

    /**
     * @return static
     */
    public static function getInstance(): self {
        return self::$instance;
    }

}
