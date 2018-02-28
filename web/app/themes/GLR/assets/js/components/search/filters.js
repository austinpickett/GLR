import React, { Component } from 'react'
import { render } from 'react-dom'
import styled from 'styled-components'
import serialize from 'form-serialize'
import Results from './results'

const API = 'http://localhost:8000/wp/wp-json/wp/v2/posts'

export default class Filters extends Component {
  constructor(props) {
    super(props)

    this.state = {
      results: []
    }

    this.handleSubmit = this.handleSubmit.bind(this)
  }

  async componentWillMount() {
    const results = await this.fetchPosts(`per_page=10&_embed`)
    this.setState({ results })
  }

  async fetchPosts(query) {
    return await fetch(`${API}?${query}`).then(response => {
      if (response.ok) {
          return Promise.resolve(response);
      } else {
          return Promise.reject(new Error('Failed to load'));
      }
    }).then(response => {
      return response.json()
    }).then(results => {
      return results
    })
  }

  async handleSubmit (e) {
    e.preventDefault()

    const s = e.currentTarget.s
    const { results } = await this.fetchPosts(`search=${s}&_embed`)

    this.setState({ results })
  }

  render() {
    return (
      <div className='filters-wrapper'>
        <form className='filters' action='/' onSubmit={this.handleSubmit}>
          <div className='wrapper'>
            <select>
              <option>Sort By All</option>
            </select>

            <select>
              <option>Sort By All</option>
            </select>

            <input type='text' className='search' name='s' />
          </div>
        </form>

        <Results {...this.state} />
      </div>
    )
  }
}

const $filter = document.getElementById('filters')
if ($filter) {
  render(<Filters />, $filter)
}
