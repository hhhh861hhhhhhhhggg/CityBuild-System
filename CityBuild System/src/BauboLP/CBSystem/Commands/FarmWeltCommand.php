<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 16.07.2019
 * Time: 21:08
 */

/**
 * @author BauboLP

 * Copyright (c) 2019 BauboLP  < https://github.com/Baubo-LP >
 * Discord: BauboLP#4545
 *
 * This software is distributed under "GNU General Public License v3.0".
 * This license allows you to use it and/or modify it but you are not at
 * all allowed to sell this plugin at any cost. If found doing so the
 * necessary action required would be taken.
 *
 * GunGame is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License v3.0 for more details.
 *
 * You should have received a copy of the GNU General Public License v3.0
 * along with this program. If not, see
 * <https://opensource.org/licenses/GPL-3.0>.
 */

namespace BauboLP\CBSystem\Commands;


use BauboLP\CBSystem\CBSystem;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class FarmWeltCommand extends Command
{

    public function __construct(string $name, string $description = "", string $usageMessage = null, $aliases = [])
    {
        parent::__construct($name, $description, $usageMessage, $aliases);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if(!$sender instanceof Player) {
            return;
        }

        if(!CBSystem::getPlugin()->getServer()->isLevelGenerated("Farmwelt")) {
            $sender->sendMessage(CBSystem::Prefix.CBSystem::getPlugin()->getTextContainer("farmwelt-not-found"));
            return;
        }

        $sender->teleport(CBSystem::getPlugin()->getServer()->getLevelByName("Farmwelt")->getSafeSpawn()->asPosition());
        $sender->sendMessage(CBSystem::Prefix.CBSystem::getPlugin()->getTextContainer("farmwelt-teleport"));
    }

}