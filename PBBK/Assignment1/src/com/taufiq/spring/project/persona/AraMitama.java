package com.taufiq.spring.project.persona;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.stereotype.Component;



@Component
public class AraMitama implements Persona {
	private String element = "fire";
	private int strength;
	private int magic;
	private int endurance;
	private int agility;
	private int luck;
	
	
	public AraMitama() {
		super();
	}
	
	@Autowired
	public AraMitama(@Value("${persona1.St}")int strength,
					 @Value("${persona1.Ma}")int magic,
					 @Value("${persona1.En}") int endurance,
					 @Value("${persona1.Ag}") int agility,
					 @Value("${persona1.Lu}") int luck ) 
	{		
		super();
		this.strength = strength;
		this.magic = magic;
		this.endurance = endurance;
		this.agility = agility;
		this.luck = luck;
	}
	
	
	
	@Override
	public String getPersonaName() {
		return "AraMitama";
	}

	@Override
	public String getPersonaElement() {
		return element;
	}

	public int getStrength() {
		return strength;
	}

	public void setStrength(int strength) {
		this.strength = strength;
	}

	public int getMagic() {
		return magic;
	}

	public void setMagic(int magic) {
		this.magic = magic;
	}

	public int getEndurance() {
		return endurance;
	}

	public void setEndurance(int endurance) {
		this.endurance = endurance;
	}

	public int getAgility() {
		return agility;
	}

	public void setAgility(int agility) {
		this.agility = agility;
	}

	public int getLuck() {
		return luck;
	}

	public void setLuck(int luck) {
		this.luck = luck;
	}
	
}
