import React from 'react';
import ReactDOM from 'react-dom';

class ReactCheckbox extends React.Component {
    constructor(props) {
        super(props);
        this.userId = props.userId;
        this.text = props.text;
        this.state = {checked: props.checked == 1 ? true : false};
        this.handleChange = this.handleChange.bind(this);
    }

    handleChange(event) {    
        this.setState({ checked: event.target.checked },()=>{
            axios.post('/settings/' + this.userId + "/p", {private: this.state.checked})
                    .then(res => { 
                    }).catch(err => {
                    console.log(err)})
            console.log(this.state.checked);
        });
    }

    render() {
      return (
            <form>
                <input name="checkbox" type="checkbox"
                    checked={this.state.checked} onChange={this.handleChange} 
                    className="form-check-input" id="reactCheckbox"/>
                <label className="form-check-label">{this.text}</label>
            </form>  
      ) 
    }
  }

export default ReactCheckbox;

if (document.getElementById('ReactCheckbox')) {
    const el = document.getElementById('ReactCheckbox');
    ReactDOM.render(<ReactCheckbox checked={el.getAttribute('isChecked')} text={el.getAttribute('text')} userId={el.getAttribute('userId')} />, el);
}

