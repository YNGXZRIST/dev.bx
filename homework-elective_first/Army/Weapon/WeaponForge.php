<?php

namespace Army\Weapon;

class WeaponForge
{
	abstract public function createKnife(): Knife;
	abstract public function createBow(): Bow;
	abstract public function createSword(): Sword;
}