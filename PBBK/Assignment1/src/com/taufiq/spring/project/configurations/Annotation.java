package com.taufiq.spring.project.configurations;

import org.springframework.context.support.ClassPathXmlApplicationContext;

import com.taufiq.spring.project.persona.AraMitama;
import com.taufiq.spring.project.persona.Persona;

public class Annotation {

	public static void main(String[] args) {
		ClassPathXmlApplicationContext
			context = new ClassPathXmlApplicationContext("PersonaConfigAnnotation.xml"); 
		
		Persona persona1 = context.getBean("araMitama", Persona.class);
		AraMitama aramitama1 = (AraMitama) persona1;
		
		
		System.out.println("Persona: "+aramitama1.getPersonaName());
		System.out.println("=== STATUS ===");
		System.out.println("Element: " + aramitama1.getPersonaElement());
		System.out.println("Strength: " + aramitama1.getStrength());
		System.out.println("Magic: " + aramitama1.getMagic());
		System.out.println("Endurance: " + aramitama1.getEndurance());
		System.out.println("Agility: " + aramitama1.getAgility());
		System.out.println("Luck: " + aramitama1.getLuck());
		
		context.close();
	}
}
