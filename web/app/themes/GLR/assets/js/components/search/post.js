import React, { PureComponent } from 'react'


const Post = props => 
    <article
        className="article" 
        role="article" 
        itemScope 
        itemType="http://schema.org/BlogPosting"
    >
        <figure>
            <img src={this.props.data._embedded['wp:featuredmedia'][0].source_url} />
        </figure>

        <div className="excerpt">
            <div className="meta">{this.props.data._embedded.author[0].name} | {this.props.data.date}</div>
            <a href={this.props.data.link}>{this.props.data.title.rendered}</a>

            <div className="tag">{this.props.data._embedded['wp:term'][0][0].name}</div>
        </div>
    </article>

export default Post