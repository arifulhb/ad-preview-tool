import React, { Component } from 'react'
export default class FormField extends Component {
  constructor (props) {
    super(props)
    this.state = {
      value: null
    }
    this.handleSendData.bind(this)
  }

  handleSendData = (event) => {
    event.preventDefault()
    const input = this.refs.input
    // console.log(input.name)
    this.props.parentCallback(input.name, input.value.trim())
  }

  render () {
    return (
      <div className='input-group mb-3'>
        <div className='input-group-prepend'>
          <span className='input-group-text'>{this.props.title}</span>
        </div>
        <input
          ref='input'
          type='text'
          name={`${this.props.name}`}
          onChange={this.handleSendData}
          className='form-control'
          maxLength={this.props.maxLength}
          defaultValue={this.props.defaultValue}
        />
        <div className='input-group-append'>
          <span className='input-group-text'>{this.props.maxLength}</span>
        </div>
      </div>
    )
  }
}
