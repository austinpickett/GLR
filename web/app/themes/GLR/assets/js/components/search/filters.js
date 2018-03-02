import React, { Component } from 'react'
import { render } from 'react-dom'
import styled from 'styled-components'
import serialize from 'form-serialize'
import Results from './results'

const API = 'http://glr.thegkwco.com/wp-json/wp/v2/posts'

export default class Filters extends Component {
  constructor(props) {
    super(props)

    this.state = {
      results: []
    }

    this.handleSubmit = this.handleSubmit.bind(this)
  }

  async componentWillMount() {
    const results = await this.fetchPosts(`per_page=10`)
    this.setState({ results })
  }

  async fetchPosts(query) {
    return await fetch(`${API}?${query}&_embed`).then(response => {
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

    let s
    if (s = e.currentTarget.s) {
      const results = await this.fetchPosts(`search=${s}&_embed`)
      this.setState({ results })
    }

    const results = await this.fetchPosts(`${e.currentTarget.value}&_embed`)
    this.setState({ results })
  }

  render() {
    return (
      <div className='filters-wrapper'>
        <form className='filters' action='javascript:;' onSubmit={this.handleSubmit}>
          <div className='wrapper'>
            <select
              name='sort'
              onChange={this.handleSubmit}
            >
              <option value='all'>Sort By All</option>
              <option value='orderby=date'>Sort By Date</option>
              <option value='orderby=title'>Sort By Alpha</option>
            </select>

            <select
              name='secondary'
              onChange={this.handleSubmit}
            >
              <option value='orderby=title&order=asc'>A to Z</option>
              <option value='orderby=title&order=desc'>Z to A</option>
              <option value='orderby=date&order=asc'>Newest to Oldest</option>
              <option value='orderby=date&order=desc'>Oldest to Newest</option>
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
