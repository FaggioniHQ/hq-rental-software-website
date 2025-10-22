import React, { Component } from 'react';

class HQWebsitePricingCalculator extends Component{
    constructor(props){
        super(props);
        this.yearlyTimes = 11;
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
            if(newInput > 10000){
                newInput = 10000;
            }
            if(newInput < 0){
                newInput = 0;
            }
            let monthlyPrice = this.getMonthlyPrice(newInput);
            let yearlyPrice = monthlyPrice * this.yearlyTimes;
            this.setState({ numberOfCars: newInput, monthlyRate: this.parseNumber(monthlyPrice), yearlyRate: this.parseNumber(yearlyPrice) } );
        }
    }
    getMonthlyPrice(cars){

        let month = 0;
        if(0 <= cars && cars <= 10){
            month = 65;
        }
        if(11 <= cars && cars <= 25){
            month = 120;
        }
        if(26 <= cars && cars <= 50){
            month = 175;
        }
        if(51 <= cars && cars <= 100){
            month = 250;
        }
        //225 -> base price for 100 cars
        if( 101 <= cars && cars <= 200 ){
            month = 250 + ( cars - 100 ) * 1.50;
        }
        if( 201 <= cars && cars <= 500 ){
            month = (( cars - 200 ) * 1.25) + (100 * 1.50) + 250;
        }
        if( 501 <= cars && cars <= 1000 ){
            month =  ((cars - 500) * 1) + (100 * 1.50) + (300 * 1.25) + 250;
        }
        return month;
    }
    parseNumber(data){
        return parseFloat(data).toFixed(Number.isInteger(data) ? 0 : 2)
    }
    renderPriceLine(){
        if(this.state.numberOfCars > 1000){
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
            <div className="elementor-text-editor elementor-clearfix" style={this.state.numberOfCars > 1000 ? { marginBottom: 0 } : null}><p>{content + ' '}<span
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
