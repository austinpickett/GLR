import React from 'react'
export default ({ data: {
  date,
  link,
  title,
  _embedded
} }) => (
  <article
      className="article"
      role="article"
      itemScope
      itemType="http://schema.org/BlogPosting"
  >
      <figure>
          <img src={_embedded['wp:featuredmedia'][0].source_url} />
      </figure>

      <div className="excerpt">
          <div className="meta">{_embedded.author[0].name} | {date}</div>
          <a href={link} dangerouslySetInnerHTML={{__html: title.rendered}} />

          <div className="tag">{_embedded['wp:term'][0][0].name}</div>
      </div>
  </article>
)
