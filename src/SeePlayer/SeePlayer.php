<?php

namespace SeePlayer;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\entity\effect\EffectInstance;
use pocketmine\entity\effect\VanillaEffects;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;


class SeePlayer extends PluginBase implements Listener{
	protected function onEnable() : void{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
		$command = $command->getName();
		$tag = "§d<§f시스템§d> §f";
		if($command == "야간투시"){
			if(!$sender instanceof Player){
				return false;
			}
			$sender->getEffects()->add(new EffectInstance(VanillaEffects::NIGHT_VISION(), 20 * 3600, 1, false));
			$sender->sendMessage($tag . "야간투시 §d60§f분을 부여 받았습니다.");
			return true;
		}
		return true;
	}
}