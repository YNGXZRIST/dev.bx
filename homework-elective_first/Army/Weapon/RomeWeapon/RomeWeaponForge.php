<?php

namespace Army\Weapon;

class RomeWeaponForge extends WeaponForge
{
	public function createRomeBow(): Bow
	{
		return  new BarbarianBow();
	}
	public function createRomeSword(): Sword
	{
		return  new BarbarianSword();
	}
	public function createRomeKnife(): Knife
	{
		return  new BarbarianKnife();
	}
}