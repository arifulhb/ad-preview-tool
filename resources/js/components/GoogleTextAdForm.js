import React, { Component } from 'react'
import FormField from './partials/FormField'
import _ from 'lodash'

export default class GoogleTextAdForm extends Component {
  constructor (props) {
    super(props)
    console.log('GoogleTextAdForm props ', props)
  }

  formFieldCallback  = (name, value) => {
    this.props.submitToEdit({
      'name': name,
      'value': value
    })
  }

  render () {

    return (
      <div className='form'>
        <FormField
          parentCallback={this.formFieldCallback}
          name='headline1'
          title='Headline 1'
          maxLength='30'
          defaultValue={this.props.ad.headline1}
        />
        <FormField
          parentCallback={this.formFieldCallback}
          name='headline2'
          title='Headline 2'
          maxLength='30'
          defaultValue={this.props.ad.headline2}
        />
        <FormField
          parentCallback={this.formFieldCallback}
          name='headline3'
          title='Headline 3'
          maxLength='39'
          defaultValue={this.props.ad.headline3}
        />
        <FormField
          parentCallback={this.formFieldCallback}
          name='description1'
          title='Description 1'
          maxLength='90'
          defaultValue={this.props.ad.description1}
        />
        <FormField
          parentCallback={this.formFieldCallback}
          name='description2'
          title='Description 2'
          maxLength='90'
          defaultValue={this.props.ad.description2}
        />
        <FormField
          parentCallback={this.formFieldCallback}
          name='displayUrl'
          title='Display Url'
          maxLength='35'
          defaultValue={this.props.ad.displayUrl}
        />
      </div>
    )
  }
}
