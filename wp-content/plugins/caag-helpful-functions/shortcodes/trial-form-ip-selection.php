<?php
/*
 * Retrieved the Caag Trial Forms
 * @args none
 * @return void
 */
function caag_trial_forms_ip_selection()
{
    //Africa -> AF
    //Europe -> EU

    //Asia -> AS
    //Oceania ->OC

    //Antarctica -> AN
    //South America -> SA
    //North America -> NA
    $user = geoip_detect2_get_info_from_current_ip();
    $continent = $user->continent->code;
    $country = $user->country->isoCode;
    $action = 'https://caag.caagcrm.com/public/caag/trial-accounts/setup';
    if($continent == 'AF' or $continent == 'EU'){
        $action = 'https://caag-europe.hqrentals.eu/public/caag/trial-accounts/setup';
    }elseif($continent == 'AS' or $continent == 'OC' ){
        $action = 'https://caag-asia.hqrentals.asia/public/caag/trial-accounts/setup';
    }
    $ads = (isset($_SESSION['utm_source'])) ? '<input type="hidden" name="marketing_source" value="'. $_SESSION['utm_source'] .'" />' : '';
    wp_enqueue_script('block-ui-js', get_stylesheet_directory_uri() . '/assets/js/jquery.blockUI.js');
    $captcha =  file_get_contents('https://caag.caagcrm.com/public/caag/trial-accounts/setup/captcha');
    $placeholder_company = pll__('Company Input Placeholder');
    $placeholder_email = pll__('Email Input Placeholder');
    $placeholder_website = pll__('Website Input Placeholder');
    $placeholder_phone = pll__('Phone Input Placeholder');
    $submit_button = pll__('Submit Button Text');
    $terms_text = pll__('Terms Checkbox Text');
    $terms_link_text = pll__('Terms Checkbox Link Text');
    $policy_text = pll__('Policy Checkbox Text');
    $policy_text_link = pll__('Policy Checkbox Link Text');
    $policy_text_after_link = pll__('Policy Checkbox Text After Link');
    $terms_and_conditions = 'UPDATED ON: 28 FEBRUARY 2018

                                Introduction
                                These Terms of Service (“Terms”) together with our privacy policy (“Privacy Policy”), the specific terms of the subscription plan of your choice (“Subscription Plan”) and a service level agreement (“SLA”), if applicable, govern the relationship and form an integral part of the agreement between you or the entity you represent (“you” or “your”) and CAAG B.V. ( “CAAG”), a private limited liability company organized under the laws of Bonaire, in connection with your use of certain software CAAG has developed and is constantly developing and the services CAAG offers in connection therewith (“Agreement”).
                                
                                Acceptance of the Terms
                                You must be of legal age in order to accept the Terms and enter into the Agreement. If you do not agree to the Terms, you are not allowed to use any of our services. You can accept the Terms by checking a checkbox or clicking on a button indicating your acceptance of the Terms. Your acceptance means that you are automatically bound by the terms and provision of the Agreement, including but not limited to these Terms.
                                
                                Description of Service
                                We provide an array of software services for online collaboration and management (“Service” or “Services”). You may use the Services for your personal and business use or for internal business purpose in the organization that you represent. You may connect to the Services using any Internet browser supported by the Services. You are responsible for obtaining access to the Internet and the equipment necessary to use the Services.
                                
                                License
                                CAAG is and will remain the exclusive owner of the software incorporated in the Services including updates thereto that are made available to you from time to time (“Software”) and all rights pertaining to the Software. Upon acceptance of the Terms you are granted a non-exclusive, non-sub-licensable right to use the Software (“License”) in accordance with and for the durations of the Agreement. The License also applies to any updates to the Software that CAAG will make available from time to time. The License is not transferable and does not include the disclosure to you of source codes, techniques and/or processes incorporated in the Software or the right to copy any part of the Software, without CAAG’s explicit prior permission thereto.
                                
                                Modification of Terms of Service
                                We may modify the Terms from time to time and will notify you thereof through a service announcement or by sending email to your primary email address. If we make significant changes to the Terms that affect your rights, you will be provided with at least 30 days advance notice of the changes by email to your primary email address. You may terminate your use of the Services by providing CAAG notice by email within 30 days of being notified of the availability of the modified Terms if the Terms are modified in a manner that substantially affects your rights in connection with your use of the Services. In the event of such termination, you will be entitled to prorated refund of the unused portion of any prepaid fees. Your continued use of the Service after the effective date of any change to the Terms will be deemed to be your agreement to the modified Terms.
                                
                                Organization Accounts and Administrators
                                When you sign up for an account for your organization (“Organization Account”) you may specify one or more administrators for the Organization Account (“Administrator” or “Administrators”). The Administrator will have the right to configure the Services based on your requirements and manage end users in your Organization Account. If your Organization Account is created and configured on your behalf by a third party, we are assuming that such third party is the Administrator. Make sure that you enter into a suitable agreement with such third party specifying such party’s roles and restrictions as an Administrator.
                                You are responsible for i) ensuring confidentiality of your Organization Account password, username and other sensitive information, ii) appointing competent individuals as Administrators, and iii) ensuring that all activities that occur in connection with your Organization Account comply with this Agreement. You understand that CAAG is not responsible for account administration and internal management of the Services for you. You are responsible for taking necessary steps to ensure that your organization does not lose control of the Organization Account. You agree to inform us immediately of any unauthorized use of your Organization Account by email to info@caagsoftware.com.
                                We are not responsible for any activity in your Organization Account, nor for any loss or damage to you or to any third party incurred as a result of any unauthorized access and/or use of your Organization Account, or otherwise.
                                
                                Fees and Payments
                                The Services are available in Subscription Plans of various durations. Payments for Subscription Plans of duration of less than a year can be made by Bank Transfer or by Credit Card. Your Subscription Plan will be automatically renewed at the end of each subscription period unless you inform us that you do not wish to renew the Subscription Plan. At the time of automatic renewal, the subscription fee will be charged to the Credit Card last used by you. We provide you the option of changing the details in the Organization Account. if you would like the payment for the renewal to be made through a different Credit Card. If you do not wish to renew the Subscription Plan, you must inform us at least seven days prior to the renewal date. If you have not informed us that you do not wish to renew the Subscription Plan, you will be presumed to have authorized CAAG to charge the subscription fee for the renewal to the Credit Card last used by you. We do not offer refunds. From time to time, we may change the price of any Service or charge for use of Services that are currently available free of charge. Any increase in charges will not apply until the expiry of your then current billing cycle. You will not be charged for using any Service unless you have opted for a paid Subscription Plan.
                                
                                Restrictions on Use
                                In addition to all other terms and conditions of the Agreement, you shall not: (i) transfer the Services or otherwise make it available to any third party; (ii) provide any service based on the Services without prior written permission of CAAG ; (iii) use the third party links to sites without agreeing to their website terms and conditions; (iv) post links to third party sites or use their logo, company name, etc. without their prior written permission; (v) publish any personal or confidential information belonging to any person or entity without obtaining consent from such person or entity; (vi) use the Services in any manner that could damage, disable, overburden, impair or harm any server, network, computer system, resource of CAAG; (vii) violate any applicable local, state, national or international law; and (viii) create a false identity to mislead any person as to the identity or origin of any communication.
                                
                                Spamming and Illegal Activities
                                You agree to be solely responsible for the contents of your transmissions through the Services. You agree not to use the Services for illegal purposes or for the transmission of material that is unlawful, defamatory, harassing, libelous, invasive of another’s privacy, abusive, threatening, harmful, vulgar, pornographic, obscene, or is otherwise objectionable, offends religious sentiments, promotes racism, contains viruses or malicious code, or that which infringes or may infringe intellectual property or other rights of another. You agree not to use the Services for the transmission of “junk mail”, “spam”, “chain letters”, “phishing” or unsolicited mass distribution of email. We reserve the right to terminate your access to the Services if there are reasonable grounds to believe that you have used the Services for any illegal or unauthorized activity.
                                
                                Data Ownership
                                We respect your right to ownership of content created or stored by you. You own the content created or stored by you. Unless specifically permitted by you, your use of the Services does not grant CAAG the license to use, reproduce, adapt, modify, publish or distribute the content created by you or stored in your user account for CAAG’s commercial, marketing or any similar purpose. But you grant CAAG permission to access, copy, distribute, store, transmit, reformat, publicly display and publicly perform the content of your user account solely as required for the purpose of providing the Services to you.
                                
                                Personal Data and Privacy
                                CAAG will collect personal data, including but not limited to name and email address details (“Personal Data”), in order to provide and optimize the Services under the Agreement. We respect the confidentiality of your Personal Data and the Personal Data you provide in the Organization Account and/or otherwise by using our Services. You are responsible for the collection and use of third parties’ Personal Data you provide to CAAG or of Personal Data which are provided by third parties through you and you warrant that CAAG is authorized to process and use such Personal Data. You warrant that any and all Personal Data provided to CAAG are correct. For more information on our collection and use of personal information, please read our Privacy Policy.
                                
                                Communications from CAAG
                                The Services may include certain communications from CAAG, such as service announcements, administrative messages and newsletters. You understand that these communications shall be considered part of using the Services. As part of our policy to provide you total privacy, we also offer the option of opting out from receiving newsletters from us. However, you will not be able to opt-out from receiving service announcements and administrative messages.
                                
                                Sample files and Applications
                                CAAG may provide sample files and applications for the purpose of demonstrating the possibility of using the Services effectively for specific purposes. The information contained in any such sample files and applications consists of random data. CAAG makes no warranty, either express or implied, as to the accuracy, usefulness, completeness or reliability of the information or the sample files and applications.
                                
                                Intellectual Property Rights 
                                You are aware that CAAG is and will remain the exclusive owner of any and all intellectual property rights to the Services, the Software, including but not limited to copyrights to the Software and rights to trademarks, trade names and know-how, unless explicitly agreed between the parties in writing You agree not to display or use, in any manner, CAAG’s trademarks, logos and/or trade names without CAAG’s explicit prior permission.
                                
                                Disclaimer of Warranties
                                YOU EXPRESSLY UNDERSTAND AND AGREE THAT THE USE OF THE SERVICES IS AT YOUR SOLE RISK. THE SERVICES ARE PROVIDED ON AN AS-IS-AND-AS-AVAILABLE BASIS. CAAG EXPRESSLY DISCLAIMS ALL WARRANTIES OF ANY KIND, WHETHER EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE. CAAG MAKES NO WARRANTY THAT THE SERVICES WILL BE UNINTERRUPTED, TIMELY, SECURE, OR ERROR FREE. USE OF ANY MATERIAL DOWNLOADED OR OBTAINED THROUGH THE USE OF THE SERVICES SHALL BE AT YOUR OWN DISCRETION AND RISK AND YOU WILL BE SOLELY RESPONSIBLE FOR ANY DAMAGE TO YOUR COMPUTER SYSTEM, MOBILE TELEPHONE, WIRELESS DEVICE OR DATA THAT RESULTS FROM THE USE OF THE SERVICES OR THE DOWNLOAD OF ANY SUCH MATERIAL. NO ADVICE OR INFORMATION, WHETHER WRITTEN OR ORAL, OBTAINED BY YOU FROM CAAG, ITS EMPLOYEES OR REPRESENTATIVES SHALL CREATE ANY WARRANTY NOT EXPRESSLY STATED IN THE TERMS.
                                
                                Limitation of Liability
                                YOU AGREE THAT CAAG SHALL, IN NO EVENT, BE LIABLE FOR ANY CONSEQUENTIAL, INCIDENTAL, INDIRECT, SPECIAL, PUNITIVE, OR OTHER LOSS OR DAMAGE WHATSOEVER OR FOR LOSS OF BUSINESS PROFITS, BUSINESS INTERRUPTION, COMPUTER FAILURE, LOSS OF BUSINESS INFORMATION, OR OTHER LOSS ARISING OUT OF OR CAUSED BY YOUR USE OF OR INABILITY TO USE THE SERVICE, EVEN IF CAAG HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGE. IN NO EVENT SHALL CAAG’S ENTIRE LIABILITY TO YOU IN RESPECT OF ANY SERVICE, WHETHER DIRECT OR INDIRECT, EXCEED THE FEES PAID BY YOU TOWARDS SUCH SERVICE.
                                
                                Indemnification
                                You agree to indemnify and hold harmless CAAG, its officers, directors, employees, suppliers, and affiliates, from and against any losses, damages, fines and expenses (including attorney’s fees and costs) arising out of or relating to any claims that you have used the Services in violation of another party’s rights, in violation of any law, in violation of any term under the Agreement, or any other claim related to your use of the Services, except where such use is explicitly authorized by CAAG.
                                
                                Suspension and Termination
                                We may suspend your Organization Account or temporarily disable access to whole or part of any Service in the event of any suspected illegal activity, extended periods of inactivity, or requests by law enforcement or other government agencies. Objections to suspension or disabling of Organization Accounts should be made to legal@caagsoftware.com within thirty days of being notified about the suspension by CAAG.
                                We have the right to terminate the Organization Account, which automatically means the termination of the Agreement if one of the following events occurs: (i) thirty days have passed since the notification of the suspended or disabled Organization Account and CAAG determines in its sole discretion that the ground for the suspension or disablement remains valid; (ii) you are in breach of any provision under the Agreement; (iii) you are misusing the Services and/or your use of the Services is a threat to CAAG’s security and/or the security of third parties; (iv) you become the subject of an involuntary or voluntary bankruptcy or similar proceedings or assign all or substantially all of your assets for the benefit of creditors. We will also terminate your Organization Account on your request. Suspension and termination of the Organization Account will include denial of access to all Services. Termination of the Organization Account includes deletion of information in your Organization Account, including but not limited to email addresses and passwords.
                                You will not be refunded subscription fees for the suspended period and/or for the remaining subscription period in the event of termination.
                                
                                Applicable law and Jurisdiction 
                                This Agreement and any dispute arising in connection herewith shall be governed by and construed in accordance with the laws of Curaçao.  The Parties shall endeavor to solve any disputes arising in connection with the Agreement and the execution thereof out of court. In the event of any dissatisfaction or potential dispute, please send your complaint to legal@caagsoftware.com.  Should the Parties not be able to settle their dispute amicably, the dispute shall be brought before the competent court in Curaçao.
                                
                                Contact
                                If you have any questions or concerns regarding the Terms and/or the Agreement, please contact us at legal@caagsoftware.com.';
    $privacy_policy = 'UPDATED ON: 15 DECEMBER 2017

                        What we do with your information?
                        1. The term “Personal Information” as used herein is defined as any information that identifies or can be used to identify, contact or locate the person to whom such information pertains. The Personal Information that we collect will be subject to this Privacy Policy, as amended from time to time.
                        2. When you register for CAAG we ask for your name, company name, email address, billing address, credit card information. Members who sign up for the free account are not required to enter a credit card however if you want to enable your checkout process you will need to provide your credit card information.
                        3. CAAG uses the information we collect for the following general purposes: products and services provision, billing, identification and authentication, services improvement, contact, and research.
                        4. As part of the buying and selling process on CAAG, you will obtain the email address and/or shipping address of your customers. By entering into our User Agreement, you agree that, with respect to other users’ Personal Information that you obtain through CAAG or through a CAAG-related communication or CAAG-facilitated transaction, CAAG hereby grants to you a license to use such information only for CAAG-related communications that are not unsolicited commercial messages. CAAG does not tolerate spam. Therefore, without limiting the foregoing, you are not licensed to add the name of someone who has been added to your account, to your mail list (email or physical mail) without their express consent.
                        
                        Security
                        The security of your personal information is important to us. No method of transmission over the Internet, or method of electronic storage, is 100% secure, however. Therefore, while we strive to use commercially acceptable means to protect your personal information, we cannot guarantee its absolute security. You can find more information about our Security Framework in our Security document.
                        
                        Credit cards
                        We do not store credit card information on our own servers; we use third party services for online payments and so the responsibility to keep this information safe is deferred to these third parties.
                        
                        Disclosure
                        1. CAAG may use third party service providers to provide certain services to you and we may share Personal Information with such service providers. We require any company with which we may share Personal Information to protect that data in a manner consistent with this policy and to limit the use of such Personal Information to the performance of services for CAAG.
                        2. CAAG may disclose Personal Information under special circumstances, such as to comply with court orders requiring us to do so or when your actions violate our Terms.
                        3. We do not sell or otherwise provide Personal Information to other companies for the marketing of their own products or services.
                        
                        Client Data Storage
                        CAAG owns the data storage, databases and all rights to the CAAG application however we make no claim to the rights of your data. You retain all rights to your data and we will never contact your clients directly, or use your data for our own business advantage or to compete with you or market to your clients.
                        
                        Cookies
                        A cookie is a small amount of data, which may include an anonymous unique identifier. Cookies are sent to your browser from a website and stored on your computer’s hard drive. Every computer that accesses our website is assigned a different cookie by us.
                        Cookies can be used to track your session on our website, to serve customized ads from Google and other third party vendors. When you visit this website, you may view advertisements posted on the site by Google or other third parties. Through first-party and third party cookies, these third parties may collect information about you while you are visiting this website and other websites. They may use this data to show you advertisements on this website and across the Internet based on your prior visits to this website and elsewhere on the Internet. We do not collect this information or control the content of the advertisements that you will see.
                        
                        Google Analytics and Remarketing
                        We use a service provided by Google called Google Analytics (GA). GA permits us to reach people who have previously visited our site, and show them relevant advertisements when they visit other sites across the Internet in the Google Display Network. This is often called ‘remarketing’.
                        
                        Opting Out
                        You may be able to opt out of customized Google Display Network ads by visiting the Ads Preferences Manager (http://www.google.com/ads/preferences/), and the Google Analytics Opt-out Browser Add-on (http://www.google.ca/ads/preferences/plugin/).
                        Your use of this website without opting out means that you understand and agree to data collection to provide you with remarketing ads using GA and cookies from other third party vendors based on your prior visits to this website and elsewhere on the Internet.
                        
                        Changes to this Privacy Policy
We reserve the right to modify this privacy statement at any time. If we make material changes to this policy, we will notify you by email so that you are aware of what information we collect, how we use it, and under what circumstances, if any, we disclose it.';

    $html = '<!-- Trial Form -->
			<div id="caag-please-wait-modal" class="caag-please-wait pg-loading-html pg-loaded caag-hide-element">
				<p class="loading-message">Please Wait</p>
				<div class="sk-spinner sk-spinner-rotating-plane"></div>
			</div>
			<form action="https://caag.caagcrm.com/public/caag/trial-accounts/setup" role="form" method="post" id="new-trial-form-selection">
				'. $ads	 .'
			    <input type="hidden" name="business_sector_id" value="1">  
			    <!--Add row Wrapper-->
			    <div class="row">
                    <div class="col-md-2">
                        <select id="hq-tenant-zone-selector">
                            <option value="https://caag.caagcrm.com/public/caag/trial-accounts/setup">America</option>
                            <option value="https://caag-europe.hqrentals.eu/public/caag/trial-accounts/setup">Europe</option>
                            <option value="https://caag-asia.hqrentals.asia/public/caag/trial-accounts/setup">Asia</option>   
                        </select>
                    </div>
                    <div class="col-md-4">
                        
                        <input id="hq-company-name-field" class="required" type="text" placeholder="'. $placeholder_company .'" value="" name="company" required="" />
                        <input class="required" type="text" placeholder="'. $placeholder_website .'" value="" name="website">
                    </div>
                    <div class="col-md-4">
                        <input class="required" type="email" placeholder="'. $placeholder_email .'" value="" name="email_address" required="">
                        <input class="required" type="text" placeholder="'. $placeholder_phone .'" value="" name="phone_number">
                    </div>
                    <div class="col-md-2">
                    </div>
                </div>
			    <div class="row" align="center">
			        <!--NewCode-->
			        <div class="col-md-2"></div>
			        <div class="col-md-8">
                        <div id="hq-privacy-gdpr-fields" class="hq-privacy-gdpr-fields">
                      <label class="hq-label">    
                            <span><input type="checkbox" id="hq-checked-terms-on-sign-up" name="hq_checked_terms_on_sign_up" /> '. $terms_text .' <a href="/terms-of-service/" target="_blank">'. $terms_link_text .'</a></span></label></br>
                            <label class="hq-label">    
                            <span><input type="checkbox" id="hq-checked-privacy-policy-on-sign-up" name="hq_checked_privacy_policy_on_sign_up" /> '. $policy_text .' <a href="/privacy-policy/" target="_blank">'. $policy_text_link .'</a> '. $policy_text_after_link .'</span></label>
                            <input type="hidden" name="hq_checked_terms_on_sign_up_field_name" value="'. $terms_text . ' ' . $terms_link_text . '" />
                            <input type="hidden" name="hq_checked_privacy_policy_on_sign_up_field_name" value="' . $policy_text.' ' . $policy_text_link . ' ' . $policy_text_after_link .'" />
                            <input type="hidden" name="terms_and_conditions" value="'. $terms_and_conditions .'">
                            <input type="hidden" name="privacy_policy" value="'. $privacy_policy .'">
                        </div>
                    </div>
			        <div class="col-md-2"></div>
			        
                    <style>
                    @media only screen and (max-width: 600px) {
					    .hq-privacy-gdpr-fields {
					        margin-bottom: 20px;
					        margin-left:20px !important;
					    }
					}
                        .hq-privacy-gdpr-fields{
                            display:none;
                            margin-top:10px;
                            text-align: left;
                            margin-left:162px;
                        }
                    </style>
                    <!--NewCOde-->
			        <script type="text/javascript"> var RecaptchaOptions = {"curl_timeout":1}; </script>
			        <script src="https://www.google.com/recaptcha/api.js?render=onload"></script>
			            <div class="caag-captcha" data-callback="capcha_filled" data-expired-callback="capcha_expired">
			                '. $captcha .'
		                </div>
			        </div>
			    </div>
			    <div class="row">
			    	<div class="col-md-12 caag-button-trial-forms" align="center" >
				        <div class="button">
				           <input id="caag-trial-form-button" class="caag-submit-button" type="submit" value="'. $submit_button .'">
				        </div>
				    </div>
			    </div>
			</form>
            <style>
                #hq-tenant-zone-selector{
			        width:100%;
			        min-height: 40px;
			        border: 1px solid #d3d3d3;
                    outline: 0;
                    box-shadow: none;
                    padding-left: 10px;
			    }
			    #hq-tenant-zone-selector option{
			        margin-left: 20px;
			    }
            </style>
			';
    //wp_enqueue_script('caag-captcha-validation', get_stylesheet_directory_uri() . '/assets/js/caagCaptchaValidation.js', array('jquery'), '0.1.5', true);
    $egypt_message =
        '<h5 class="subtitle hq-meesage-spam">
			Please email us at <a href="mailto:info@hqrentalsoftware.com">info@hqrentalsoftware.com</a> for our free trial.
		</h5>
		<style>
			.hq-meesage-spam {
			    padding-bottom: 30px;
			    text-align: center;
			    margin-top:-20px;
			}
		</style>	
		';

    if((($country == "EG") or ($country == "EGY"))){
        echo $egypt_message;
    }else{
        echo $html;
    }

}
add_shortcode('caag_trial_forms_ip_selection','caag_trial_forms_ip_selection');
