<?php


class HQWebsitePricingCalculatorShortcodeCurrent{

    public function __construct()
    {
        add_shortcode("hq_website_rate_calculator_current", array($this, 'hqWebsitePricingCalculator'));
    }
    public function hqWebsitePricingCalculator()
    {
        $title = $this->setLabels('TYPE THE # OF VEHICLES', "Escriba el # de vehículos","Escreva o # de veículos");
        $content = $this->setLabels("I have a fleet of", "Tengo una flota de", "Eu tenho uma frota de");
        $vehicles = $this->setLabels("vehicles", "vehículos", "veículos");
        $licenseCost = $this->setLabels("License Cost", "Costo de la Licencia", "Custo da Licença");
        $month = $this->setLabels("month", "mes", "mês");
        $year = $this->setLabels("year", "año", "anual");
        $or = $this->setLabels("or", "ó","ou");
        $bigCarsMessageFirst = $this->setLabels("Please contact our ", "Contacte nuestro equipo de ","Entre em contato com nossa equipe de ");
        $bigCarsMessageMiddle = $this->setLabels("Sales ", "ventas","vendas");
        $bigCarsMessageLast = $this->setLabels("team", "","");
        wp_enqueue_script('hq-calculator-shortcode-js-current');
        ?>
        <script>
            var title = "<?php echo $title; ?>";
            var content = "<?php echo $content; ?>";
            var vehicles = "<?php echo $vehicles; ?>";
            var licenseCost = "<?php echo $licenseCost; ?>";
            var month = "<?php echo $month; ?>";
            var year = "<?php echo $year; ?>";
            var or = "<?php echo $or; ?>";
            var locale = "<?php echo get_locale(); ?>";
            var bigCarsMessageFirst = "<?php echo $bigCarsMessageFirst; ?>";
            var bigCarsMessageMiddle = "<?php echo $bigCarsMessageMiddle; ?>";
            var bigCarsMessageLast = "<?php echo $bigCarsMessageLast; ?>";
        </script>
        <div id="hq-calculator-app-current"></div>
        <style>
            .hq-pricing-contact-sales-line a{
                color: #7a7e97 !important;
            }
            .hq-pricing-contact-sales-line-primary{
                color: #ffc613 !important;
            }
            .hq-calculator-wrapper{
                border-style: solid;
                border-width: 1px 1px 1px 1px;
                border-color: rgba(122,126,151,0.27);
                box-shadow: 0px 5px 20px 0px rgba(33,53,89,0.14);
                transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
                margin: 10px 10px 10px 50px;
                padding: 30px 80px 30px 80px;
                border-radius: 10px 10px 10px 10px;
                background-color: #fff;
            }
            .hq-calculator-inner-wrappper{
                display: flex;
                position: relative;
                width: 100%;
            }
            .hq-text-wrapper{
                margin-bottom: 20px;
                color: rgba(122,126,151,0.59);
                font-family: "Avenir Next LT Pro", Sans-serif;
                font-size: 14px;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 2px;
                text-align: center;
            }
            .hq-text-inner-container{
                margin: 30px 0px -25px 0px;
            }
            .hq-text-inner-container p{
                text-align: center;
                color: rgba(122,126,151,0.59);
                font-family: "Avenir Next LT Pro", Sans-serif;
                font-size: 14px;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 2px;
            }
            .hq-header2-text{
                font-family: "Avenir Next LT Pro", Sans-serif;
                font-size: 24px;
                font-weight: 600;
            }
            .hq-header-wrapper{
                margin-bottom: 20px;
            }
            .hq-header2-inner-wrapper:not(:last-child){
                margin-bottom: 1.6em;
            }
            .hq-bottom-text-wrapper{
                display: flex;
                flex: 1;
                flex-direction: row;
                justify-content: space-around;
            }
            .number-choose{
                color: #ffc613 !important;
            }
            .number-choose-main{
                color: #ffc613 !important;
                text-decoration: underline;
            }
            .hq-rental-pricing-input{
                width: 80px;
                padding: 0px !important;
                font-family: "Avenir Next LT Pro", Sans-serif;
                font-size: 24px;
                font-weight: 600;
                background-color: #fff;
                border: none !important;
                background: #fff !important;
                color:#ffc613 !important;
                text-align: center;
            }
            .hq-rental-pricing-input:focus{
                border: none !important;
                border-color: #fff !important;
            }
        </style>
        <?php
    }
    public function setLabels($english, $spanish, $pt){
        if(get_locale() == "en_US"){
            return $english;
        }else if(get_locale() == 'es_ES'){
            return $spanish;
        }else if(get_locale() == 'pt_BR'){
            return $pt;
        }
        return $english;
    }

}