import React, { Component } from 'react'
import FormField from './partials/FormField'
import _ from 'lodash'

export default class GoogleTextAdForm extends Component {
  constructor (props) {
    super(props)
    console.log('GoogleTextAdForm props ', props)
  }

  submitToSave = (event) => {
    event.preventDefault()
    this.props.submitToSave()
  }
  submitToPublish = (event) => {
    event.preventDefault()
    this.props.submitToPublish(!this.props.isPublished)
  }
  formFieldCallback  = (name, value) => {
    this.props.submitToEdit({
      'name': name,
      'value': value
    })
  }

  render () {

    return (
      <>
      <div className='row'>
        <div className='col-lg-12'>
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
      </div>

      <hr/>
      <div className='row jumbotron jumbotron-fluid  pt-3 pb-3'>
        <div className='col-lg-12'>
        <FormField
            parentCallback={this.formFieldCallback}
            name='title'
            title='Advertisement Title'
            maxLength='200'
            defaultValue={this.props.ad.title}
          />
        </div>
      </div>
      <div className='row'>
        <div className='col-lg-6 col-md-6 col-sm-6 text-left'>
          <div className="form-group row">
            <div className="col-sm-10">
              <button
                onClick={this.submitToSave}
                type="button"
                className="btn btn-primary"
              >Save</button>
            </div>
          </div>
        </div>
        <div className='col-lg-6 col-md-6 col-sm-6 text-right'>
          <div className="form-group">
            <div className="col-sm-12">
              <button
                onClick={this.submitToPublish}
                type="button"
                className={`btn btn-${this.props.isPublished ? 'warning' : 'success'}`}
                >{this.props.isPublished === true ? 'Mark Draft' : 'Publish'}</button>
            </div>
          </div>
        </div>
      </div>
    </>
    )
  }
}
