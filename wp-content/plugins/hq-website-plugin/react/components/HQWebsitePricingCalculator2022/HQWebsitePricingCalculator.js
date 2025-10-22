import React, { Component } from 'react';

class HQWebsitePricingCalculator extends Component{
    constructor(props){
        super(props);
        this.yearlyTimes = 11;
        this.montlyBasicPrice = 120;
        this.monthlyStandard = 175;
        this.monthlyPro = 250;
        this.state = {
            numberOfCars: 100,
            monthlyRate: 0,
            yearlyRate: 0
        }
    }
    componentWillMount() {
        let monthlyPrice = this.getMonthlyPrice(this.state.numberOfCars);
        let yearlyPrice = this.parseNumber(this.yearlyTimes * monthlyPrice);
        this.setState({ monthlyRate: this.parseNumber(monthlyPrice),  yearlyRate: this.parseNumber(yearlyPrice)});

    }

    onChangeVehicleInput(newCarValue){
        let monthlyPrice = 0;
        // Validation for Calculations
        if(newCarValue.target.value === ''){
            this.setState({ numberOfCars: 0, monthlyRate: 0, yearlyRate: 0 } );
        }else{
            let newInput = parseInt(newCarValue.target.value);
            if(newInput > 2000){
                newInput = 2000;
            }
            if(newInput < 0){
                newInput = 0;
            }
            let monthlyPrice = this.getMonthlyPrice(newInput);
            let yearlyPrice = monthlyPrice * this.yearlyTimes;
            this.setState({ numberOfCars: newInput, monthlyRate: this.parseNumber(monthlyPrice), yearlyRate: this.parseNumber(yearlyPrice) } );
        }
    }
    getMonthlyPrice(quantity){
      const PRICE_FIXED_0_10 = 120.0;
      const PRICE_FIXED_11_25 = 175.0;
      const PRICE_FIXED_26_50 = 250.0;

      const PRICE_PER_UNIT_51_200 = 3.25;
      const PRICE_PER_UNIT_201_500 = 2.25;
      const PRICE_PER_UNIT_501_1000 = 1.75;
      const PRICE_PER_UNIT_1001_2000 = 1.25;

      if (quantity <= 0) return 0.0;

      // ---- Fixed totals for small fleets ----
      if (quantity <= 10) return PRICE_FIXED_0_10;
      if (quantity <= 25) return PRICE_FIXED_11_25;
      if (quantity <= 50) return PRICE_FIXED_26_50;

      // ---- 51+ vehicles ----
      let total = PRICE_FIXED_26_50; // first 50 always = $250

      // 51–200
      let from = 51, to = Math.min(quantity, 200);
      if (to >= from) total += (to - from + 1) * PRICE_PER_UNIT_51_200;

      // 201–500
      from = 201; to = Math.min(quantity, 500);
      if (to >= from) total += (to - from + 1) * PRICE_PER_UNIT_201_500;

      // 501–1000
      from = 501; to = Math.min(quantity, 1000);
      if (to >= from) total += (to - from + 1) * PRICE_PER_UNIT_501_1000;

      // 1001–2000
      from = 1001; to = Math.min(quantity, 2000);
      if (to >= from) total += (to - from + 1) * PRICE_PER_UNIT_1001_2000;

      return total;
    }
    parseNumber(data){
        return parseFloat(data).toFixed( 0);
    }
    renderPriceLine(){
        if(this.state.numberOfCars > 2000){
            return(
                <div className="elementor-element elementor-widget elementor-widget-text-editor hq-header2-text hq-header-wrapper">
                    <div className="elementor-widget-container hq-header2-inner-wrapper">
                        <div className="elementor-text-editor elementor-clearfix">
                            <p className="hq-pricing-contact-sales-line"><a href="mailto:sales@hqrentalsoftware.com"><span>{bigCarsMessageFirst}</span><span className="hq-pricing-contact-sales-line-primary">{bigCarsMessageMiddle}</span><span>{bigCarsMessageLast}</span></a></p>
                        </div>
                    </div>
                </div>
            )
        }else{
            return (
                <div className="elementor-element elementor-widget__width-initial elementor-widget elementor-widget-text-editor hq-header2-text hq-header-wrapper">
                    <div className="elementor-widget-container hq-header2-inner-wrapper">
                        <div className="elementor-text-editor elementor-clearfix hq-bottom-text-wrapper">
                            <div>
                                <span className="number-choose">${ this.state.monthlyRate }</span> / {month}
                            </div>
                            <div className="elementor-text-editor elementor-clearfix"><p>{or}</p></div>
                            <div><span className="number-choose">${ this.state.yearlyRate }</span> / {year}</div>
                        </div>
                    </div>
                </div>
            );
        }
    }
    render(){
        return(
            <div className="elementor-column-wrap  elementor-element-populated hq-calculator-wrapper">
            <div className="elementor-widget-wrap hq-calculator-inner-wrappper">
            <div className="elementor-element elementor-widget elementor-widget-text-editor hq-text-wrapper">
            <div className="elementor-widget-container hq-text-inner-container">
            <div className="elementor-text-editor elementor-clearfix"><p>{title}</p>
        </div>
        </div>
        </div>
        <div className="elementor-element elementor-widget elementor-widget-text-editor hq-header2-text hq-header-wrapper">
            <div className="elementor-widget-container hq-header2-inner-wrapper">
            <div className="elementor-text-editor elementor-clearfix" style={this.state.numberOfCars > 2000 ? { marginBottom: 0 } : null}><p>{content + ' '}<span
        className="number-choose-main"><input type="text" placeholder="#" onChange={this.onChangeVehicleInput.bind(this)} value={this.state.numberOfCars} className="hq-rental-pricing-input anim-typewriter" /></span>{vehicles + ' '}</p></div>
        </div>
        </div>
        <div className="elementor-element elementor-element-9629da3 elementor-widget elementor-widget-text-editor">
            <div className="elementor-widget-container hq-text-wrapper">
                <div className="elementor-text-editor elementor-clearfix">
                    <p>{licenseCost}</p>
                </div>
            </div>
        </div>
        {this.renderPriceLine()}
        </div>
        </div>
    );
    }
}
export default HQWebsitePricingCalculator;
