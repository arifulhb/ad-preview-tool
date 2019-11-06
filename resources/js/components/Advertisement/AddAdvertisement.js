import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import api from '../../utils/api'
import _ from 'lodash'
import FormField from '../partials/FormField'

export default class AddAdvertisement extends Component {
  constructor (props) {
    super(props)

    this.state = {
      advertisement: {
        title: '',
        type: 'GoogleTextAd'
      },
      message: ''
    }
    this.handleSave.bind(this)
    this.handleChange.bind(this)
  }


  /**
   * Send data to api for saving
   */
  handleSave = () => {
    const adv = this.state.advertisement;

    this.setState({
      message: 'Saving data'
    })

    api.post(`/advertise/create/`, adv)
      .then((response) => {
        this.setState({
          message: 'Saved Successfully!!'
        })

        setTimeout(()=> {
          this.setState({
            message: ''
          })
          window.location.href = `/advertise/edit/${response.data.id}`
        }, 800)
      })
      .catch((error) => {
        console.log('Update Error',error);
      });
  }


  handleChange = (event) => {
    let adv = {...this.state.advertisement}
    adv.title = event.target.value
    this.setState({advertisement: adv})
  }

  render () {
    const advertise = this.state.advertisement
    return (
      <div className='row mb-4 mt-5'>
        <div className='col-lg-6 offset-lg-4 col-md-6 offset-md-4 col-sm-12'>
          <div className='card '>
            <div className='card-header'><h3 className='text-primary'>Create advertisement</h3></div>
            <div className='card-body'>

              <div className='form-horizontal'>
                <div className='form-group'>
                  <label htmlFor='ad-title'>Enter a title</label>
                  <input type='text' className="form-control" placeholder="Enter a title"
                    onChange={this.handleChange}
                    name='advertisement.title'
                    value={this.state.advertisement.title}
                    id='ad-title'
                  />
                </div>
                <div className='form-group'>
                  <label htmlFor='ad-type'>Select an advertisement type</label>
                  <select className='form-control' name='ad-type' id='ad-type'>
                    <optgroup label='Google'>
                      <option value={this.state.advertisement.type}>Google Text Ad</option>
                    </optgroup>
                  </select>
                </div>
                <div className="form-group text-right">
                  <button className='btn btn-primary' onClick={this.handleSave}>Create</button>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    )
  }
}

if (document.getElementById('add-advertisement')) {
  const el = document.getElementById('add-advertisement')
  const props = Object.assign({}, el.dataset)
  ReactDOM.render(<AddAdvertisement {...props} />,
    document.getElementById('add-advertisement')
  )
}
