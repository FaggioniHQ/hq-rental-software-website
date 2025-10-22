<?php

class HQWebsiteTrialFormSupport
{
    public function __construct()
    {
        add_shortcode("hq-website-trial-form-support", array($this, 'hqWebsiteTrialForm'));
    }
    public function hqWebsiteTrialForm()
    {
        wp_enqueue_script('jquery-blockui-js');
        wp_enqueue_script('jquery-form-js');
        wp_enqueue_style('hq-trial-form-css');
        ?>
        <script>
            var defaultBusinessSector = "<?php echo $this->getDefaultBusinessSector(); ?>";
        </script>
        <div class="elementor-element elementor-element-30425b9 mainform elementor-button-align-end elementor-widget elementor-widget-form">
            <div class="elementor-widget-container">
                <form id="hq-trial-form-support" class="elementor-form" method="post" action="https://caag.caagcrm.com/public/caag/trial-accounts/setup/region-selector?forced_region=america-3">
                    <div class="elementor-form-fields-wrapper elementor-labels-">
                        <div class="elementor-field-type-email elementor-field-group elementor-column elementor-field-group-email elementor-col-100 elementor-field-required">
                            <label for="email" class="elementor-field-label elementor-screen-only"><?echo $this->getContent("Email *", "Su Correo Electrónico *", "Seu Email *");?></label>
                            <input id="email" size="1" type="email" name="email_address" class="hq-inputs" placeholder="<?php echo $this->getContent("Email *", "Su Correo Electrónico *", "Seu Email *"); ?>" required="" aria-required="true" value="">
                        </div>
                        <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-company elementor-col-100 elementor-field-required">
                            <label for="company" class="elementor-field-label elementor-screen-only"><?php echo $this->getContent("Company *", "Su Compañía *", "Empresa *"); ?></label>
                            <input id="company" size="1" type="text" required="" name="company" class="hq-inputs" placeholder="<?php echo $this->getContent("Company *", "Su Compañía *", "Empresa *"); ?>" aria-required="true" value="">
                        </div>
                        <div class="elementor-field-type-tel elementor-field-group elementor-column elementor-field-group-field_2 elementor-col-100 elementor-field-required">
                            <label for="phone" class="elementor-field-label elementor-screen-only"><?php echo $this->getContent("Phone", "Su Número Telefónico", "Telefone"); ?></label>
                            <input id="phone" size="1" type="tel" name="phone_number" class="hq-inputs" placeholder="<?php echo $this->getContent("Phone", "Su Número Telefónico", "Telefone"); ?>" aria-required="true" title="Only numbers and phone characters (#, -, *, etc) are accepted." value="">
                        </div>
                        <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-company elementor-col-100 elementor-field-required">
                            <label for="website" class="elementor-field-label elementor-screen-only"><?php echo $this->getContent("Website", "Su Sitio Web", "Website"); ?></label>
                            <input id="website" size="1" type="text" class="hq-inputs" name="website" placeholder="<?php echo $this->getContent("Website", "Su Sitio Web", "Website"); ?>" aria-required="true" value="">
                        </div>
                        <div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_5 elementor-col-100 elementor-field-required">
                            <label for="form-field-field_5" class="elementor-field-label elementor-screen-only">Business Sector</label>
                            <div class="elementor-field elementor-select-wrapper ">
                                <select id="business_sector_id" name="business_sector_id" placeholder="Your Business Sector" class="elementor-field-textual elementor-size-xs" required="required" aria-required="true">
                                    <option value="1"><?php echo $this->getContent("Car Rental", "Alquiler de Vehículos", "Aluguel de Carros"); ?></option>
                                    <option value="9"><?php echo $this->getContent("Motorbike Rental", "Alquiler de Motos", "Aluguel de Motos"); ?></option>
                                    <option value="11"><?php echo $this->getContent("Boats Rental", "Alquiler de Botes", "Aluguel de Embarcações"); ?></option>
                                    <option value="12"><?php echo $this->getContent("Equipment Rental", "Alquiler de Equipos", "Aluguel de Equipamentos"); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_5 elementor-col-100 elementor-field-required">
                            <label for="form-field-field_5" class="elementor-field-label elementor-screen-only">Server Region</label>
                            <div class="elementor-field elementor-select-wrapper ">
                                <select id="hq_server_region" placeholder="Your Business Sector" class="elementor-field-textual elementor-size-xs" required="required" aria-required="true">
                                    <option value="https://caag.caagcrm.com/public/caag/trial-accounts/setup/region-selector?forced_region=america-3">America 3</option>
                                    <option value="https://caag.caagcrm.com/public/caag/trial-accounts/setup/region-selector?forced_region=europe">Europe</option>
                                    <option value="https://caag.caagcrm.com/public/caag/trial-accounts/setup/region-selector?forced_region=asia ">Asia</option>
                                </select>
                            </div>
                        </div>
                        <div class="elementor-field-type-acceptance elementor-field-group elementor-column elementor-field-group-field_1 elementor-col-100 elementor-field-required hq-checkboxes-wrapper">
                            <label for="term" class="elementor-field-label elementor-screen-only">Terms of Service</label>
                            <div class="elementor-field-subgroup">
                                <span class="elementor-field-option">
                                    <input id="term" type="checkbox" class="elementor-field elementor-size-xs elementor-acceptance-field" required="" aria-required="true" value="">
                                    <label for="term">
                                        <span class="terms-text-form"><?php echo $this->getContent("I accept the ", "Acepto los ", "Aceito os ");?><a href="/terms-of-service" target="_blank"><?php echo $this->getContent("Terms of Service", "Términos del Servicio", "Termos e Condições"); ?></a>.</span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="elementor-field-type-acceptance elementor-field-group elementor-column elementor-field-group-field_1 elementor-col-100 elementor-field-required hq-checkboxes-wrapper">
                            <label for="policy" class="elementor-field-label elementor-screen-only">Privacy Policy</label>
                            <div class="elementor-field-subgroup">
                                <span class="elementor-field-option">
                                    <input id="policy" type="checkbox" class="elementor-field elementor-size-xs elementor-acceptance-field" required="" aria-required="true" value="">
                                    <label for="policy">
                                        <span class="terms-text-form"><?php echo $this->getContent("I accept the ", "Acepto la ", "Aceito a ");?><a href="/privacy-policy" target="_blank"><?php echo $this->getContent("Privacy Policy", "Póliza de Privacidad", "Política de Privacidade"); ?></a><?php echo $this->getContent(" including the Cookies Policy.", " incluyendo la Póliza de Condiciones", "incluindo a Política de Cookies."); ?></span>
                                    </label>
                                </span>
                            </div>
			</div>
<!--
                        <div class="hq-captcha-wrapper">
                            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                            <div id="g-recaptcha" class="g-recaptcha" data-sitekey="6LdadKUUAAAAAGuiNS_4EibZFVL8CbvvGi8Gv8rj" data-theme="light" data-type="image" data-size="normal" data-badge="bottomright" data-tabindex="0">
                            </div>
                        </div>-->
                        <div class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-100">
                            <button type="submit" class="elementor-button elementor-size-md">
                                <span>
                                    <span class="elementor-button-text"><?php echo $this->getContent("Submit", "Enviar", "Enviar"); ?></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="/wp-content/plugins/wp-forms/shortcodes/assets/js/jquery.form.min.js"></script>
        <script src="/wp-content/plugins/wp-forms/shortcodes/assets/js/hq-website-trial-form-support.js?ver=0.0.2"></script>
        <?php
    }
    public function getDefaultBusinessSector(){
        if(is_page('motorbikes-boats')){
            return '9';
        }
        if(is_page('equipment-rental')){
            return '12';
        }
        return '1';
    }
    public function getContent($english, $spanish, $portuguese){
		switch (get_locale()){
						case "en_US":
							return $english;
							break;
							
						case "es_ES":
							return $spanish;
							break;
							
						case "pt_BR":
							return $portuguese;
							break;
					}
    }
}
