package com.taufiq.spring.project.configurations.java;

import org.springframework.beans.factory.annotation.Value;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.context.annotation.PropertySource;
import com.taufiq.spring.project.persona.*;

@Configuration
@PropertySource("classpath:status.properties")
public class Config {
	
	@Bean
	public Persona AraMitama(@Value("${persona1.St}")int strength,
			 @Value("${persona1.Ma}")int magic,
			 @Value("${persona1.En}") int endurance,
			 @Value("${persona1.Ag}") int agility,
			 @Value("${persona1.Lu}") int luck ) {
		
		AraMitama araMitama1 = new AraMitama(strength, magic, endurance, agility, luck);
		return araMitama1;
	}
}
