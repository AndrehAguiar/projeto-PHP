// JavaScript Document
		$('#nv_perfil').validate();
		var  sprytextfield2 = new Spry.Widget.ValidationTextField("movel", "phone_number", {format:"phone_custom", pattern:"XX XXXXX-XXXX", hint:"__ _____-____", useCharacterMasking:true
		});
		
		$.validator.addMethod('celular', function (value, element) {
			return this.optional(element) || /^\d{2} \d{5}-\d{4}$/.test(value);
		}, "Por favor, informe um telefone válido!");
		
		$.validator.addClassRules('celular', {
			customphone: true
		});