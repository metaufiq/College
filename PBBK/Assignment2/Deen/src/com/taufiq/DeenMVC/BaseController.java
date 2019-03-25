package com.taufiq.DeenMVC;

import org.springframework.ui.ModelMap;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.servlet.ModelAndView;

@org.springframework.stereotype.Controller
public class BaseController {
	
	@RequestMapping(value = "/home", method = RequestMethod.GET)
    public ModelAndView showForm() {
        return new ModelAndView("homepage", "models", new Models());
    }
	
	@RequestMapping(value = "/output_name", method=RequestMethod.POST)
	public String submitInput(
			@ModelAttribute("models") 
			Models models,
			BindingResult result,
			ModelMap model) {
		
		if(result.hasErrors())
			return "error";
		
		model.addAttribute("name", models.getName());
		
		return "fileName";
		
	}
	
	
	
}
