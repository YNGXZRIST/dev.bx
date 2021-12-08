<?php

namespace Army\Weapon;

class BarbarianWeaponForge extends WeaponForge
{
public function createBarbarianBow(): Bow
{
	return  new BarbarianBow();
}
	public function createBarbarianSword(): Sword
	{
		return  new BarbarianSword();
	}
	public function createBarbarianKnife(): Knife
	{
		return  new BarbarianKnife();
	}
}